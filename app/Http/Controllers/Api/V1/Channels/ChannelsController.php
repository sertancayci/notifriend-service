<?php

namespace App\Http\Controllers\Api\V1\Channels;


use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\V1\Channels\CreateChannelRequest;
use App\Http\Requests\V1\Channels\UpdateChannelRequest;
use App\Http\Resources\V1\Channel\ChannelCollection;
use App\Http\Resources\V1\Channel\ChannelResource;
use App\Models\Channels;
use Illuminate\Http\Request;

class ChannelsController extends BaseController
{
    //create basic controller for Channels
    public function list()
    {
        $perPage = request('perPage', 10);

        return new ChannelCollection(Channels::filter()->sort()->paginate($perPage));
    }

    public function get(Channels $channel)
    {
        return new ChannelResource($channel);
    }

    public function create(CreateChannelRequest $request)
    {
        return new ChannelResource(Channels::create($request->all()));
    }

    public function userChannels(Request $request)
    {
        $user = $request->user();

        $channels = Channels::where('user_id', $user->id)
            ->with('category')
            ->sort()
            ->get();

        if ($channels->isEmpty()) {
            return response()->json(['message' => 'No channels found.'], 200);
        }

        return new ChannelCollection($channels);
    }

    public function privateChannels(Request $request)
    {
        $user = $request->user();
        $perPage = request('perPage', 10);

        $channels = Channels::where('user_id', $user->id)
            ->where('category_id', 9)
            ->with('category')
            ->sort()
            ->paginate($perPage);

        if ($channels->isEmpty()) {
            return response()->json(['message' => 'No channels found.'], 200);
        }

        return new ChannelCollection($channels);
    }

    public function update(Channels $channel, UpdateChannelRequest $request)
    {
        $channel->update($request->all());

        return new ChannelResource($channel);
    }

    public function delete(Channels $channel)
    {
        $channel->delete();

        return response()->json([], 204);
    }


}
