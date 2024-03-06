<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    // varibale declaration
    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    // constructor takes metadata for a post
    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    // Retrieves and processes all posts from the "posts" directory.
    public static function all()
    {
        return cache()->rememberForever("posts.all", function () {
            return collect(File::files(resource_path("posts")))
            // maps over file and turns it into a document
            ->map(fn($file) => YamlFrontMatter::parseFile($file))
            // maps over medidata in the document that was just mapped
            ->map(fn($document) => new Post(
                $document->title,
                $document->excerpt,
                $document->date,
                $document->body(),
                $document->slug,
            ))
            ->sortByDesc('date');
        });
    }

    // finds a specific post according to it's slug
    public static function find($slug)
    {
        return static::all()->firstWhere("slug", $slug);
    }

}