<?php

use App\Http\Controllers\api\CommentController;
use App\Http\Controllers\api\PostController;
use App\Http\Controllers\api\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//      return $request->user();
// });

Route::controller(PostController::class)->group(function () {
  Route::get('posts/{id}', 'show');
  Route::get('posts', 'getAllPost'); 
  Route::get('posts/category/{id}', 'getPostByCategory');
  Route::get('posts/limit/{limit}', 'getPostWithLimit');
  Route::get('search/posts', 'searchPosts');
});

Route::controller(CommentController::class)->group(function () {
  Route::get('comments/{id}', 'getAllComment');
  Route::post('comments', 'store');
});

Route::controller(CategoryController::class)->group(function () {
  Route::get('categories', 'getAllCategories');
});
