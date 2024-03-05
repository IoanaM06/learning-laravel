<?php

use Illuminate\Support\Facades\Route;

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
    return view('posts');
});

// routes to a blog post
Route::get('posts/{post}', function ($slug) {
    // if file doesn't exist (404)
    if (! file_exists($path = __DIR__ ."/../resources/posts/{$slug}.html")) {
        abort(404);
    }

    // remebers cache for 20 minutes
    $post = cache()->remember("posts.{$slug}", now() -> addMinutes(20), fn() => file_get_contents($path));

    // returns post view
    return view('post', ['post'=> $post,]);

// constraint
})->where('posts', '[A-z_\-]+');
