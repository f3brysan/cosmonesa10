<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\APIOauthController;
use App\Http\Controllers\Frontend\F_DashboardController;
use App\Http\Controllers\Frontend\F_AccountController;
use App\Http\Controllers\Frontend\F_BookingController;
use App\Http\Controllers\Frontend\F_CartController;
use App\Http\Controllers\Frontend\F_ServicesController;
use App\Http\Controllers\Frontend\F_EventsController;
use App\Http\Controllers\Frontend\F_PaymentController;
use App\Http\Controllers\Frontend\F_ProductController;
use App\Http\Controllers\Frontend\F_TransactionController;

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

Route::get('/get_profiles', [F_DashboardController::class, 'getProfiles']);
Route::get('/current_profile', [F_DashboardController::class, 'currentProfile']);

Route::group(['middleware' => ['auth']], function () {
    // account
    Route::get('/account', [F_AccountController::class, 'index']);
    Route::get('/profile', [F_AccountController::class, 'profile']);
    Route::get('/address', [F_AccountController::class, 'get_address']);
    Route::get('/tenant-register', [F_AccountController::class, 'reg_tenant']);
    Route::get('tenant-register/check', [F_AccountController::class, 'reg_tenant_check']);
    Route::post('tenant-register/store', [F_AccountController::class, 'reg_tenant_store']);
    Route::get('/tenant/data', [F_AccountController::class, 'get_tenant']);
    Route::post('/savebio', [F_AccountController::class, 'save']);
    Route::post('/saveaddress', [F_AccountController::class, 'save_address']);

    // booking
    Route::get('service-booking/{service_id}/{date}/{slot_id}', [F_BookingController::class, 'service_booking']);
    // Transactions
    Route::get('riwayat-transaksi', [F_TransactionController::class, 'index']);
});


// Route::post('/savebio', [F_AccountController::class, 'save'])->name('savebio');


//event page
Route::get('/events', [F_EventsController::class, 'index']);
Route::get('/detail-event/{slug}', [F_EventsController::class, 'detail']);
Route::get('/join', [F_EventsController::class, 'join']);
Route::get('/participations', [F_AccountController::class, 'participation']);
Route::get('/cert/{id}', [F_EventsController::class, 'cert']);
Route::post('/join_event', [F_EventsController::class, 'joinEvent']);
Route::get('/test_id', [F_EventsController::class, 'test_id']);


// service page
Route::get('/service-cat', [F_ServicesController::class, 'categories']);
Route::post('/get-service', [F_ServicesController::class, 'getServices']);
Route::get('/get-service-cat', [F_ServicesController::class, 'getServiceCat']);
Route::get('/services/{slug}', [F_ServicesController::class, 'index']);
Route::get('/service_detail/{id}', [F_ServicesController::class, 'view']);
Route::get('/book', [F_ServicesController::class, 'schedule']);



// selling page
Route::get('/shop', [F_ProductController::class, 'index']);
Route::get('/shop_lists', [F_ProductController::class, 'get_products']);
Route::get('/product-detail/{slug}', [F_ProductController::class, 'product']);
Route::get('/co', [F_ProductController::class, 'checkout']);

Route::get('/cart', [F_CartController::class, 'index']);
Route::post('/cart/add', [F_CartController::class, 'addItems']);
Route::post('/cart/change-qty', [F_CartController::class, 'changeQty']);
Route::get('/cart/count-unpaid', [F_CartController::class, 'countUnpaidItems']);

// checkout
Route::post('/checkout', [F_CartController::class, 'checkout']);
Route::get('checkout/{transaction_id}', [F_PaymentController::class, 'index']);
Route::post('checkout-store', [F_PaymentController::class, 'storePayment']);

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
