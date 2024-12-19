<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MinatBakatController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\DiagnosaController;

Route::get('/', function () {
    return view('home');
});

Route::get('home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/diagnosa', [DiagnosaController::class, 'index'])->name('diagnosa.index');
    Route::post('/diagnosa/proses', [DiagnosaController::class, 'prosesDiagnosa'])->name('diagnosa.proses');

});

Route::middleware(['auth', 'role:admin'])->group(function () {
    // Dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // Minat Bakat CRUD
    Route::resource('/admin/minat_bakat', MinatBakatController::class)
        ->names([
            'index' => 'admin.minat_bakat.index',
            'create' => 'admin.minat_bakat.create',
            'store' => 'admin.minat_bakat.store',
            'edit' => 'admin.minat_bakat.edit',
            'update' => 'admin.minat_bakat.update',
            'destroy' => 'admin.minat_bakat.destroy',
        ]);

    // Jurusan CRUD
    Route::resource('/admin/jurusan', JurusanController::class)
        ->names([
            'index' => 'admin.jurusan.index',
            'create' => 'admin.jurusan.create',
            'store' => 'admin.jurusan.store',
            'edit' => 'admin.jurusan.edit',
            'update' => 'admin.jurusan.update',
            'destroy' => 'admin.jurusan.destroy',
        ]);
});


require __DIR__.'/auth.php';
