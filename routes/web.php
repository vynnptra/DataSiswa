<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HobbyController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/hobby');
});

Route::middleware('guest')->group( function () {
    Route::get('/login', [AuthController::class, 'signin'])->name('signin');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'signup'])->name('signup');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

Route::middleware('auth')->group( function () {
    
    Route::get('/hobby', [HobbyController::class, 'index'])->name('hobby');
    Route::get('/hobby/create', [HobbyController::class, 'create'])->name('hobby.create')->middleware('can:create-hobby');
    Route::post('/hobby', [HobbyController::class, 'store'])->name('hobby.store')->middleware('can:create-hobby');
    Route::get('/hobby/{hobby}', [HobbyController::class, 'show'])->name('hobby.show')->middleware('can:show-hobby');
    Route::get('/hobby/{hobby}/edit', [HobbyController::class, 'edit'])->name('hobby.edit')->middleware('can:update-hobby');
    Route::put('/hobby/{hobby}', [HobbyController::class, 'update'])->name('hobby.update')->middleware('can:update-hobby');;
    Route::delete('/hobby/{hobby}', [HobbyController::class, 'destroy'])->name('hobby.destroy')->middleware('can:delete-hobby');


    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa');
    Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create')->middleware('can:create-siswa');
    Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store')->middleware('can:create-siswa');
    Route::get('/siswa/{siswa}', [SiswaController::class, 'show'])->name('siswa.show')->middleware('can:show-siswa');
    Route::get('/siswa/{siswa}/edit', [SiswaController::class, 'edit'])->name('siswa.edit')->middleware('can:update-siswa');
    Route::put('/siswa/{siswa}', [SiswaController::class, 'update'])->name('siswa.update')->middleware('can:update-siswa');;
    Route::delete('/siswa/{siswa}', [SiswaController::class, 'destroy'])->name('siswa.destroy')->middleware('can:delete-siswa');

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

