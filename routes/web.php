<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\APIOauthController;
use App\Http\Controllers\Frontend\F_DashboardController;
use App\Http\Controllers\Frontend\F_AppointmentController;
use App\Http\Controllers\Frontend\F_WorkshopController;

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
Route::get('/book', [F_AppointmentController::class, 'index']);
Route::get('/ws', [F_WorkshopController::class, 'index']);

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
