<?php

use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/viewBlog',[PostsController::class, 'viewBlog'])->name('viewBlog');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//protecting routes so that you are only able to access them if you are signed in
Route::group( ["middleware"=>['web', 'auth']], function (){
    Route::get('/postBlog',[PostsController::class, 'postBlog'])->name('postBlog');
    Route::post('/post', [PostsController::class, 'post'])->name('post');
    Route::get('/post', [PostsController::class, 'post'])->name('post');
    Route::get('/readBlog/{id}', [PostsController::class, 'readBlog'])->name('readBlog');
    Route::post('/readBlog/{id}', [PostsController::class, 'readBlog'])->name('readBlog');
    Route::post('/deleteBlog/{id}', [PostsController::class, 'deleteBlog'])->name('deleteBlog');
    Route::get('/likeBlog/{id}', [PostsController::class, 'likeBlog'])->name('likeBlog');
    Route::get('/followBlogger/{id}', [PostsController::class, 'followBlogger'])->name('followBlogger');
    Route::get('/commentSection/{id}', [PostsController::class, 'commentSection'])->name('commentSection');
    Route::post('/addComment/{id}', [PostsController::class, 'addComment'])->name('addComment');
    Route::get('/likeComment/{id}', [PostsController::class, 'likeComment'])->name('likeComment');
    Route::get('dislikeComment/{id}', [PostsController::class, 'dislikeComment'])->name('dislikeComment');
});
