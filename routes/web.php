<?php

use App\Http\Controllers\HobbyController;
use App\Http\Controllers\SiswaController;
use App\Jobs\Test;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/hobby');
});

Route::resource('/hobby', HobbyController::class );

Route::resource('/siswa', SiswaController::class);

Route::get('test', function () {
    Test::dispatch();
    return 'test';
});