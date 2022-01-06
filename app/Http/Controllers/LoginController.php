<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class LoginController extends Controller
{


    public function index()
    {
        return view("login");
    }

    public function authenticate(Request $request)
    {




        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);
        $remember = $request['remember'] == 'on';


        if (Auth::attempt($credentials, $remember)) {
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'Account not found',
            "password" => "No password"
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
