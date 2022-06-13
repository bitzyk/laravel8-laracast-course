<?php

namespace App\Http\Controllers;

use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    /**
     * Route (or controller) model binding by a field that is not id -> {post} should be the same with $post
     */
    public function store()
    {
        $validData = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255|min:3|unique:users,username', // unique on the users table and column username
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required:|max:255|min:7',
        ]);

        $user = User::create($validData);

        auth()->login($user);

        return redirect('/')->with(
            'success', 'Your account was created'
        );
    }
}
