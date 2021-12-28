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



        $searchQuery = request('search');




        return view("index", [
            "title" => $searchQuery ? 'Hasil pencarian ' . '"' . $searchQuery . '"' : "Semua Post",
            "posts" => Posts::latest()->filter(request(['search']))->get()
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
