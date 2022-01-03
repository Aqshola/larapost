<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Posts;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class DashboardPostController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.posts.index", ["posts" => Posts::where('user_id', auth()->user()->id)->latest()->paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("dashboard.posts.create", [
            "categories" => Categories::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validate = $request->validate(([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'body' => 'required'
        ]));

        $validate['user_id'] = auth()->user()->id;
        $validate['excerpt'] = Str::limit(strip_tags($request->body), 50);


        $createPost = Posts::create($validate);
        if ($createPost) {
            return redirect("/dashboard/posts")->with("success", "New post has been added");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show(Posts $post)
    {
        //
        return view("dashboard.posts.show", [
            "post" => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit(Posts $posts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posts $posts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posts $post)
    {



        Posts::destroy($post->id);
        return redirect("/dashboard/posts")->with("success", "post '" . $post->title . "' has been deleted");
    }

    public function checkSlug(Request $request)
    {

        $slug = SlugService::createSlug(Posts::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }
}
