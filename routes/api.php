<?php

use App\Http\Controllers\HowWeWorksController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WhoWeAreController;
use Illuminate\Support\Facades\Route;

// User Routes
Route::prefix('user')->group(function () {
    Route::post('/register', [UserController::class, 'store']);
    Route::post('/login', [UserController::class, 'login']);
});

// Slider Routes
Route::post('/sliders', [SliderController::class, 'index']);

// Who We Are Routes
Route::prefix('who_we_are')->group(function () {
    // Main Info
    Route::post('/main_info', [WhoWeAreController::class, 'storeMainInfo']);
    Route::post('/main_info/{id}', [WhoWeAreController::class, 'updateMainInfo']);
    Route::delete('/main_info/{id}', [WhoWeAreController::class, 'deleteMainInfo']);

    // Service Info
    Route::post('/service_info', [WhoWeAreController::class, 'addServiceInfo']);
    Route::post('/service_info/{id}', [WhoWeAreController::class, 'updateServiceInfo']);
    Route::delete('/service_info/{id}', [WhoWeAreController::class, 'deleteServiceInfo']);

    // Show Info
    Route::get('/show_service_info', [WhoWeAreController::class, 'getServiceInfo']);
    Route::get('/show_main_info', [WhoWeAreController::class, 'getMainInfo']);
});

// How We Works Routes
Route::prefix('how_we_works')->group(function () {
    Route::post('/main_info', [HowWeWorksController::class, 'storeMainInfo']);
    Route::post('/service_info', [HowWeWorksController::class, 'addServiceInfo']);
    Route::get('/show_service_info', [HowWeWorksController::class, 'getServiceInfo']); // Yalnız `show` üçün `get` istifadəsi
    Route::get('/show_main_info', [HowWeWorksController::class, 'getMainInfo']);

    Route::post('/main_info/{id}', [HowWeWorksController::class, 'updateMainInfo']);
    Route::delete('/main_info/{id}', [HowWeWorksController::class, 'deleteMainInfo']);

    Route::post('/service_info/{id}', [HowWeWorksController::class, 'updateServiceInfo']);
    Route::delete('/service_info/{id}', [HowWeWorksController::class, 'deleteServiceInfo']);
});
