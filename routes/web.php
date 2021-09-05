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
use App\Http\Controllers\SpecifyTheProposeController;

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

     Route::get('/allusers',[UsersController::class,'index'])->name('users.index');
     Route::get('/user',[UsersController::class,'create'])->name('user.create');
     Route::post('/users',[UsersController::class,'store'])->name('users.store');
     Route::get('/user/{uuid}',[UsersController::class,'edit'])->name('user.edit');
     Route::put('/user/{uuid}',[UsersController::class,'update'])->name('user.update');
     Route::get('/users/{uuid}',[UsersController::class,'show'])->name('users.show');
     Route::delete('/user/{uuid}',[UsersController::class,'destroy'])->name('use.destroy');


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
     Route::put('/document/{uuid}',[DocumentsTypeController::class,'update'])->name('document.update');
     Route::delete('/document/{uuid}',[DocumentsTypeController::class,'destroy'])->name('document.destroy');

     Route::get('/allprovenaces',[ProvenacesContoller::class,'index'])->name('provenaces.index');
     Route::get('/provenace',[ProvenacesContoller::class,'create'])->name('provenace.create');
     Route::post('/provenaces',[ProvenacesContoller::class,'store'])->name('provenaces.store');
     Route::get('/provenaces/{uuid}',[ProvenacesContoller::class,'show'])->name('provenace.show');
     Route::get('/provenace/{uuid}',[ProvenacesContoller::class,'edit'])->name('provenace.edit');
     Route::put('/provenace/{uuid}',[ProvenacesContoller::class,'update'])->name('provenace.update');
     Route::delete('/provenace/{uuid}',[ProvenacesContoller::class,'destroy'])->name('provenace.destroy');

     Route::get('/allforwarded_services',[ForwardedServicesController::class,'index'])->name('forwardedservices.index');
     Route::get('/forwarded_service',[ForwardedServicesController::class,'create'])->name('forwardedservice.create');
     Route::post('/forwarded_services',[ForwardedServicesController::class,'store'])->name('forwardedservices.store');
     Route::get('forwarded_services/{uuid}',[ForwardedServicesController::class,'show'])->name('forwardedservice.show');
     Route::get('/forwarded_service/{uuid}',[ForwardedServicesController::class,'edit'])->name('forwardedservices.edit');
     Route::put('/forwarded_service/{uuid}',[ForwardedServicesController::class,'update'])->name('forwarded_service.update');
     Route::delete('/forwarded_service/{uuid}',[ForwardedServicesController::class,'destroy'])->name('forwarded_service.destroy');

     Route::get('/allpurpose_of_visits',[PurposeOfVisitsController::class,'index'])->name('purposeofvisits.index');
     Route::get('/purpose_of_visit',[PurposeOfVisitsController::class,'create'])->name('purposeofvisit.create');
     Route::post('/purpose_of_visits',[PurposeOfVisitsController::class,'store'])->name('purposeofvisits.store');
     Route::get('purpose_of_visits/{uuid}',[PurposeOfVisitsController::class,'show'])->name('purposeofvisit.show');
     Route::get('/purpose_of_visit/{uuid}',[PurposeOfVisitsController::class,'edit'])->name('purposeofvisit.edit');
     Route::put('/purpose_of_visit/{uuid}',[PurposeOfVisitsController::class,'update'])->name('purposeofvisit.update');
     Route::delete('/purpose_of_visit/{uuid}',[PurposeOfVisitsController::class,'destroy'])->name('purposeofvisit.destroy');

     Route::get('/allreason_opening_cases',[ReasonOpeningCasesController::class,'index'])->name('reasonopeningcases.index');
     Route::get('/reason_opening_case',[ReasonOpeningCasesController::class,'create'])->name('reasonopeningcase.create');
     Route::post('/reason_opening_cases',[ReasonOpeningCasesController::class,'store'])->name('reasonopeningcases.store');
     Route::get('reason_opening_cases/{uuid}',[ReasonOpeningCasesController::class,'show'])->name('reasonopeningcases.show');
     Route::get('/reason_opening_case/{uuid}',[ReasonOpeningCasesController::class,'edit'])->name('reasonopeningcase.edit');
     Route::put('/reason_opening_case/{uuid}',[ReasonOpeningCasesController::class,'update'])->name('reasonopeningcase.update');
     Route::delete('/reasonopeningcase/{uuid}',[ReasonOpeningCasesController::class,'destroy'])->name('reasonopeningcase.destroy');

     Route::get('/allspecify_the_propose',[SpecifyTheProposeController::class,'index'])->name('specifythepropose.index');
     Route::get('/specify_the_propose',[SpecifyTheProposeController::class,'create'])->name('specifythepropose.create');
     Route::post('/specify_the_propose',[SpecifyTheProposeController::class,'store'])->name('specifythepropose.store');
     Route::get('/specify_the_propose/{uuid}',[SpecifyTheProposeController::class,'show'])->name('specifythepropose.show');
     Route::get('/specify_the_propose/{uuid}',[SpecifyTheProposeController::class,'edit'])->name('specifythepropose.edit');
     Route::put('/specify_the_propose/{uuid}',[SpecifyTheProposeController::class,'update'])->name('specifythepropose.update');
     Route::delete('/specify_the_propose/{uuid}',[SpecifyTheProposeController::class,'destroy'])->name('specifythepropose.destroy');
});


