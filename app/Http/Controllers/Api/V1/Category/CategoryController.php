<?php

namespace App\Http\Controllers\Api\V1\Category;


use App\Http\Controllers\Api\BaseController;
use App\Models\Categories;

class CategoryController extends BaseController
{
    //create basic controller for Channels
    public function index()
    {
        return Categories::all();
    }



}
