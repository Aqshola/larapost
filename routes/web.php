<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostController::class, "index"]);
Route::get("/post/{post:slug}", [PostController::class, "postDetail"]);
Route::get("/post/author/{user:username}", [AuthorController::class, "authorPost"]);
Route::get("/category", [CategoryController::class, "index"]);
Route::get("/category/{category:slug}", [CategoryController::class, "categoryDetail"]);
Route::get("/author", [AuthorController::class, "index"]);
