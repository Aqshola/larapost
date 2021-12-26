<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthorController extends Controller
{
    public function index()
    {
        return view("authorList", [
            "authors" => User::all("username", "name")
        ]);
    }

    public function authorPost(User $user)
    {


        return view("index", [
            "title" => "Post by Author " . $user->name,
            "posts" => $user->post->load("category", "user")
        ]);
    }
}
