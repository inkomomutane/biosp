<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProvincesController;
use App\Http\Controllers\NeighborhoodsController;
use App\Http\Controllers\BenificiariesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['middleware'=>'auth'],function(){
    
     Route::get('/dashboard',[DashbordController::class,'index'])->name('dashboard.index');
  
     Route::get('/benificiary',[BenificiariesController::class,'index'])->name('benificiary.index');

     Route::get('/users',[BenificiariesController::class,'index'])->name('users.index');
     Route::get('/provinces',[ProvincesController::class,'index'])->name('provinces.index');
     Route::post('/provinces',[ProvincesController::class,'store'])->name('province.store'); 
     Route::put('/province/{uuid}',[ProvincesController::class,'update'])->name('province.update');
     Route::delete('/province/{uuid}',[ProvincesController::class,'destroy'])->name('province.destroy');

     Route::get('/neighborhoods',[NeighborhoodsController::class,'index'])->name('neighborhoods.index');
     Route::get('/neighborhood',[NeighborhoodsController::class,'create'])->name('neighborhood.create');
     
});


