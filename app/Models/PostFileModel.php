<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\Document;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class PostFileModel
{
    private string $title;
    private string $slug;
    private string $excerpt;
    private string $date;
    private string $content;

    /**
     * @param string $title
     * @param string $slug
     * @param string $excerpt
     * @param string $date
     * @param string $content
     */
    public function __construct(
        string $title,
        string $slug,
        string $excerpt,
        string $date,
        string $content
    ) {
        $this->title = $title;
        $this->slug = $slug;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @return string
     */
    public function getExcerpt(): string
    {
        return $this->excerpt;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return Post[]|\Illuminate\Support\Collection
     */
    public static function all()
    {
        return  cache()->rememberForever(
            'posts.all',
            function () {
                return collect(File::files(resource_path() . '/posts'))
                    ->map(fn($splfFileInfo) => YamlFrontMatter::parseFile($splfFileInfo))
                    ->map(fn(Document $frontMatterDocument): Post => new Post(
                        $frontMatterDocument->title,
                        $frontMatterDocument->slug,
                        $frontMatterDocument->excerpt,
                        $frontMatterDocument->date,
                        $frontMatterDocument->body()
                    ))
                    ->sortByDesc(fn(Post $post) => $post->getDate());
            }
        );
    }

    /**
     * @param Post
     * @return string
     */
    public static function find(string $postSlug): Post
    {
        $post = static::all()->firstWhere(
            fn(Post $post) => $post->getSlug() === $postSlug
        );

        if (! $post instanceof Post) {
            throw new ModelNotFoundException();
        }

        return $post;
    }

}
