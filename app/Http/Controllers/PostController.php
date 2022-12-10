<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\CloudinaryStorage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(5);

        return view('pages.recipe.index')->with([
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('pages.recipe.create')->with([
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string|max:255',
            'category' => 'required',
            'ingredient' => 'required|string',
            'direction' => 'required|string',
            'image' => 'required|mimes:jpg,png,jpeg'
        ]);

        $image = $request->file('image');
        $savedImage = CloudinaryStorage::upload($image->getRealPath(), $image->getClientOriginalName());

        Post::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category,
            'ingredient' => $request->ingredient,
            'direction' => $request->direction,
            'image' => $savedImage,
        ]);

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();

        return view('pages.recipe.edit')->with([
            'post' => $post,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string|max:255',
            'ingredient' => 'required|string',
            'direction' => 'required|string',
            'image' => 'mimes:jpg,png,jpeg'
        ]);

        $image = $request->file('image');

        if($image) {
            $savedImage = CloudinaryStorage::replace($image, $image->getRealPath(), $image->getClientOriginalName());   
        } else {
            $post = Post::findOrFail($id);
            $savedImage = $post->image;
        }

        Post::where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'ingredient' => $request->ingredient,
            'direction' => $request->direction,
            'image' => $savedImage,
        ]);

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        CloudinaryStorage::delete($post->image);
        Post::destroy($post->id);

        return redirect()->route('posts.index');
    }
}
