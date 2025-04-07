<?php

use App\Http\Controllers\HobbyController;
use App\Http\Controllers\SiswaController;
use App\Jobs\Test;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/hobby');
});

Route::get('/test', function () {
    return view('mails.data-siswa');
});

Route::resource('/hobby', HobbyController::class );

Route::resource('/siswa', SiswaController::class);

