<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view("register");
    }

    public function regist(Request $request)
    {


        $credentials = $request->validate(([
            "name" => 'required',
            "username" => 'required|min:5|unique:users|alpha_dash',
            "email" => 'required|email:dns|unique:users',
            "password" => 'required|min:5|max:255',
        ]));

        $credentials['password'] = Hash::make($credentials['password']);
        $createUser = User::create($credentials);

        if ($createUser) {
            auth()->login($createUser);
            return redirect("/dashboard");
        }
    }
}