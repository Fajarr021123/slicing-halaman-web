<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

// Route untuk halaman utama
Route::get('/', function () {
    return view('index');
})->name('home');

// Route untuk halaman home (bisa dihapus jika sama dengan route utama)
Route::get('/home', function () {
    return view('index');
})->name('home.index');

// Route untuk halaman form
Route::get('/form', function () {
    return view('form');
})->name('admin.form');

// Route untuk halaman edit, memanggil AdminController@edit dengan parameter ID
Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');

// Route untuk update data admin, menggunakan method PUT atau PATCH
Route::put('/update/{id}', [AdminController::class, 'update'])->name('admin.update');

// Route untuk menghapus admin
Route::delete('/admin/{id}', [AdminController::class, 'destroy']);
Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
