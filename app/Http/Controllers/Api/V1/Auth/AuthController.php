<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\V1\Auth\RegisterRequest;
use App\Models\User;

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
//        $user->assignRole('student');

        if ($user) {
            $token = rand(100000, 999999);

            $user->verify()->create([
                'user_id' => $user->id,
                'token' => $token,
            ]);

        }

        return $this->sendResponse($user, 'Kullanıcı başarıyla kaydoldu.');
    }

}
