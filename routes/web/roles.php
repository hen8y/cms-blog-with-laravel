<?php
namespace App\Policies;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;


Route::get('roles/', [ RoleController::class, 'index'])->name('roles.index');
Route::post('roles/', [ RoleController::class, 'store'])->name('roles.store');
Route::delete('roles/{role}/delete', 'App\Http\Controllers\RoleController@destroy')->name('roles.destroy');
Route::put('roles/{role}/update', [ RoleController::class, 'update'])->name('roles.update');
Route::get('roles/{role}/edit', [ RoleController::class, 'edit'])->name('roles.edit');

Route::put('roles/{role}/attach', [ RoleController::class, 'attach_permission'])->name('role.permission.attach');
Route::put('roles/{role}/detach', [ RoleController::class, 'detach_permission'])->name('role.permission.detach');


?>