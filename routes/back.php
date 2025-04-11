<?php

use App\Http\Controllers\API\ApiRajaOngkirController;
use App\Http\Controllers\Backend\B_DashboardController;
use App\Http\Controllers\Backend\B_EventController;
use App\Http\Controllers\Backend\B_ProductCategoryController;
use App\Http\Controllers\Backend\B_ProductController;
use App\Http\Controllers\Backend\B_UsersController;
use App\Http\Controllers\Backend\B_UserSettingsController;
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
    Route::get('event', [B_EventController::class, 'index']);
    Route::get('event/create', [B_EventController::class, 'create']);
    Route::post('event/store', [B_EventController::class, 'store']);
    Route::get('event/detail/{slug}', [B_EventController::class, 'show']);
    Route::get('event/edit/{id}', [B_EventController::class, 'edit']);
    
    Route::get('product', [B_ProductController::class, 'index']);
    Route::get('product/create', [B_ProductController::class, 'create']);

    Route::get('product-categories', [B_ProductCategoryController::class, 'index']);
    Route::get('product-categories/edit/{id}', [B_ProductCategoryController::class, 'edit']);
    Route::post('product-categories/store', [B_ProductCategoryController::class, 'store']);
    Route::post('product-categories/destroy', [B_ProductCategoryController::class, 'destroy']);
});

Route::group(['middleware' => ['auth', 'role:superadmin|pengelola']], function () {
    Route::get('master/pengguna', [B_UsersController::class, 'index']);
});

// API RAJA ONGKIR
Route::get('api/provinces', [APIRajaOngkirController::class, 'getProvinces']);
Route::get('api/cities/{id}', [APIRajaOngkirController::class, 'getCities']);
Route::post('api/checkOngkir', [APIRajaOngkirController::class, 'checkOngkir']);

