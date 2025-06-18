<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\B_EventController;
use App\Http\Controllers\Backend\B_KioskController;
use App\Http\Controllers\Backend\B_UsersController;
use App\Http\Controllers\API\APIRajaOngkirController;
use App\Http\Controllers\Backend\B_ProductController;
use App\Http\Controllers\Backend\B_ServiceController;
use App\Http\Controllers\Backend\B_DashboardController;
use App\Http\Controllers\Backend\B_UserSettingsController;
use App\Http\Controllers\Backend\B_ProductCategoryController;
use App\Http\Controllers\Backend\B_ServiceCategoryController;
use App\Http\Controllers\Backend\B_TransactionController;

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

    Route::get('event/participants/{id}', [B_EventController::class, 'eventParticipants']);

    Route::get('product', [B_ProductController::class, 'index']);
    Route::get('product/create', [B_ProductController::class, 'create']);
    Route::post('product/store', [B_ProductController::class, 'store']);
    Route::post('product/store-images', [B_ProductController::class, 'storeImages']);
    Route::get('product/detail/{slug}', [B_ProductController::class, 'show']);
    Route::get('product/images/{id}', [B_ProductController::class, 'imagesShow']);
    Route::get('product/edit/{slug}', [B_ProductController::class, 'edit']);

    Route::get('product-categories', [B_ProductCategoryController::class, 'index']);
    Route::get('product-categories/edit/{id}', [B_ProductCategoryController::class, 'edit']);
    Route::post('product-categories/store', [B_ProductCategoryController::class, 'store']);
    Route::post('product-categories/destroy', [B_ProductCategoryController::class, 'destroy']);

    Route::get('service-categories', [B_ServiceCategoryController::class, 'index']);
    Route::get('service-categories/edit/{id}', [B_ServiceCategoryController::class, 'edit']);
    Route::post('service-categories/store', [B_ServiceCategoryController::class, 'store']);
    Route::post('service-categories/destroy', [B_ServiceCategoryController::class, 'destroy']);

    Route::get('service-provider-list', [B_KioskController::class, 'index']);

    Route::get('transaction-history', [B_TransactionController::class, 'index']);
    Route::post('transaction-history/approve', [B_TransactionController::class, 'approve']);    
});

Route::group(['middleware' => ['auth', 'role:superadmin|pengelola']], function () {
    Route::get('master/pengguna', [B_UsersController::class, 'index']);
});


Route::group(['middleware' => ['auth', 'role:seller']], function () {
    Route::get('kiosku/service', [B_KioskController::class, 'sellerService']);
    Route::get('kiosku/service-history', [B_KioskController::class, 'serviceHistory']);
    Route::post('kiosku/about/update', [B_KioskController::class, 'aboutUpdate']);

    Route::get('kiosku/service/create', [B_ServiceController::class, 'create']);
    Route::get('kiosku/service/edit/{id}', [B_ServiceController::class, 'edit']);
    Route::post('kiosku/service/store', [B_ServiceController::class, 'store']);
    Route::post('kiosku/service/destroy', [B_ServiceController::class, 'destroy']);
    Route::get('kiosku/service/set-slot/{id}', [B_ServiceController::class, 'setSlot']);
    Route::get('kiosku/service/edit-slot/{id}', [B_ServiceController::class, 'editSlot']);
    Route::post('kiosku/service/add-slot', [B_ServiceController::class, 'addSlot']);
    Route::post('kiosku/service/destroy-slot', [B_ServiceController::class, 'destroySlot']);

});

// API RAJA ONGKIR
Route::get('api/provinces', [APIRajaOngkirController::class, 'getProvinces']);
Route::get('api/cities/{id}', [APIRajaOngkirController::class, 'getCities']);
Route::post('api/checkOngkir', [APIRajaOngkirController::class, 'checkOngkir']);


