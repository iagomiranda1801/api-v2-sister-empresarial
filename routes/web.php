<?php

use App\Http\Controllers\Admin\EquipamentController;
use App\Http\Controllers\Api\v1\Tenancy\SchoolController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByRequestData;

InitializeTenancyByRequestData::$header = 'X-CUSTOMER';
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

Route::middleware([
    'api',
    InitializeTenancyByRequestData::class,
])->group(function () {
    Route::apiResource('school', SchoolController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::prefix('admin')->group(function () {
        Route::get('/customers', [App\Http\Controllers\Admin\CustomerController::class, 'index']);

        route::resource('/schools', SchoolController::class);
        route::resource('/equipaments', EquipamentController::class);
    });
});

Auth::routes();
