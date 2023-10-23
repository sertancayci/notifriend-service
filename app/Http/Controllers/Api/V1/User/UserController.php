<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\User\UserCollection;
use App\Http\Resources\V1\User\UserResource;
use App\Models\User;

class UserController extends Controller
{
    public function list()
    {
        return UserCollection(User::paginate());
    }

    public function get(User $user)
    {
        return new UserResource($user);
    }



}
