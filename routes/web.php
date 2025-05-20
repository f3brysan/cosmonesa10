<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\APIOauthController;
use App\Http\Controllers\Frontend\F_DashboardController;
use App\Http\Controllers\Frontend\F_AccountController;
use App\Http\Controllers\Frontend\F_ServicesController;
use App\Http\Controllers\Frontend\F_EventsController;
use App\Http\Controllers\Frontend\F_ProductController;

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

Route::get('/', [F_DashboardController::class, 'index']);
//account page
Route::get('/account', [F_AccountController::class, 'index']);
Route::get('/profile', [F_AccountController::class, 'profile']);
Route::get('/address', [F_AccountController::class, 'get_address']);
Route::get('/tenant-register', [F_AccountController::class, 'reg_tenant']);
Route::get('/tenant/data', [F_AccountController::class, 'get_tenant']);
Route::post('/savebio', [F_AccountController::class, 'save']);
Route::post('/saveaddress', [F_AccountController::class, 'save_address']);


// Route::post('/savebio', [F_AccountController::class, 'save'])->name('savebio');


//event page
Route::get('/events', [F_EventsController::class, 'index']);
Route::get('/detail-event/{slug}', [F_EventsController::class, 'detail']);
Route::get('/join', [F_EventsController::class, 'join']);


// service page
Route::get('/service-cat', [F_ServicesController::class, 'categories']);
Route::get('/get-service-cat', [F_ServicesController::class, 'getServiceCat']);
Route::get('/services/{slug}', [F_ServicesController::class, 'index']);
Route::get('/service_detail', [F_ServicesController::class, 'view']);
Route::get('/book', [F_ServicesController::class, 'schedule']);



// selling page
Route::get('/shop', [F_ProductController::class, 'index']);
Route::get('/product-detail/{slug}', [F_ProductController::class, 'product']);
Route::get('/cart', [F_ProductController::class, 'cart']);
Route::get('/co', [F_ProductController::class, 'checkout']);


//auth page
Route::get('/login', function () {
    return view('front.page.login.login');
})->name('login');

Route::post('logout', function () {
    // Log out user
    Auth::logout();
    // Redirect to login page
    return redirect()->route('login');
});

// oauth
Route::get('oauth/google', [APIOauthController::class, 'redirectToProvider'])->name('oauth.google');
Route::get('oauth/google/callback', [APIOauthController::class, 'handleProviderCallback'])->name('oauth.google.callback');
