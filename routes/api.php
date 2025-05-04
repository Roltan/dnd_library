<?php

use App\Http\Controllers\KlassController;
use App\Http\Controllers\RaceController;
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

Route::prefix('/klass')->group(function () {
    Route::get('/list', [KlassController::class, 'getList']);

    Route::prefix('/sub')->group(function () {
        Route::get('/list/{klass}', [KlassController::class, 'getSubKlass']);
    });
});

Route::prefix('/race')->group(function () {
    Route::get('/list', [RaceController::class, 'getList']);
});
