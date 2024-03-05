<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Symfony\Component\Yaml\Yaml;

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
    $files = File::files(resource_path("posts"));
    $posts = [];

    foreach ($files as $file) {
        $document = YamlFrontMatter::parseFile($file);
        $posts[] = new Post(
            $document->title, 
            $document->excerpt,
            $document->date,
            $document->body(),
        );
    }

    dd($posts);
    
    // // Returns the 'posts' view along with the array of posts data.
    // return view('posts', ['posts' => Post::all()]);
});

// Find a post by its slug and pass it to its view, "post"
Route::get('posts/{post}', function ($slug) {
    // find a post
    $post = Post::find($slug);
    // return view of post
    return view("post", ['post' => $post]);

// constraint
})->where('posts', '[A-z_\-]+');
