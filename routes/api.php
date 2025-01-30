<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index']); // Get all admins
    Route::post('/', [AdminController::class, 'store']); // Create admin
    Route::get('/{id}', [AdminController::class, 'show']); // Get single admin
    Route::put('/{id}', [AdminController::class, 'update']); // Update admin
    Route::delete('/{id}', [AdminController::class, 'destroy']); // Delete admin
});
