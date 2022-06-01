<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
//        \Illuminate\Support\Facades\DB::listen(function ($query) {
//            logger($query->sql);
//        });

        return view('posts.index', [
            'posts' =>
                \App\Models\Post::latest('published_at')
                ->filter(\request(['search', 'category']))
                ->with([
                    'category',
                    'author',
                ])
                ->get(),
            'currentCategory' => \request('category') ? Category::firstWhere([
                'slug' => \request('category')
            ]) : null,
        ]);
    }

    /**
     * Route (or controller) model binding by a field that is not id -> {post} should be the same with $post
     */
    public function detail(\App\Models\Post $post)
    {
        // find a post by its slug and pass it to a view called "post"
        return view('posts.detail', [
            'post' => $post
        ]);
    }
}
