<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| authetication  of route
|--------------------------------------------------------------------------
|
*/
Route::post('/login', 'PassportController@login');
Route::post('/register', 'PassportController@register');


/*
|--------------------------------------------------------------------------
|  routes of access on   system 
|--------------------------------------------------------------------------
|
*/
    Route::middleware('auth:api')->group(function () {
        Route::get('/auth',function (Request $user)
        {
            return $user->user();
        });
/*
|--------------------------------------------------------------------------
|  the route of address
|--------------------------------------------------------------------------
*/
       Route::resource('user', 'UsersController');

/*
|--------------------------------------------------------------------------
|  the route of users
|--------------------------------------------------------------------------
*/

      Route::resource('address', 'AddressesController');
      Route::post('allStore','AddressesController@allStore');
      Route::post('allUpdate','AddressesController@allUpdate');
      Route::post('allDelete','AddressesController@allDelete');
/*
|--------------------------------------------------------------------------
|  the route of biospdatabase
|--------------------------------------------------------------------------
*/

      Route::resource('biospdatabase', 'BiospdatabasesController');


/*
|--------------------------------------------------------------------------
|  the route of documents type 
|--------------------------------------------------------------------------
*/

     Route::resource('documenttype', 'DocumentTypesController');
     
/*
|--------------------------------------------------------------------------
|  the route of genrer
|--------------------------------------------------------------------------
*/
     Route::resource('genrer', 'GenresController');
     
     /*
|--------------------------------------------------------------------------
|  the route of provinces
|--------------------------------------------------------------------------
*/
    Route::resource('provinces', 'ProvincesController');
     
  /*
|--------------------------------------------------------------------------
|  the route of purpose of visits 
|--------------------------------------------------------------------------
*/
    Route::resource('purpose', 'PurposeOfVisitsController');


      /*
|--------------------------------------------------------------------------
|  the route of provinces
|--------------------------------------------------------------------------
*/
Route::resource('purpose', 'PurposeOfVisitsController');
    //Route::post('logout', 'PassportController@     });

});