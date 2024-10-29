<?php

use App\Http\Controllers\AboutSecuraController;
use App\Http\Controllers\HowWeWorksController;
use App\Http\Controllers\OurJournerController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WhoWeAreController;
use Illuminate\Support\Facades\Route;

//  Routes
Route::prefix('user')->group(function () {
    Route::post('/register', [UserController::class, 'store']);
    Route::post('/login', [UserController::class, 'login']);
});

Route::prefix('sliders')->group(function () {
    Route::post('/store', [SliderController::class, 'store']);
    Route::get('/show', [SliderController::class, 'show']);
    Route::delete('/delete/{id}', [SliderController::class, 'delete']);
    Route::post('/update/{id}', [SliderController::class, 'update']);

});

Route::prefix('who_we_are')->group(function () {
    Route::post('/main_info', [WhoWeAreController::class, 'storeMainInfo']);
    Route::post('/main_info/{id}', [WhoWeAreController::class, 'updateMainInfo']);
    Route::delete('/main_info/{id}', [WhoWeAreController::class, 'deleteMainInfo']);

    Route::post('/service_info', [WhoWeAreController::class, 'addServiceInfo']);
    Route::post('/service_info/{id}', [WhoWeAreController::class, 'updateServiceInfo']);
    Route::delete('/service_info/{id}', [WhoWeAreController::class, 'deleteServiceInfo']);

    Route::get('/show_service_info', [WhoWeAreController::class, 'getServiceInfo']);
    Route::get('/show_main_info', [WhoWeAreController::class, 'getMainInfo']);
});

Route::prefix('how_we_works')->group(function () {
    Route::post('/main_info', [HowWeWorksController::class, 'storeMainInfo']);
    Route::post('/service_info', [HowWeWorksController::class, 'addServiceInfo']);
    Route::get('/show_service_info', [HowWeWorksController::class, 'getServiceInfo']);
    Route::get('/show_main_info', [HowWeWorksController::class, 'getMainInfo']);

    Route::post('/main_info/{id}', [HowWeWorksController::class, 'updateMainInfo']);
    Route::delete('/main_info/{id}', [HowWeWorksController::class, 'deleteMainInfo']);

    Route::post('/service_info/{id}', [HowWeWorksController::class, 'updateServiceInfo']);
    Route::delete('/service_info/{id}', [HowWeWorksController::class, 'deleteServiceInfo']);
});

Route::prefix('about_secura')->group(function () {
    Route::post('/store', [AboutSecuraController::class, 'storeAboutSecura']);
    Route::get('/show', [AboutSecuraController::class, 'getAboutSecura']);
    Route::post('/update/{id}', [AboutSecuraController::class, 'updateAboutSecura']);
    Route::delete('/delete/{id}', [AboutSecuraController::class, 'deleteAboutSecura']);
});

Route::prefix('our_journey')->group(function () {
    Route::post('/store', [OurJournerController::class, 'storeAboutSecura']);
});
