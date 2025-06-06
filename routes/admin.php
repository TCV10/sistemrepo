<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileCampusController;
use App\Http\Controllers\SkripsiController;

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [ProfileController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // skripsi
    Route::resource('skripsi', SkripsiController::class);
    // profil campus
    Route::resource('profilcampus', ProfileCampusController::class);


    Route::middleware(['role:admin'])->group(function () {
        // mahasiswa
        Route::resource('mahasiswa', MahasiswaController::class);
        // datalogin
        Route::resource('user', UserController::class);
        Route::resource('role', RoleController::class);
        Route::resource('permission', PermissionController::class);
    });
});
