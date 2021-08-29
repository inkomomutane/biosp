<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProvincesController;
use App\Http\Controllers\DocumentsTypeController;
use App\Http\Controllers\GenresController;
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
     Route::get('/allprovinces',[ProvincesController::class,'index'])->name('provinces.index');
     Route::post('/provinces',[ProvincesController::class,'store'])->name('province.store'); 
     Route::get('/province',[ProvincesController::class,'create'])->name('province.create');
     Route::get('/provinces/{uuid}',[ProvincesController::class,'edit'])->name('provinces.edit');
     Route::get('/province/{uuid}',[ProvincesController::class,'show'])->name('province.show');
     Route::put('/provinceupdate/{uuid}',[ProvincesController::class,'update'])->name('province.update');
     Route::delete('/province/{uuid}',[ProvincesController::class,'destroy'])->name('province.destroy');

     Route::get('/neighborhoods',[NeighborhoodsController::class,'index'])->name('neighborhoods.index');
     Route::get('/neighborhood',[NeighborhoodsController::class,'create'])->name('neighborhood.create');
     Route::post('/neighborhoods',[NeighborhoodsController::class,'store'])->name('neighborhoods.store');
     Route::get('/neighborhood/{uuid}',[NeighborhoodsController::class,'show'])->name('neighborhood.show');
     Route::get('/neighborhoods/{uuid}',[NeighborhoodsController::class,'edit'])->name('neighborhood.edit');
     Route::put('/neighborhoods/{uuid}',[NeighborhoodsController::class,'update'])->name('neighborhood.update');
     Route::delete('/neighborhood/{uuid}',[NeighborhoodsController::class,'destroy'])->name('neighborhood.destroy');
     
     Route::get('/allgenres',[GenresController::class,'index'])->name('genres.index');
     Route::get('/genre',[GenresController::class,'create'])->name('genre.create');
     Route::post('/genres',[GenresController::class,'store'])->name('genres.store');
     Route::get('/genre/{uuid}',[GenresController::class,'show'])->name('genre.show');
     Route::get('/genres/{uuid}',[GenresController::class,'edit'])->name('genre.edit');
     Route::put('/genres/{uuid}',[GenresController::class,'update'])->name('genres.update');
     Route::delete('/genre/{uuid}',[GenresController::class,'destroy'])->name('genre.destroy');

     Route::get('/allbenificiaries',[BenificiariesController::class,'index'])->name('benificiaries.index');
     Route::get('/benificiary',[BenificiariesController::class,'create'])->name('benificiary.create');
     Route::post('/benificiaries',[BenificiariesController::class,'store'])->name('benificiaries.store');
     Route::get('/benificiary/{uuid}',[BenificiariesController::class,'show'])->name('benificiary.show');
     Route::get('/benificiaries/{uuid}',[BenificiariesController::class,'edit'])->name('benificiaries.edit');
     Route::put('/benificiaries/{uuid}',[BenificiariesController::class,'update'])->name('benificiaries.update');
     Route::delete('/benificiary/{uuid}',[BenificiariesController::class,'destroy'])->name('benificiary.destroy');
     

     Route::get('/documents',[DocumentsTypeController::class,'index'])->name('documents.index');
     Route::get('/document',[DocumentsTypeController::class,'create'])->name('document.create');
     Route::post('/documents',[DocumentsTypeController::class,'store'])->name('documents.store');
     Route::get('/documents/{uuid}',[DocumentsTypeController::class,'show'])->name('documents.show');
     Route::get('/document/{uuid}',[DocumentsTypeController::class,'edit'])->name('document.edit');
     Route::put('/document/{uuid}',[DocumentsTypeController::class,'update'])->name('documents.update');
     Route::delete('/document/{uuid}',[DocumentsTypeController::class,'destroy'])->name('document.destroy');
});


