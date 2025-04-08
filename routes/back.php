<?php

use App\Http\Controllers\API\ApiRajaOngkirController;
use App\Http\Controllers\Backend\B_DashboardController;
use App\Http\Controllers\Backend\B_UsersController;
use App\Http\Controllers\Backend\B_UserSettingsController;
use App\Http\Controllers\Backend\B_WorkshopController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth', 'role:superadmin|pengelola|seller']], function () {
    Route::get('dashboard', [B_DashboardController::class, 'index']);

    Route::get('user/settings', [B_UserSettingsController::class, 'index']);
    Route::get('user/settings/profile/edit', [B_UserSettingsController::class, 'editProfile']);
    Route::post('user/settings/profile/update', [B_UserSettingsController::class, 'updateProfile']);
});

// Workshop
Route::group(['middleware' => ['auth', 'role:superadmin|pengelola']], function () {
    Route::get('workshop', [B_WorkshopController::class, 'index']);
    Route::get('workshop/create', [B_WorkshopController::class, 'create']);
    Route::post('workshop/store', [B_WorkshopController::class, 'store']);
    Route::get('workshop/detail/{id}', [B_WorkshopController::class, 'show']);
    Route::get('workshop/edit/{id}', [B_WorkshopController::class, 'edit']);
    

});

Route::group(['middleware' => ['auth', 'role:superadmin|pengelola']], function () {
    Route::get('master/pengguna', [B_UsersController::class, 'index']);
});

// API RAJA ONGKIR
Route::get('api/provinces', [APIRajaOngkirController::class, 'getProvinces']);
Route::get('api/cities/{id}', [APIRajaOngkirController::class, 'getCities']);
Route::post('api/checkOngkir', [APIRajaOngkirController::class, 'checkOngkir']);

