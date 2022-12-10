<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\API\BaseController;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends BaseController
{
    public function getAllPost() {
        $posts = Post::all();
    
        return $this->sendResponse(PostResource::collection($posts), 'list all posts');
    }

    public function show($id) {
        $post = Post::find($id);

        return $this->sendResponse(new PostResource($post), 'show post');
    }
}
