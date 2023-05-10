<?php

use App\Http\Controllers\API\ListController;
use App\Http\Controllers\API\ListSwaggerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::middleware('auth:sanctum')
    ->group(function (\Illuminate\Routing\Router $router) {
        $router->get('/docs/pixel', [ListSwaggerController::class, 'swagger']);
        $router->get('/pixels', [ListController::class, 'getPixel']);
        $router->get('/pixel/create', [ListController::class, 'createPixel']);
        $router->delete('/pixel/delete/{pixelId}', [ListController::class, 'deletePixel']);
        $router->put('/pixel/update', [ListController::class, 'updatePixel']);
    });

