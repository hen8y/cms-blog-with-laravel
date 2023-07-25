<?php
namespace App\Policies;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;


Route::get('roles/', [ RoleController::class, 'index'])->name('roles.index');
Route::post('roles/', [ RoleController::class, 'store'])->name('roles.store');
Route::delete('roles/{role}/delete', 'App\Http\Controllers\RoleController@destroy')->name('roles.destroy')


?>