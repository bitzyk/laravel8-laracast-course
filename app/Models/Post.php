<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Post
 *
 * @property int $id
 * @property int $category_id
 * @property int $user_id
 * @property string $title
 * @property string $slug
 * @property string $excerpt
 * @property string $body
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $published_at
 * @property-read \App\Models\User|null $author
 * @property-read \App\Models\Category|null $category
 * @method static \Database\Factories\PostFactory factory(...$parameters)
 * @method static Builder|Post newModelQuery()
 * @method static Builder|Post newQuery()
 * @method static Builder|Post query()
 * @method static Builder|Post whereBody($value)
 * @method static Builder|Post whereCategoryId($value)
 * @method static Builder|Post whereCreatedAt($value)
 * @method static Builder|Post whereExcerpt($value)
 * @method static Builder|Post whereId($value)
 * @method static Builder|Post wherePublishedAt($value)
 * @method static Builder|Post whereSlug($value)
 * @method static Builder|Post whereTitle($value)
 * @method static Builder|Post whereUpdatedAt($value)
 * @method static Builder|Post whereUserId($value)
 * @mixin \Eloquent
 */
class Post extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'title',
        'excerpt',
        'body',
    ];

    //protected $with = ['category', 'author'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * @param Builder $query
     * @param array $filters
     * @return void
     */
    public function scopeFilter(
        Builder $query,
        array $filters
    ) {
        $query
            ->when($filters['search'] ?? false, fn(Builder $query, $search) =>
                $query->where(fn(Builder $query) =>
                    $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%')
                )
            )
            ->when($filters['category'] ?? false, fn(Builder $query, $category) => $query
                ->whereHas('category', fn(Builder $query) =>
                    $query->where('slug', $category)
                )
            )
            ->when($filters['author'] ?? false, fn(Builder $query, $username) => $query
                ->whereHas('author', fn(Builder $query) =>
                    $query->where('username', $username)
                )
            );
    }
}
