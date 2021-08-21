<?php

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

Route::post('/create', function () {
    if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
        $user = Auth::user();
        $user->tokens()->delete();
        $success =  $user->createToken('MyLaravelApp');
        //$success['userId'] = $user->id;
        return response()->json(['success' => $success->plainTextToken]);
    }
    else{
        return response()->json(['error'=>'Unauthorised'], 401);
    }
});
