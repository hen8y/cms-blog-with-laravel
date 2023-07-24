<?php
namespace App\Policies;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::put('/admin/users/{user}/update','\App\Http\Controllers\UserController@update')->name('user.profile.update');
    Route::delete('/admin/users/{user}','\App\Http\Controllers\UserController@destroy')->name('users.destroy');

});
Route::middleware(['role:admin','auth'])->group(function () {
    Route::get('admin/users/','\App\Http\Controllers\UserController@index')->name('users.index');
    Route::put('/users/{user}/attach','\App\Http\Controllers\UserController@attach')->name('user.role.attach');
    Route::put('/users/{user}/detach','\App\Http\Controllers\UserController@detach')->name('user.role.detach');
});
Route::middleware(['can:view,user'])->group(function () {
    Route::get('/admin/users/{user}/profile','\App\Http\Controllers\UserController@show')->name('user.profile.show');
});
?>