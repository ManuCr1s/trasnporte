<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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
Route::controller(AuthController::class)->group(function(){
    Route::get('/','showLogin');
    Route::get('/login','showLogin')->name('login');
    Route::post('/login','login');
});
Route::middleware(['auth','role:admin|user'])->group(function(  ){
    Route::get('/dashboard',[AuthController::class,'begin'])->name('begin');
    Route::post('/loguot',[AuthController::class,'logout'])->name('logout');
});
Route::middleware(['auth','role:admin'])->prefix('admin')->group(function(){
    Route::get('users/create',[UserController::class,'create'])->name('create');
    Route::post('users/index',[UserController::class,'index']);
    Route::post('users',[UserController::class,'store']);
    Route::post('/dni',[AuthController::class,'dni']);
    Route::post('users/destroy',[UserController::class,'destroy']);
});
Route::middleware(['auth','role:user'])->prefix('user')->group(function(){
    
});
/*
Route::controller(UserController::class)->group(function(){
    Route::get('/','index')->name('login');
    Route::get('/login','index')->name('login');
});*/