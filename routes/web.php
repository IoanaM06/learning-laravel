<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// routes to home
Route::get('/', function () {
    // Returns the 'posts' view along with the array of posts data.
    return view('posts', ['posts' => Post::all()]);
});

// Find a post by its slug and pass it to its view, "post"
Route::get('posts/{post}', function ($slug) {
    $post = Post::find($slug);
    return view("post", ['post' => $post]);

})->where('posts', '[A-z_\-]+');
