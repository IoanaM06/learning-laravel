<?php

namespace App\Models;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post {
    public $title;
    public $excerpt;
    public $date;
    public $body;

    public function __construct($title, $excerpt, $date, $body) {
        $this->title = $title;
        $this->excerpt =$excerpt;
        $this->date = $date;
        $this->body = $body;
    }

    public static function all() {
        $files = File::files(resource_path("posts/"));
        return array_map(fn($file) => $file->getContents(), $files);
    }
    // finds a post according to the slug
    public static function find($slug) {
        // if file doesn't exist (404)
        if (! file_exists($path = resource_path("posts/{$slug}.html"))) {
            throw new ModelNotFoundException();
        }

        // returns the post
        return cache()->remember("posts.{$slug}", now() -> addMinutes(20), fn() => file_get_contents($path));
    }

}