<?php

use App\Http\Controllers\AboutHeroController;
use App\Http\Controllers\AboutSecuraController;
use App\Http\Controllers\HowWeWorksController;
use App\Http\Controllers\OurJournerController;
use App\Http\Controllers\OurTeamController;
use App\Http\Controllers\OurVisionMissionController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WhoWeAreController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;

// User routes
Route::prefix('user')->group(function () {
    Route::post('/register', [UserController::class, 'store']);
    Route::post('/login', [UserController::class, 'login']);
});

// Slider routes
Route::prefix('sliders')->group(function () {
    Route::post('/store', [SliderController::class, 'store']);
    Route::get('/show', [SliderController::class, 'show']);
    Route::delete('/delete/{id}', [SliderController::class, 'delete']);
    Route::post('/update/{id}', [SliderController::class, 'update']);
});

// Who We Are routes
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

// How We Works routes
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

// About Secura routes
Route::prefix('about_secura')->group(function () {
    Route::post('/store', [AboutSecuraController::class, 'storeAboutSecura']);
    Route::get('/show', [AboutSecuraController::class, 'getAboutSecura']);
    Route::post('/update/{id}', [AboutSecuraController::class, 'updateAboutSecura']);
    Route::delete('/delete/{id}', [AboutSecuraController::class, 'deleteAboutSecura']);
});

// Our Journey routes (duplicate removed)
Route::prefix('our_journey')->group(function () {
    Route::post('/store', [OurJournerController::class, 'storeAboutSecura']);
});

// Our Vision and Mission routes
Route::prefix('our_vision_mission')->group(function () {
    Route::post('/main_info', [OurVisionMissionController::class, 'storeMainInfo']);
    Route::post('/service_info', [OurVisionMissionController::class, 'addServiceInfo']);
    Route::get('/show_service_info', [OurVisionMissionController::class, 'getServiceInfo']);
    Route::get('/show_main_info', [OurVisionMissionController::class, 'getMainInfo']);
    Route::post('/main_info/{id}', [OurVisionMissionController::class, 'updateMainInfo']);
    Route::delete('/main_info/{id}', [OurVisionMissionController::class, 'deleteMainInfo']);

    Route::post('/service_info/{id}', [OurVisionMissionController::class, 'updateServiceInfo']);
    Route::delete('/service_info/{id}', [OurVisionMissionController::class, 'deleteServiceInfo']);
});

// Our Team routes
Route::prefix('our_team')->group(function () {
    Route::post('/main_info', [OurTeamController::class, 'storeMainInfo']);
    Route::post('/service_info', [OurTeamController::class, 'addServiceInfo']);
    Route::get('/show_service_info', [OurTeamController::class, 'getServiceInfo']);
    Route::get('/show_main_info', [OurTeamController::class, 'getMainInfo']);
    Route::post('/main_info/{id}', [OurTeamController::class, 'updateMainInfo']);
    Route::delete('/main_info/{id}', [OurTeamController::class, 'deleteMainInfo']);
    Route::post('/service_info/{id}', [OurTeamController::class, 'updateServiceInfo']);
    Route::delete('/service_info/{id}', [OurTeamController::class, 'deleteServiceInfo']);
});

// Blog routes
Route::prefix('blogs')->group(function () {
    Route::post('/main_info', [BlogController::class, 'storeMainInfo']);
    Route::post('/main_info/{id}', [BlogController::class, 'updateMainInfo']);
    Route::delete('/main_info/{id}', [BlogController::class, 'deleteMainInfo']);
    Route::get('/main_info', [BlogController::class, 'getMainInfo']);
    
    Route::post('/store', [BlogController::class, 'store']);
    Route::post('/update/{id}', [BlogController::class, 'update']);
    Route::delete('/delete/{id}', [BlogController::class, 'delete']);
    Route::get('/show', [BlogController::class, 'show']);

});

Route::prefix('about_hero')->group(function () {
    Route::post('/store', [AboutHeroController::class, 'store']);
    Route::post('/update/{id}', [AboutHeroController::class, 'update']);
    Route::delete('/delete/{id}', [AboutHeroController::class, 'delete']);
    Route::get('/show', [AboutHeroController::class, 'show']);
});

Route::prefix('categories')->group(function () {
    Route::post('/store', [CategoryController::class, 'store']);
    Route::post('/update/{id}', [CategoryController::class, 'update']);
    Route::delete('/delete/{id}', [CategoryController::class, 'delete']);
    Route::get('/show', [CategoryController::class, 'show']);
});


Route::prefix('our_journey')->group(function () {
    Route::post('/main_store', [OurJournerController::class, 'mainStore']);
    Route::get('/show_main_info', [OurJournerController::class, 'getMainInfo']);
    Route::post('/main_info/{id}', [OurJournerController::class, 'mainUpdate']);
    Route::delete('/main_info/{id}', [OurJournerController::class, 'deleteMainInfo']);

    Route::post('/counter_store', [OurJournerController::class, 'storeCounter']);
    Route::get('/show_counter_info', [OurJournerController::class, 'getCounters']);
    Route::post('/counter_update/{id}', [OurJournerController::class, 'updateCounter']);
    Route::delete('/counter_info/{id}', [OurJournerController::class, 'deleteCounter']);
});