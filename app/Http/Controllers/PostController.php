<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class PostController extends Controller
{
    public function index()
    {
        // foreach (posts::all() as $post) {
        //     echo $post->title;
        //     echo $post->exercpt;
        //     echo $post->body;
        // }
        return view("index", [
            "title" => "Semua Post",
            "posts" => Posts::latest()->get()
        ]);
    }


    //BELOM TERAPIN ROUTE BINDING
    public function postDetail(Posts $post)
    {
        return view("post", [
            "post" => $post
        ]);
    }
}
