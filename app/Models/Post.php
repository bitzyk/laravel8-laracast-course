<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post
{

    /**
     * @return array
     */
    public static function all(): array
    {
        $files = File::allFiles(resource_path() . '/posts');

        return array_map(
            fn($splFileInfo) => $splFileInfo->getContents(),
            $files
        );
    }

    /**
     * @param string $postSlug
     * @return string
     */
    public static function find(string $postSlug): string
    {
        // find a post by its slug and pass it to a view called "post"
        $path = resource_path() . '/posts/' . $postSlug . '.html';

        if (! file_exists($path)) {
            throw new ModelNotFoundException();
        }

        $post = cache()->remember(
            "post.{$postSlug}",
            now()->addMinutes(30), // cache for 30 minutes
            fn() => file_get_contents($path)
        );

        return (string) $post;
    }

}
