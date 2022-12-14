<?php

use App\Http\Controllers\DashboardBRIController;
use App\Http\Controllers\LoginBRIController;
use App\Http\Controllers\LogVoteMemberController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MemberFoodRushController;
use App\Http\Controllers\ScoreMemberFoodRushController;
use App\Http\Controllers\VoteMemberController;
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




Route::middleware(['auth:sanctum'])->group(function () {
    Route::resource('dashboardBRIs', DashboardBRIController::class);
    Route::post('logout', [LoginBRIController::class, 'logout']);
});

Route::post('login', [LoginBRIController::class, 'login'])->name('login');

// Route::post('member/login', [MemberFoodRushController::class, 'login']);

// Route::post('food-rush-register', [MemberFoodRushController::class, 'addMember']);

// Table DB Member (GET, PUT)
// Route::resource('member', MemberController::class);

// Table DB Vote (POST, PUT)
// Route::resource('vote', VoteMemberController::class);

// Route::post('game', [ScoreMemberFoodRushController::class, 'addLogGame']);

// Route::get('high_score/{member_id}', [ScoreMemberFoodRushController::class, 'highScore']);