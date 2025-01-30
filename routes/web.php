<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return view('index');
})->name('home');


Route::get('/home', function () {
    return view('index');
})->name('home.index');


Route::get('/form', function () {
    return view('form');
})->name('admin.form');

Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');


Route::put('/update/{id}', [AdminController::class, 'update'])->name('admin.update');


Route::delete('/admin/{id}', [AdminController::class, 'destroy']);
Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
