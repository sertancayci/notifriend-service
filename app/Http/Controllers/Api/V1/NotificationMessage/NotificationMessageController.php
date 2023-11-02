<?php

namespace App\Http\Controllers\Api\V1\NotificationMessage;


use App\Http\Controllers\Controller;
use App\Http\Requests\V1\NotificationMessage\CreateNotificationMessageRequest;
use App\Http\Resources\V1\NotificationMessage\NotificationMessageCollection;
use App\Http\Resources\V1\NotificationMessage\NotificationMessageResource;
use App\Models\NotificationMessage;

class NotificationMessageController extends Controller
{
    public function list()
    {
        $perPage = request('perPage', 10);

        return new NotificationMessageCollection(NotificationMessage::filter()->sort()->paginate($perPage));
    }

    public function get(NotificationMessage $notificationMessage)
    {
        return new NotificationMessageResource($notificationMessage);
    }

    public function create(CreateNotificationMessageRequest $request)
    {
        return new NotificationMessageResource(NotificationMessage::create($request->all()));
    }
}
