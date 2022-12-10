<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\api\BaseController;
use App\Http\Resources\ShowPostResource;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends BaseController
{
    public function getPostWithLimit($limit)
    {
        $posts = Post::limit($limit)->get();

        return $this->sendResponse(PostResource::collection($posts), 'list all posts with limit');
    }

    public function getAllPost() 
    {
        $posts = Post::all();
    
        return $this->sendResponse(PostResource::collection($posts), 'list all posts');
    }

    public function getPostByCategory($id)
    {
        $posts = Post::where('category_id', $id)->get();

        return $this->sendResponse(PostResource::collection($posts), 'list post by category');
    }

    public function show($id) 
    {
        $post = Post::find($id);
        
        if (!$post) return $this->sendError("post not found");

        return $this->sendResponse(new ShowPostResource($post), 'show post');
    }
}
