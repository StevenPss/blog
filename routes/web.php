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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('categories', App\Http\Controllers\CategoriesController::class);
    Route::resource('posts', App\Http\Controllers\PostsController::class);
    Route::resource('tags', App\Http\Controllers\TagsController::class);
    Route::get('trashed-posts', [App\Http\Controllers\PostsController::class, 'trashed'])->name('trashed-posts.index');
    Route::put('restore-post/{post}', [App\Http\Controllers\PostsController::class, 'restore'])->name('restore-post');
});


Route::middleware(['auth', 'verifyIsAdmin'])->group(function () {
    //users
    Route::get('users', [App\Http\Controllers\UsersController::class, 'index'])->name('users.index');
    Route::get('users/profile', [App\Http\Controllers\UsersController::class, 'edit'])->name('users.edit');
    Route::put('users/profile', [App\Http\Controllers\UsersController::class, 'update'])->name('users.update');
    Route::put('users/{user}/make-admin', [App\Http\Controllers\UsersController::class, 'makeAdmin'])->name('users.make-admin');
    Route::put('users/{user}/make-writer', [App\Http\Controllers\UsersController::class, 'makeWriter'])->name('users.make-writer');
});
