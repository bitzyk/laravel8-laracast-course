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
            'username' => 'required|max:255|min:3',
            'email' => 'required|email|max:255',
            'password' => 'required:|max:255|min:7',
        ]);

        User::create($validData);

        return redirect('/');
    }
}
