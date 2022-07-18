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

Route::get('/postBlog',[PostsController::class, 'postBlog'])->name('postBlog');
Route::get('/viewBlog',[PostsController::class, 'viewBlog'])->name('viewBlog');
Route::post('/post', [PostsController::class, 'post'])->name('post');
Route::get('/post', [PostsController::class, 'post'])->name('post');
Route::get('/readBlog/{id}', [PostsController::class, 'readBlog'])->name('readBlog');
Route::post('/readBlog/{id}', [PostsController::class, 'readBlog'])->name('readBlog');
Route::post('/deleteBlog/{id}', [PostsController::class, 'deleteBlog'])->name('deleteBlog');
