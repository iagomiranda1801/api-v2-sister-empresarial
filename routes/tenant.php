<?php

declare(strict_types=1);

use App\Http\Controllers\Api\v1\Tenancy\SchoolController;
use App\Http\Controllers\EquipamentController;
use App\Http\Controllers\PushController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/
use Stancl\Tenancy\Middleware\InitializeTenancyByPath;

Route::group([
  'prefix' => '/{tenant}',
  'middleware' => [InitializeTenancyByPath::class],
], function () {
  Route::resource('/school', SchoolController::class);
  Route::get('/push', [PushController::class,'index']);
  Route::post('/result', [PushController::class, 'result']);
});
