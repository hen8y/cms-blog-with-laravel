<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\HomeController;
use App\Models\User;
use App\Models\Post;


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

Route::get('/hello','\App\Http\Controllers\AdminsController@hello')->name('admin.index');
Route::middleware('auth')->group(function () {
    
    Route::get('/admin','\App\Http\Controllers\AdminsController@index')->name('admin.index');


});