<?php

use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\ProvinceController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/dashboard');
})->name('welcome');

Auth::routes([
    'register' => false,
    'password.request' => false,
    'reset' => false,
    'password.email' => false,
    'confirm' => false,
    'password.update' => false,
]);

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])
->name('dashboard')
->middleware(['auth', 'lang']);

Route::get('/dashboard/location/{lang}', [App\Http\Controllers\Core\LanguageController::class, 'change'])
->name('change.language')->middleware(['auth', 'lang']);

Route::any('/dark_mode', function () {
    Session::put(['dark' => ((! Session::get('dark')) ?? true)]);

    return redirect()->back();
})->middleware(['auth', 'lang']);

Route::prefix('dashboard')->middleware(['auth', 'lang', 'role:super-admin'])->group(function () {
    Route::resource('user', UserController::class);
    Route::post('user/roles/grant/{user}',[UserController::class,'grant'])->name('user.grant_role');
    Route::resource('country',CountryController::class);
    Route::delete('country/{country}/forced',[CountryController::class,'destroyForced'])->name('country.delete.forced');
    Route::get('country/{country}/restore',[CountryController::class,'restore'])->name('country.restore');
    Route::get('trashed/countries',[CountryController::class,'trashedCountries'])->name('country.trash');

    Route::resource('province', ProvinceController::class);


});
