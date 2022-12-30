<?php

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
->middleware(['auth','lang']);

Route::get('/dashboard/location/{lang}',[App\Http\Controllers\Core\LanguageController::class , 'change'])
->name('change.language')->middleware(['auth','lang']);

Route::any('/dark_mode', function () {
    Session::put(['dark' => ((! Session::get('dark')) ?? true)]);
    return redirect()->back();
})->middleware(['auth','lang']);

Route::prefix('dashboard')->middleware(['auth','lang','role:super-admin'])->group(function () {
    Route::resource('user', UserController::class);
});

/**
 * Route::any('/relatorio/{bairro}',[DashbordController::class,'thisMonth'])->name('relatorio');

Route::middleware(['auth'])->group(function () {

    Route::get('/filtered_data/{startDate}/{endDate}',[DashbordController::class,'filterDateJson']);
    Route::post('/filtered_data',[DashbordController::class,'filtroJson']);
    Route::get('/relatorio_geral',[DashbordController::class,'all'])->name('relatorio.geral');

    Route::get('/relatorio_geral/{bairro}',[DashbordController::class,'allByNeighborhood'])->name('relatorio.bairro');

    Route::get('/relatorio_actual/{bairro}',[DashbordController::class,'thisMonth'])->name('relatorio.mes.actual');

    Route::post('/relatoriofiltrado/filtro',[DashbordController::class,'filtro'])->name('relatorio.filtro');

    Route::get('/dashboard',[DashbordController::class,'index'])->name('dashboard.index');
});

Route::group(['middleware'=> ['auth', 'role:admin']],function(){
     Route::resource('province', ProvincesController::class);
     Route::resource('document_type', DocumentsTypeController::class);
     Route::resource('bairro', NeighborhoodsController::class);
     Route::resource('genre', GenresController::class);
     Route::resource('provenace', ProvenacesContoller::class);
     Route::resource('forwarded_service', ForwardedServicesController::class);
     Route::resource('purpose_of_visit', PurposeOfVisitsController::class);
     Route::resource('reason_opening_case', ReasonOpeningCasesController::class);
     Route::resource('user', UsersController::class);
     Route::resource('sendMail', SendMailController::class);
});
 */
