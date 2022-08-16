<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LoginBRIController;
use Illuminate\Support\Facades\Route;

Route::get('/{any?}', function () {
    return view('main');
})->where('any', '[\/\w\.-]*');