<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'dashboard', 'as'=>'dashboard.'], function(){
Route::get('/main', [DashboardController::class, 'main']);
});
