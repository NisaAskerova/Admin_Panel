<?php

use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WhoWeAreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [UserController::class, 'store']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/sliders', [SliderController::class, 'index']);

// Main Information Routes
Route::post('/who_we_are/main_info', [WhoWeAreController::class, 'storeMainInfo']);
Route::get('/who_we_are/main_info/{id}', [WhoWeAreController::class, 'updateMainInfo']);
Route::delete('/who_we_are/main_info/{id}', [WhoWeAreController::class, 'deleteMainInfo']);

// Service Information Routes
Route::post('/who_we_are/service_info', [WhoWeAreController::class, 'addServiceInfo']);
Route::get('/who_we_are/service_info/{id}', [WhoWeAreController::class, 'updateServiceInfo']);
Route::delete('/who_we_are/service_info/{id}', [WhoWeAreController::class, 'deleteServiceInfo']);

// GET routes
Route::get('/who_we_are/service_info', [WhoWeAreController::class, 'getServiceInfo']);
Route::get('/who_we_are/main_info', [WhoWeAreController::class, 'getMainInfo']);

// Route::get('/who_we_are/service_info/{id}', [WhoWeAreController::class, 'getServiceInfoById']);


