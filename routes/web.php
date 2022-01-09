<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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
Route::get("/author", [AuthorController::class, "index"]);

Route::prefix("post")->group(function () {
    Route::get("/{post:slug}", [PostController::class, "postDetail"]);
    Route::get("/author/{user:username}", [AuthorController::class, "authorPost"]);
});

Route::prefix("category")->group(function () {
    Route::get("/", [CategoryController::class, "index"]);
    Route::get("/{category:slug}", [CategoryController::class, "categoryDetail"]);
});

Route::middleware('guest')->group(function () {
    Route::post("/login", [LoginController::class, "authenticate"])->middleware('guest');
    Route::get("/login", [LoginController::class, "index"])->name('login')->middleware('guest');
    Route::get("/register", [RegisterController::class, "index"])->middleware('guest');
    Route::post("/register", [RegisterController::class, "regist"])->middleware('guest');
});


Route::middleware('auth')->group(function () {
    Route::get("/logout", [LoginController::class, "logout"])->middleware('auth');
    Route::get("/dashboard", [DashboardController::class, 'index'])->middleware('auth')->middleware('verified');
    Route::get("/dashboard/posts/checkSlug", [DashboardPostController::class, "checkSlug"])->middleware("auth");
    Route::resource("/dashboard/posts", DashboardPostController::class)->middleware('auth');
    Route::resource("/dashboard/categories", AdminCategoryController::class)->except('show')->middleware('can:admin');


    /**
     * Route buat email verification (ditunda)
     */

    // Route::get('/email/verify', function () {
    //     return view('auth.verify-email');
    // })->middleware('auth')->name('verification.notice');

    // Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    //     $request->fulfill();

    //     return redirect('/home');
    // })->middleware(['auth', 'signed'])->name('verification.verify');

});
