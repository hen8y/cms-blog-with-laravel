<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\HomeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/post/{post}','\App\Http\Controllers\PostController@show')->name('post');


Route::middleware('auth')->group(function () {
    
    Route::get('/admin','\App\Http\Controllers\AdminsController@index')->name('admin.index');

    Route::get('/admin/posts/create','\App\Http\Controllers\PostController@create')->name('post.create');

    Route::post('/admin/posts','\App\Http\Controllers\PostController@store')->name('post.store');
    
});

