<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    function destroy() {
        auth()->logout();
        return redirect('/')->with('sucess', 'goodbye');
    }

    function create() {
        return view('create');
    }

    function store() {
        $attributes = request()->validate([
            'email' => 'required',
            'password' => 'required' 
        ]);

        if (auth()->attempt($attributes)) {
            return redirect('/')->with('success', "Welcome Back!");
        } 

        return back()
            ->withInput()
            ->withErrors([
                'email' => 'Your provided credentials could not be verified.',
                'password' => 'Your password is invalid.'
            ]);
    }
}
