<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\User\CreateUserRequest;
use App\Http\Resources\V1\User\UserCollection;
use App\Http\Resources\V1\User\UserResource;
use App\Models\User;

class UserController extends Controller
{
    public function list()
    {

        $perPage = request('perPage', 10);

        return new UserCollection(User::filter()->sort()->paginate($perPage));
//        $filter = new UserQuery();
//        $queryItems = $filter->transform($request);
//
//        if (count($queryItems) == 0) {
//            return UserCollection(User::paginate());
//        } else {
//            return UserCollection(User::where($queryItems)->paginate());
//        }
    }

    public function get(User $user)
    {
        return new UserResource($user);
    }

    public function create(CreateUserRequest $request)
    {
        return new UserResource(User::create($request->all()));
    }

}
