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

Route::get('/', [\App\Http\Controllers\PostController::class, 'index'])->name('homepage');

Route::get('post/{post:slug}', [\App\Http\Controllers\PostController::class, 'detail'])
    ->where('post', '[A-z\-]+')->name('detail');

//Route::get('posts-user/{user:username}', function(\App\Models\User $user) {
//    return view('posts.index', [
//        'posts' => $user->posts->load(['category', 'author'])
//    ]);
//});
