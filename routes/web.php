<?php

use App\Http\Controllers\HobbyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/hobby');
});

Route::resource('/hobby', HobbyController::class );