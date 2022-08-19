<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PointApiController;
use App\Http\Controllers\Api\CondemnedApiController;
use App\Http\Controllers\Api\FreedomApiController;
use App\Http\Controllers\Api\NodeApiController;
use App\Http\Controllers\Api\UpdateController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
//RestAPI
Route::group(['middleware'=>'auth:sanctum'],function(){
    Route::get('points', [PointApiController::class, 'index']);
    Route::get('condemneds', [CondemnedApiController::class, 'index']);
    Route::get('freedoms', [FreedomApiController::class, 'index']);
    Route::get('nodes', [NodeApiController::class, 'index']);
    Route::put('points/update/{id}',[PointApiController::class,'update']); 
    Route::put('points/updateAll/',[PointApiController::class,'updateAll']); 
    Route::get('update/getAll/{lastUpdate}',[UpdateController::class,'getAll']); 
});