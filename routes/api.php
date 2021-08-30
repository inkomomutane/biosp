<?php

use App\Http\Controllers\Api\BenificiaryController;
use App\Http\Controllers\Api\UserController;
use App\Models\Syncronization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/sync', function (Request $request) {
    return ;
});



Route::middleware('auth:sanctum')->get('/ben', [BenificiaryController::class,'createdAfter']);

Route::post('/login',[UserController::class,'login']);
Route::post('/logout',[UserController::class,'logout'])->middleware('auth:sanctum');

