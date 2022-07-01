<?php

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

Route::get('/home', [\App\Http\Controllers\PostController::class, 'home'])->name('home');
Route::get('/', [\App\Http\Controllers\PostController::class, 'home'])->name('home');
Route::get('/posts/{slug}', [\App\Http\Controllers\PostController::class, 'detail'])->name('posts.detail');
Route::get('/allposts', [\App\Http\Controllers\PostController::class, 'allposts'])->name('posts.allposts');
Route::post('/comment', [\App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');
Route::resource('/admin/posts', \App\Http\Controllers\PostController::class);
Auth::routes();


