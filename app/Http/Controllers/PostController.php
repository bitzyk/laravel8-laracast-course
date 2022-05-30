<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
//        \Illuminate\Support\Facades\DB::listen(function ($query) {
//            logger($query->sql);
//        });

        return view('posts', [
            'posts' =>
                \App\Models\Post::latest('published_at')
                ->filter(\request(['search']))
                ->with([
                    'category',
                    'author',
                ])
                ->get(),
            'categories' => \App\Models\Category::all()
        ]);
    }

    /**
     * Route (or controller) model binding by a field that is not id -> {post} should be the same with $post
     */
    public function detail(\App\Models\Post $post)
    {
        // find a post by its slug and pass it to a view called "post"
        return view('post', [
            'post' => $post
        ]);
    }
}
