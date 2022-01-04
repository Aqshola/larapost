<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Posts;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    {;
        $validate = $request->validate(([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'body' => 'required',
            'image' => 'file|max:1024',
        ]));

        if ($request->file('image')) {
            $validate['image'] = $request->file('image')->store('larapost-images');
        }



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
    public function edit(Posts $post)
    {
        return view("dashboard.posts.edit", [
            "post" => $post,
            "categories" => Categories::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posts $post)
    {

        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'body' => 'required',
            'image' => 'file|max:1024',
        ];


        if ($request->slug != $post->slug) {
            $rules["slug"] = 'required|unique:posts';
        }

        $validate = $request->validate($rules);


        if ($request->file('image')) {
            Storage::delete($post->image);
            $validate['image'] = $request->file('image')->store('larapost-images');
        }

        if ($request->image_status == "delete") {
            Storage::delete($post->image);
            $validate['image'] = null;
        }

        $validate['user_id'] = auth()->user()->id;
        $validate['excerpt'] = Str::limit(strip_tags($request->body), 50);


        $validate['user_id'] = auth()->user()->id;
        $validate['excerpt'] = Str::limit(strip_tags($request->body), 50);
        $updatePost = Posts::where('id', $post->id)->update($validate);

        if ($updatePost) {
            return redirect("/dashboard/posts")->with("success", "post '" . $post->title . "' has been updated");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posts $post)
    {


        if ($post->image) {
            Storage::delete($post->image);
        }
        Posts::destroy($post->id);
        return redirect("/dashboard/posts")->with("success", "post '" . $post->title . "' has been deleted");
    }

    public function checkSlug(Request $request)
    {

        $slug = SlugService::createSlug(Posts::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }
}
