<?php

use App\Http\Controllers\DashboardBRIController;
use App\Http\Controllers\LoginBRIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('userBRI', LoginBRIController::class);

Route::resource('dashboardBRIs', DashboardBRIController::class);



Route::post('/login', [LoginBRIController::class, 'login']);
