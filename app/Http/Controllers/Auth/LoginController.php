<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected function redirectTo()
{

    if (auth()->user()->hasRole('Admin')) {
        return route('backend.dashboard');
    }


    return route('front.index');
}

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
