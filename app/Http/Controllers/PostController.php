<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        // foreach (posts::all() as $post) {
        //     echo $post->title;
        //     echo $post->exercpt;
        //     echo $post->body;
        // }

        $title = "Semua post";

        $search = "";

        if (request('search')) {
            $title = "";
            $search = 'Hasil pencarian ' . '"' . request('search') . '"';
        }

        if (request('author')) {

            $author = User::firstWhere('username', request('author'));
            $title =
                "Author " . '"<b>' . $author->name . '</b>"';
        }


        if (request('category')) {
            $category = Categories::firstWhere('slug', request('category'));

            $title =
                "Category " . '<b>' . request('category') . '</b>';
        }

        return view("index", [
            "title" => request('search') ? $search . '</br>' . $title : $title,
            "posts" => Posts::latest()->filter(request(['search', 'category', 'author']))->paginate(5)
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
