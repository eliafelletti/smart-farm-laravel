<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Application routes 

Route::resource('smart_farm', App\Http\Controllers\SmartFarmController::class)->except('destroy');

Route::get('/smart_farm/{smart_farm}/destroy', [App\Http\Controllers\SmartFarmController::class, 'destroy']);

Route::resource('measure', App\Http\Controllers\MeasureController::class)->except('destroy');

Route::get('/measure/{measure}/destroy', [App\Http\Controllers\MeasureController::class, 'destroy']);

Route::resource('cultivation', App\Http\Controllers\CultivationController::class)->except('destroy');

Route::get('/cultivation/{cultivation}/destroy', [App\Http\Controllers\CultivationController::class, 'destroy']);

Route::resource('green_house', App\Http\Controllers\GreenHouseController::class)->except('destroy');

Route::get('/green_house/{green_house}/destroy', [App\Http\Controllers\GreenHouseController::class, 'destroy']);

Route::resource('/owner', App\Http\Controllers\OwnerController::class)->except('destroy');

Route::get('/owner/{owner}/destroy', [App\Http\Controllers\OwnerController::class, 'destroy']);

Route::resource('/supplier_company', App\Http\Controllers\SupplierCompanyController::class)->except('destroy');

Route::get('/supplier_company/{supplier_company}/destroy', [App\Http\Controllers\SupplierCompanyController::class, 'destroy']);

Route::resource('/technology', App\Http\Controllers\TechnologyController::class)->except('destroy');

Route::get('/technology/{technology}/destroy', [App\Http\Controllers\TechnologyController::class, 'destroy']);

Route::resource('/realized_measure', App\Http\Controllers\RealizedMeasureController::class)->except('destroy');

Route::get('/realized_measure/{realized_measure}/destroy', [App\Http\Controllers\RealizedMeasureController::class, 'destroy']);

Route::resource('/used_technology', App\Http\Controllers\UsedTechnologyController::class)->except('destroy');

Route::get('/used_technology/{used_technology}/destroy', [App\Http\Controllers\UsedTechnologyController::class, 'destroy']);

Route::resource('/realized_crop', App\Http\Controllers\RealizedCropController::class)->except('destroy');

Route::get('/realized_crop/{realized_crop}/destroy', [App\Http\Controllers\RealizedCropController::class, 'destroy']);

Route::get('/green_house/{green_house}/monitor', [App\Http\Controllers\GreenHouseController::class, 'monitor']);