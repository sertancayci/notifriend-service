<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\V1\Auth\LoginRequest;
use App\Http\Requests\V1\Auth\RegisterRequest;
use App\Http\Resources\V1\Auth\LoginResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseController
{
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request): JsonResponse
    {

        $user = User::create($request->all());
//        $user->assignRole('user');


        return $this->sendResponse($user, 'Kullanıcı başarıyla kaydoldu.');
    }

    public function login(LoginRequest $request)
    {

        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            //if credentials is not true
            return $this->sendError('Kullanıcı adı veya şifre yanlış', ['error' => 'Unauthorized']);
            //return error
        }

        $user = Auth::user();

        if ($user->status != 'ACTIVE') {
            auth()->user()->tokens()->delete();

            return $this->sendError('Hesabınız pasif durumdadır.');
        }

        $user->token = $user->createToken('Personal Access Token')->plainTextToken;
//        $token = $tokenResult->token;
        //save token

//        $token->save();
        $data = new LoginResource($user);

        return $this->sendResponse($data, 'Login successful');
    }

}
