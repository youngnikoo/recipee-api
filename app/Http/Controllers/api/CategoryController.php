<?php

namespace App\Http\Controllers\api;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    public function getAllCategories() 
    {
        $categories = Category::all();

        return $this->sendResponse(CategoryResource::collection($categories), 'list all categories');
    }
}
