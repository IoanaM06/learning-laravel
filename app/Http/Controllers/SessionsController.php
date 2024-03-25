<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    function destroy() {
        auth()->logout();
        return redirect('/')->with('sucess', 'goodbye');
    }

    function create($user) {
        auth()->login($user);
    }
}
