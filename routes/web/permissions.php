<?php
namespace App\Policies;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionController;


Route::get('permissions/', [PermissionController::class, 'index'])->name('permissions.index');


?>