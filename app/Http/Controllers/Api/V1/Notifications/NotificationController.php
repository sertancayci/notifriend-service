<?php

namespace App\Http\Controllers\Api\V1\Notifications;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\Notification\NotificationCollection;
use App\Models\Notification;

class NotificationController extends Controller
{
    //
    public function list()
    {

        $perPage = request('perPage', 10);

        return new NotificationCollection(Notification::filter()->sort()->paginate($perPage));
//        $filter = new UserQuery();
//        $queryItems = $filter->transform($request);
//
//        if (count($queryItems) == 0) {
//            return UserCollection(User::paginate());
//        } else {
//            return UserCollection(User::where($queryItems)->paginate());
//        }
    }
}
