<?php

use App\Http\Controllers\Api\BenificiaryController;
use App\Http\Controllers\Api\Syncronization\Sync;
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







Route::post('/login',[UserController::class,'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout',[UserController::class,'logout']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/sync/ben',[Sync::class,'ben']);
    Route::get('/sync/settings',[Sync::class,'settings']);
    Route::post('/sync/create',[Sync::class,'addCreated']);
    Route::patch('/sync/update/{benificiary}',[Sync::class,'updateUpdated']);
    Route::delete('/sync/delete/{benificiary}',[Sync::class,'deleteDeleted']);
});

