<?php

use App\Http\Controllers\HobbyController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/hobby');
});

Route::resource('/hobby', HobbyController::class );

Route::resource('/siswa', SiswaController::class);