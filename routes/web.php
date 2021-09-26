<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProvincesController;
use App\Http\Controllers\DocumentsTypeController;
use App\Http\Controllers\GenresController;
use App\Http\Controllers\NeighborhoodsController;
use App\Http\Controllers\ProvenacesContoller;
use App\Http\Controllers\BenificiariesController;
use App\Http\Controllers\ForwardedServicesController;
use App\Http\Controllers\PurposeOfVisitsController;
use App\Http\Controllers\ReasonOpeningCasesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Auth::routes([
    "register" => false,
    "confirm" =>false,
    "reset" => false
]);

Route::get('/filtered_data/{startDate}/{endDate}',[DashbordController::class,'filterDate']);
Route::get('/', function () {
    return  redirect('/dashboard');
});
Route::get('/coll',[BenificiariesController::class,'importCollection']);
Route::group(['middleware'=>'auth'],function(){

     Route::get('/dashboard',[DashbordController::class,'index'])->name('dashboard.index');
     Route::resource('province', ProvincesController::class);
     Route::resource('document_type', DocumentsTypeController::class);
     Route::resource('bairro', NeighborhoodsController::class);
     Route::resource('genre', GenresController::class);
     Route::resource('provenace', ProvenacesContoller::class);
     Route::resource('forwarded_service', ForwardedServicesController::class);
     Route::resource('purpose_of_visit', PurposeOfVisitsController::class);
     Route::resource('reason_opening_case', ReasonOpeningCasesController::class);
    // Route::resource('benificiary', BenificiariesController::class);
     Route::resource('user', UsersController::class);
});


