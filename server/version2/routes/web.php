<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CondemnedController;
use App\Http\Controllers\Admin\IllnessController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    Route::resource('/condemneds',CondemnedController::class);
    Route::resource('/illnesses',IllnessController::class);
});


require __DIR__.'/auth.php';