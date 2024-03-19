<?php

use App\Models\Post;
use App\Models\Category;
use App\Models\User;

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

// Routes to home
Route::get('/', function () {
    // Returns the 'posts' view along with the array of posts data.
    return view('posts', ['posts' => Post::latest()->with('category', 'author')->get()]);
});

// Find a post by its slug and pass it to its view, "post"
Route::get('posts/{post:slug}', function (Post $post) {
    return view("post", [
        'post' => $post
    ]);
});

// Finds posts by category
Route::get('categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts
    ]);
});

// Finds posts by author
Route::get('authors/{author:username}', function (User $author) {
    return view('posts', [
        'posts' => $author->posts
    ]);
});
