<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

//    \Illuminate\Support\Facades\DB::listen(function ($query) {
//        logger($query->sql);
//    });

    return view('posts', [
        'posts' => \App\Models\Post::latest('published_at')->with([
            'category',
            'author',
        ])->get(),
        'categories' => \App\Models\Category::all()
    ]);
});

/**
 * route model binding by a field that is not id -> {post} should be the same with $post
 */
Route::get('post/{post:slug}', function(\App\Models\Post $post) {
    // find a post by its slug and pass it to a view called "post"
    return view('post', [
        'post' => $post
    ]);
})->where('post', '[A-z\-]+');


Route::get('posts-category/{category:slug}', function(\App\Models\Category $category) {
    return view('posts', [
        'posts' => $category->posts->load(['category', 'author']),
        'categories' => \App\Models\Category::all(),
        'currentCategory' => $category,
    ]);
})->where('category:slug', '[A-z\-]+');

Route::get('posts-user/{user:username}', function(\App\Models\User $user) {
    return view('posts', [
        'posts' => $user->posts->load(['category', 'author']),
        'categories' => \App\Models\Category::all(),
    ]);
});
