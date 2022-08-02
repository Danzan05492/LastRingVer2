<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CondemnedController;
use App\Http\Controllers\Admin\IllnessController;
use App\Http\Controllers\Admin\FreedomController;
use App\Http\Controllers\Admin\NodeController;
use App\Http\Controllers\Admin\PointController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
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
    //Дополнительные руты
    Route::get('/freedoms/calendar-form/{freedom}', [FreedomController::class,'calendarForm'])->name('freedoms.calendar-form');
    Route::get('/freedoms/make-calendar/{freedom}', [FreedomController::class,'makeCalendar'])->name('freedoms.make-calendar');
    Route::get('/freedoms/calendar-change-status/{freedom}/{status}', [FreedomController::class,'calendarChangeStatus'])->name('freedoms.calendar-change-status');
    Route::get('/points/calendar-loader/', [PointController::class,'calendarLoader']);
    //Основные ресурсы
    Route::resource('/condemneds',CondemnedController::class);    
    Route::resource('/freedoms',FreedomController::class);    
    Route::resource('/points',PointController::class);
    Route::resource('/nodes',NodeController::class)->middleware('myadmin');
    Route::resource('/illnesses',IllnessController::class)->middleware('myadmin');
    Route::resource('/users',UserController::class)->middleware('myadmin');
    
});


require __DIR__.'/auth.php';
require __DIR__.'/mobileAuth.php';
