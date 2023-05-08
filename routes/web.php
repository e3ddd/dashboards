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
    Route::get('/create_pixel', 'createPixel');
    Route::get('/dashboard', 'allStatisticDashboardShow');
});

Route::controller(RegistrationController::class)->group(function() {
    Route::get('/registration/reg', 'signUpUser');
});

Route::controller(LoginController::class)->group(function() {
   Route::get('/login/log', 'auth');
   Route::get('/logout', 'logout');
});

Route::controller(PixelImageController::class)->group(function() {
    Route::get('/pixel/{userPixel}/pixel.gif', 'pixelImage');
    Route::get('/get_user_pixel', 'getUserPixels');
    Route::get('/create_pixel/create', 'createPixel');
});

Route::controller(StatisticController::class)->group(function() {
    Route::get('/get_column_statistic', 'getColumnStatistic');
});

Route::controller(VerificationController::class)->group(function (){
    Route::get('/email/verify', 'notice')->middleware('auth')->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}',  'verify')->middleware(['auth', 'signed'])->name('verification.verify');
    Route::get('/check_auth', 'checkAuthUser');
});



Route::get('/test_page/test1', function (){
    return view('Test.test1');
});
Route::get('/test_page/test2', function (){
    return view('Test.test2');
});
Route::get('/test_page/test3', function (){
    return view('Test.test3');
});
Route::get('/test_page/test4', function (){
    return view('Test.test4');
});
