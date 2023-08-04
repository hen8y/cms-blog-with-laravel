<?php
namespace App\Policies;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionController;


Route::get('permissions/', [PermissionController::class, 'index'])->name('permissions.index');
Route::get('permissions/{permissions}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
Route::post('permissions/', '\App\Http\Controllers\PermissionController@store')->name('permissions.store');
Route::delete('permissions/{permissions}/delete', '\App\Http\Controllers\PermissionController@destroy')->name('permissions.destroy');


?>