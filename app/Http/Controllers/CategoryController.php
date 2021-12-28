<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class CategoryController extends Controller
{
    public function index()
    {
        // foreach (posts::all() as $post) {
        //     echo $post->title;
        //     echo $post->exercpt;
        //     echo $post->body;
        // }


        return view("categoryList", [
            "categories" => Categories::all()
        ]);
    }


    //BELOM TERAPIN ROUTE BINDING
    public function categoryDetail(Categories $category)
    {
        return view("index", [
            "title" => "Post by Category " . $category->name,
            "posts" => $category->post
        ]);
    }
}
