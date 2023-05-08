<?php

use App\Http\Controllers\IndexPagesViewController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PixelImageController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\Test;
use App\Http\Controllers\VerificationController;
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

Route::get('/test', [Test::class, 'index']);

Route::controller(IndexPagesViewController::class)->group(function() {
    Route::get('/', 'homePageShow')->name('home');
    Route::get('/registration', 'registrationShow');
    Route::get('/login', 'loginShow');
});

Route::controller(RegistrationController::class)->group(function() {
    Route::get('/registration/reg', 'signUpUser');
});

Route::controller(LoginController::class)->group(function() {
   Route::get('/login/log', 'auth');
});

Route::controller(PixelImageController::class)->group(function() {
    Route::get('/pixel/{userPixel}/pixel.gif', 'pixelImage');
    ROute::get('/get_user_pixel', 'getUserPixel');

});

Route::controller(StatisticController::class)->group(function() {
    Route::get('/get_column_statistic', 'getColumnStatistic');
});

Route::controller(VerificationController::class)->group(function (){
    Route::get('/email/verify', [VerificationController::class, 'notice'])->middleware('auth')->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->middleware(['auth', 'signed'])->name('verification.verify');
});
