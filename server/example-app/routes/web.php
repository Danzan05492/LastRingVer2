<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\InfoController;
use App\Http\Controllers\Admin\CategoryController;

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

//---личный кабинет
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
//--- круды в ЛК
Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
        Route::resource('/categories',CategoryController::class);
        Route::resource('/infos',InfoController::class);
    }
);
require __DIR__.'/auth.php';
