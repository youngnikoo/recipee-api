<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\api\BaseController;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends BaseController
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'required|string|max:255',
            'post_id' => 'required'
        ]);

        $post = Post::find($request->post_id);
        if (!$post) return $this->sendError("post not found");

        $comment = Comment::create([
            'name' => $request->name,
            'description' => $request->description,
            'post_id' => $request->post_id
        ]);

        return $this->sendResponse(new CommentResource($comment), 'new comment has been created');
    }

    public function getAllComment($id)
    {
        $comments = Comment::where('post_id', $id)->get();

        return $this->sendResponse(CommentResource::collection($comments), 'list all comments');
    }
}
