<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

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

        if (! auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified.'
            ]);
        }

        session()->regenerate();

        return redirect('/')->with('success', 'Welcome Back!');
    
    }
}