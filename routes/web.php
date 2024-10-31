<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::group(['prefix'=>'dashboard', 'as'=>'dashboard.'], function(){
// Route::get('/main', [DashboardController::class, 'main']);
// Route::get('/create', [DashboardController::class, 'create'])->name('create');
// Route::post('/stores', [SliderController::class, 'stores'])->name('stores');
// Route::get('/slider', [SliderController::class, 'show']);
// });
