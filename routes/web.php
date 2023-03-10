<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

Route::get('posts',[PostController::class,'index'])->name('posts.index')->middleware('auth');


Route::post('posts',[PostController::class,'store'])->name('posts.store')->middleware('auth');

Route::get('posts/{post}',[PostController::class,'show'])->name('posts.show')->middleware('auth');

Route::delete('posts/{post}',[PostController::class,'destroy'])->name('posts.destroy')->middleware('auth');

Route::get('posts/{post}/edit',[PostController::class,'edit'])->name('posts.edit')->middleware('auth');

Route::get('posts/create',[PostController::class,'create'])->name('posts.create')->middleware('auth');

Route::put('posts/{post}',[PostController::class,'update'])->name('posts.update')->middleware('auth');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('posts.index');

Route::get('users',[UserController::class,'index'])->name('users.index')->middleware('auth');

Route::get('users/{id}',[UserController::class,'show'])->name('users.show')->middleware('auth');

Route::POST('users',[UserController::class,'store'])->name('users.store')->middleware('auth');

