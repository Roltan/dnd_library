<?php

use App\Http\Controllers\KlassController;
use App\Http\Controllers\RaceController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\SpellController;
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
    Route::get('/static/info/{klass}', [KlassController::class, 'getStaticInfo']);
    Route::get('/choice/info/{klass}', [KlassController::class, 'getChoiceInfo']);

    Route::prefix('/sub')->group(function () {
        Route::get('/list/{klass}', [KlassController::class, 'getSubKlass']);
    });
});

Route::prefix('/race')->group(function () {
    Route::get('/list', [RaceController::class, 'getList']);
    Route::get('/static/info/{race}', [RaceController::class, 'getStaticInfo']);
    Route::get('/choice/info/{race}', [RaceController::class, 'getChoiceInfo']);
});

Route::prefix('/skill')->group(function () {
    Route::post('/info', [SkillController::class, 'getInfo']);
});
Route::prefix('/spell')->group(function () {
    Route::post('/info', [SpellController::class, 'getInfo']);
});
