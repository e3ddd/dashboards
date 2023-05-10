<?php

use App\Http\Controllers\API\ListController;
use App\Http\Controllers\IndexPagesViewController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PixelImageController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\Test;
use App\Http\Controllers\TokensController;
use App\Http\Controllers\VerificationController;
use Illuminate\Http\Request;
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
    Route::get('/create_pixel', 'createPixelShow');
    Route::get('/dashboard', 'allStatisticDashboardShow');
    Route::get('/create_token', 'crateTokenShow');
});

Route::controller(RegistrationController::class)->group(function() {
    Route::get('/registration/reg', 'signUpUser');
});

Route::controller(LoginController::class)->group(function() {
   Route::get('/login/log', 'auth');
   Route::get('/logout', 'logout');
});

Route::controller(PixelImageController::class)->group(function() {
    Route::get('/pixel/{userPixel}/pixel.gif', 'pixelImage')->name('pixel');
    Route::get('/get_user_pixel', 'getUserPixels');
    Route::get('/create_pixel/create', 'createPixel');
    Route::delete('/pixel/delete/{pixelId}', 'deletePixel');
});

Route::controller(StatisticController::class)->group(function() {
    Route::get('/get_column_statistic', 'getColumnStatistic');
    Route::get('/get_pixel_column_statistic', 'getPixelColumnStatistic');
    Route::get('/get_referral_column_statistic', 'getPixelColumnStatistic');
    Route::get('/get_pixel_referrals', 'getPixelReferrals');

});

Route::controller(VerificationController::class)->group(function (){
    Route::get('/email/verify', 'notice')->middleware('auth')->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}',  'verify')->middleware(['auth', 'signed'])->name('verification.verify');
    Route::get('/check_auth', 'checkAuthUser');
});

Route::controller(TokensController::class)->group(function() {
   Route::get('/get_user_tokens', 'getUserTokens');
   Route::post('/create_token/create', 'createToken');
   Route::post('/destroy_token', 'destroyToken');
});


Route::get('/api/v1', [\App\Http\Controllers\API\ListSwaggerController::class, 'swagger']);



//Route::get('/test_page/test1', function (){
//    return view('Test.test1');
//});
//Route::get('/test_page/test2', function (){
//    return view('Test.test2');
//});
Route::get('/test_page/test3', function (){
    return view('Test.test3');
});
Route::get('/test_page/test4', function (){
    return view('Test.test4');
});
