<?php

namespace App\Http\Controllers\Api\V1\Notifications;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Notifications\CreateNotificationRequest;
use App\Http\Resources\V1\Notification\NotificationCollection;
use App\Http\Resources\V1\Notification\NotificationResource;
use App\Models\NFNotification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //
    public function list()
    {

        $perPage = request('perPage', 10);

        return new NotificationCollection(NFNotification::filter()->sort()->paginate($perPage));
    }

    public function get(NFNotification $notification)
    {
        return new NotificationResource($notification);
    }

    public function create(CreateNotificationRequest $request)
    {
        return new NotificationResource(NFNotification::create($request->all()));
    }

    public function userNotifications(Request $request)
    {
        $user = $request->user();

        $notifications = NFNotification::where('receiver_user_id', $user->id)
            ->with('message')
            ->get();

        if ($notifications->isEmpty()) {
            return response()->json(['message' => 'No notifications found.'], 200);
        }

        return new NotificationCollection($notifications);
    }

    public function delete(NFNotification $notification)
    {

        $notification->delete();

        $this->sendResponse([], 'Notification deleted.');
    }


}
