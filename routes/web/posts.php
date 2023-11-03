<?php
namespace App\Policies;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/admin/posts','\App\Http\Controllers\PostController@index')->name('post.index');
    Route::get('/admin/posts/create','\App\Http\Controllers\PostController@create')->name('post.create');
    Route::post('/admin/posts','\App\Http\Controllers\PostController@store')->name('post.store');
    Route::patch('/admin/posts/{post}/update','\App\Http\Controllers\PostController@update')->name('post.update');
    Route::delete('/admin/posts/{post}/destroy','\App\Http\Controllers\PostController@destroy')->name('post.destroy');
    Route::get('/admin/posts/{post}/edit','\App\Http\Controllers\PostController@edit')->name('post.edit');
});
