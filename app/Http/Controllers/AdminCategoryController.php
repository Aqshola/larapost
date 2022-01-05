<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

use Cviebrock\EloquentSluggable\Services\SlugService;




class AdminCategoryController extends Controller
{




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        // example:


        return view('dashboard.categories.index', [
            "categories" => Categories::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'category' => 'required|max:255',

        ]));
        Categories::create([
            "name" =>  $validate["category"],
            "slug" => SlugService::createSlug(Categories::class, 'slug', $request->category)

        ]);
        toast('New Post has been added', 'success');
        return redirect("/dashboard/categories");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Categories $category)
    {
        //
        return view('dashboard.categories.edit', [
            "category" => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categories $category)

    {

        $validate = $request->validate(([
            'category' => 'required|max:255',
        ]));




        if ($validate['category'] == $category->name) {
            toast('Duplicate category name', 'warning');

            return back();
        } else {
            $newSlug = SlugService::createSlug(Categories::class, 'slug', $request->category);
            Categories::where('id', $category->id)->update([
                "name" => $validate['category'],
                "slug" => $newSlug == $category->slug ? $category->slug : $newSlug,
            ]);

            toast($category->name . " has been updated", 'success');
            return redirect("/dashboard/categories");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categories $category)
    {
        Categories::destroy($category->id);
        toast("category '" . $category->name . "' has been deleted", 'success');
        return redirect("/dashboard/categories");
    }
}
