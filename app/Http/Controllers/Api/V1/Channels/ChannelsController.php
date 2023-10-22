<?php

namespace App\Http\Controllers\Api\V1\Channels;


use App\Http\Controllers\Api\BaseController;
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



}
