<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index']); 
    Route::post('/', [AdminController::class, 'store']); 
    Route::get('/{id}', [AdminController::class, 'show']); 
    Route::put('/{id}', [AdminController::class, 'update']);
    Route::delete('/{id}', [AdminController::class, 'destroy']); 
});
