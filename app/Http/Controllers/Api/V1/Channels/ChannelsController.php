<?php

namespace App\Http\Controllers\Api\V1\Channels;


use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\V1\Channels\CreateChannelRequest;
use App\Http\Requests\V1\Channels\UpdateChannelRequest;
use App\Http\Resources\V1\Channel\ChannelCollection;
use App\Http\Resources\V1\Channel\ChannelResource;
use App\Models\Channels;

class ChannelsController extends BaseController
{
    //create basic controller for Channels
    public function index()
    {
        return new ChannelCollection(Channels::paginate());
    }

    public function show(Channels $channel)
    {
        return new ChannelResource($channel);
    }

    public function create(CreateChannelRequest $request)
    {
        return new ChannelResource(Channels::create($request->all()));
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
