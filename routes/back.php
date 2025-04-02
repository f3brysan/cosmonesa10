<?php

use App\Http\Controllers\API\ApiRajaOngkirController;
use App\Http\Controllers\Backend\B_DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => ['auth']], function () {
    Route::get('dashboard', [B_DashboardController::class, 'index']);
});

// API RAJA ONGKIR
Route::get('api/provinces', [APIRajaOngkirController::class, 'getProvinces']);
Route::get('api/cities/{id}', [APIRajaOngkirController::class, 'getCities']);
Route::post('api/checkOngkir', [APIRajaOngkirController::class, 'checkOngkir']);

