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
    return view('posts', [
        'posts' => \App\Models\Post::all()
    ]);
});

/**
 * route model binding -> {post} should be the same with \App\Models\Post
 */
Route::get('post/{post}', function(\App\Models\Post $post) {
    // find a post by its slug and pass it to a view called "post"
    return view('post', [
        'post' => $post
    ]);
})->where('postSlug', '[A-z1-9\-]+');
