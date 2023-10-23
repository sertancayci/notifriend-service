<?php

namespace App\Http\Controllers\Api\V1\Category;


use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\V1\Category\CategoryCollection;
use App\Http\Resources\V1\Category\CategoryResource;
use App\Models\Category;

class CategoryController extends BaseController
{
    //create basic controller for Channels
    public function index()
    {
        return new CategoryCollection(Category::paginate());
    }

    public function get(Category $category)
    {
        return new CategoryResource($category);
    }


}
