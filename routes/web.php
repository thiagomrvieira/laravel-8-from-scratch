<?php

use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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

Route::get('/', [PostController::class, 'index'])->name('home');

#   Get the Post by Id
// Route::get('posts/{post}', function (Post $post) {

#   Get the Post by the Slug
// Route::get('posts/{post:slug}', function (Post $post) {

#   Get the Post by the Slug but it's necessary to add the getRouteKeyName in the model
Route::get('posts/{post}', [PostController::class, 'show']);

#   Get the Post by the Slug but it's necessary to add the getRouteKeyName in the model
Route::get('categories/{category}', function (Category $category) {

    return view('posts', [
        'posts' => $category->posts,
        'currentCategory' => $category,
        'categories' => Category::all()
    ]);

})->name('category');

Route::get('authors/{author:username}', function (User $author) {

    return view('posts', [
        'posts' => $author->posts,
        'categories' => Category::all()
    ]);

});