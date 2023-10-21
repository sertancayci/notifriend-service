<?php

namespace App\Http\Controllers\Api\V1\Channels;


use App\Http\Controllers\Api\BaseController;
use App\Models\Channels;

class ChannelsController extends BaseController
{
    //create basic controller for Channels
    public function list()
    {
        $channels = Channels::all();
    }



}
