<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EvolutionController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('users', UserController::class)->middleware('auth:sanctum');
Route::resource('histories', HistoryController::class)->middleware('auth:sanctum');
Route::resource('evolutions', EvolutionController::class)->middleware('auth:sanctum');

Route::get('evolutions/list/{id_history}', [EvolutionController::class,'index'])->middleware('auth:sanctum');


Route::post('login', [AuthController::class, 'login']);
// Route::post('register', [UserController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
