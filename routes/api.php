<?php

use App\Http\Controllers\AboutHeroController;
use App\Http\Controllers\AboutSecuraController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\HowWeWorksController;
use App\Http\Controllers\OurJournerController;
use App\Http\Controllers\OurTeamController;
use App\Http\Controllers\OurVisionMissionController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WhoWeAreController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewRatingController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\TagController;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

Route::prefix('user')->group(function () {
    Route::post('/register', [UserController::class, 'store']);
    Route::post('/login', [UserController::class, 'login']);
    Route::middleware('auth:api')->get('/detail', [UserController::class, 'getUserDetails']);
});
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/me', [UserController::class, 'me']);
    Route::delete('/logout', [UserController::class, 'logout']);
});

Route::prefix('sliders')->group(function () {
    Route::post('/store', [SliderController::class, 'store']);
    Route::get('/show/{id}', [SliderController::class, 'show']);
    Route::get('/get', [SliderController::class, 'get']);
    Route::delete('/delete/{id}', [SliderController::class, 'delete']);
    Route::post('/update/{id}', [SliderController::class, 'update']);
});

Route::prefix('who_we_are')->group(function () {
    Route::post('/main_info', [WhoWeAreController::class, 'storeMainInfo']);
    Route::post('/update/{id}', [WhoWeAreController::class, 'updateMainInfo']);
    Route::delete('/main_info/{id}', [WhoWeAreController::class, 'deleteMainInfo']);
    Route::get('/show_main_info', [WhoWeAreController::class, 'showMainInfo']);
    Route::get('/get_main_info/{id}', [WhoWeAreController::class, 'getMainInfo']);
    Route::post('/service_info', [WhoWeAreController::class, 'addServiceInfo']);
    Route::post('/update_service/{id}', [WhoWeAreController::class, 'updateServiceInfo']);
    Route::delete('/service_info/{id}', [WhoWeAreController::class, 'deleteServiceInfo']);
    Route::get('/show_service_info', [WhoWeAreController::class, 'getServiceInfo']);
    Route::get('/get_service/{id}', [WhoWeAreController::class, 'getServiceInfoById']);
});

Route::prefix('how_we_works')->group(function () {
    Route::post('/main_info', [HowWeWorksController::class, 'storeMainInfo']);
    Route::post('/service_info', [HowWeWorksController::class, 'addServiceInfo']);
    Route::get('/get_service_info', [HowWeWorksController::class, 'getServiceInfo']);
    Route::get('/get_main_info', [HowWeWorksController::class, 'getMainInfo']);
    Route::get('/show_main_info/{id}', [HowWeWorksController::class, 'showMainInfo']);
    Route::get('/show_service_info/{id}', [HowWeWorksController::class, 'showServiveInfo']);
    Route::post('/main_info/{id}', [HowWeWorksController::class, 'updateMainInfo']);
    Route::delete('/main_info/{id}', [HowWeWorksController::class, 'deleteMainInfo']);
    Route::post('/service_info/{id}', [HowWeWorksController::class, 'updateServiceInfo']);
    Route::delete('/service_info/{id}', [HowWeWorksController::class, 'deleteServiceInfo']);
});

Route::prefix('about_secura')->group(function () {
    Route::post('/store', [AboutSecuraController::class, 'storeAboutSecura']);
    Route::get('/get', [AboutSecuraController::class, 'getAboutSecura']);
    Route::get('/show/{id}', [AboutSecuraController::class, 'showAboutSecura']);
    Route::post('/update/{id}', [AboutSecuraController::class, 'updateAboutSecura']);
    Route::delete('/delete/{id}', [AboutSecuraController::class, 'deleteAboutSecura']);
});

Route::prefix('our_vision_mission')->group(function () {
    Route::post('/main_info', [OurVisionMissionController::class, 'storeMainInfo']);
    Route::post('/service_info', [OurVisionMissionController::class, 'addServiceInfo']);
    Route::get('/get_service_info', [OurVisionMissionController::class, 'getServiceInfo']);
    Route::get('/get_main_info', [OurVisionMissionController::class, 'getMainInfo']);
    Route::get('/show_main_info/{id}', [OurVisionMissionController::class, 'showMainInfo']);
    Route::get('/show_service_info/{id}', [OurVisionMissionController::class, 'showServiceInfo']);
    Route::post('/main_info/{id}', [OurVisionMissionController::class, 'updateMainInfo']);
    Route::delete('/main_info/{id}', [OurVisionMissionController::class, 'deleteMainInfo']);
    Route::post('/service_info/{id}', [OurVisionMissionController::class, 'updateServiceInfo']);
    Route::delete('/service_info/{id}', [OurVisionMissionController::class, 'deleteServiceInfo']);
});

Route::prefix('our_team')->group(function () {
    Route::post('/main_info', [OurTeamController::class, 'storeMainInfo']);
    Route::post('/service_info', [OurTeamController::class, 'addServiceInfo']);
    Route::get('/get_service_info', [OurTeamController::class, 'getServiceInfo']);
    Route::get('/get_main_info', [OurTeamController::class, 'getMainInfo']);
    Route::post('/main_info/{id}', [OurTeamController::class, 'updateMainInfo']);
    Route::get('/show_main_info/{id}', [OurTeamController::class, 'showMainInfo']);
    Route::get('/show_service_info/{id}', [OurTeamController::class, 'showServiceInfo']);
    Route::delete('/main_info/{id}', [OurTeamController::class, 'deleteMainInfo']);
    Route::post('/service_info/{id}', [OurTeamController::class, 'updateServiceInfo']);
    Route::delete('/service_info/{id}', [OurTeamController::class, 'deleteServiceInfo']);
});

Route::prefix('blogs')->group(function () {
    Route::post('/main_info', [BlogController::class, 'storeMainInfo']);
    Route::post('/main_info/{id}', [BlogController::class, 'updateMainInfo']);
    Route::delete('/main_info/{id}', [BlogController::class, 'deleteMainInfo']);
    Route::get('/main_info', [BlogController::class, 'getMainInfo']);
    Route::get('/get_blog/{id}', [BlogController::class, 'showBlogId']);
    Route::get('/show_blog', [BlogController::class, 'showLatestBlogs']);
    Route::get('/search', [BlogController::class, 'search']);
    Route::post('/{blogId}/add_comment', [BlogController::class, 'storeComment']);
    Route::get('{blogId}/comments', [BlogController::class, 'viewComment']); // Ensure this matches the method
    

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
    Route::get('/get', [CategoryController::class, 'get']);
    Route::get('/show/{id}', [CategoryController::class, 'show']);
    Route::get('/{id}/products', [CategoryController::class, 'showWithProducts']);
});


Route::prefix('our_journey')->group(function () {
    Route::post('/main_store', [OurJournerController::class, 'mainStore']);
    Route::get('/get_main_info', [OurJournerController::class, 'getMainInfo']);
    Route::post('/main_info/{id}', [OurJournerController::class, 'mainUpdate']);
    Route::delete('/main_info/{id}', [OurJournerController::class, 'deleteMainInfo']);
    Route::post('/counter_store', [OurJournerController::class, 'storeCounter']);
    Route::get('/get_counter_info', [OurJournerController::class, 'getCounters']);
    Route::get('/show_main_info/{id}', [OurJournerController::class, 'showMainInfo']);
    Route::get('/show_counter_info/{id}', [OurJournerController::class, 'showCounters']);
    Route::post('/counter_update/{id}', [OurJournerController::class, 'updateCounter']);
    Route::delete('/counter_info/{id}', [OurJournerController::class, 'deleteCounter']);
});

Route::prefix('products')->group(function () {
    Route::post('/store', [ProductController::class, 'store']);
    Route::get('/show', [ProductController::class, 'show']);
    Route::get('/filter', [ProductController::class, 'filter']);
    Route::get('/show_product/{id}', [ProductController::class, 'show_product']);
    Route::post('/update/{id}', [ProductController::class, 'update']);
    Route::delete('/delete/{id}', [ProductController::class, 'delete']);
    Route::post('{productId}/submit-review', [ProductController::class, 'submitReview']);
    Route::get('/reviews/{productId}', [ProductController::class, 'getReviews']);
    Route::get('/search-products', [ProductController::class, 'search']);

});


Route::prefix('tags')->group(function () {
    Route::post('/store', [TagController::class, 'store']);
    Route::post('/update/{id}', [TagController::class, 'update']);
    Route::delete('/delete/{id}', [TagController::class, 'delete']);
    Route::get('/get', [TagController::class, 'get']);
    Route::get('/show/{id}', [TagController::class, 'show']);
    Route::get('/{id}/products', [TagController::class, 'getProductsByTag']);
});


Route::prefix('brands')->group(function () {
    Route::post('/store', [BrandController::class, 'store']);
    Route::post('/update/{id}', [BrandController::class, 'update']);
    Route::delete('/delete/{id}', [BrandController::class, 'delete']);
    Route::get('/show', [BrandController::class, 'show']);
    Route::get('/index/{id}', [BrandController::class, 'index']);
    Route::get('/{id}/products', [BrandController::class, 'getProductsByBrand']);
});

Route::prefix('contact_us')->group(function () {
    Route::post('/store', [ContactUsController::class, 'store']);
    Route::post('/update/{id}', [ContactUsController::class, 'update']);
    Route::delete('/delete/{id}', [ContactUsController::class, 'delete']);
    Route::get('/show', [ContactUsController::class, 'show']);
    Route::get('/index/{id}', [ContactUsController::class, 'index']);
});



Route::prefix('reviews')->group(function () {
    Route::get('{productId}', [ReviewRatingController::class, 'index']);
    Route::post('{productId}/store', [ReviewRatingController::class, 'store'])->middleware('auth:sanctum');
});


Route::prefix('basket')->group(function () {
    Route::get('/index', [BasketController::class, 'show']);
    Route::get('/quantity', [BasketController::class, 'basketQuantity']);
    Route::get('/total', [BasketController::class, 'calculateTotal']);
    Route::post('/store', [BasketController::class, 'store']);
    Route::post('/updateQuantity/{action}', [BasketController::class, 'updateQuantity']);
    Route::delete('{basketId}/product/{productId}', [BasketController::class, 'removeProductFromBasket']);
});


Route::prefix('orders')->group(function () {
    Route::post('/add', [OrderController::class, 'add']);
    Route::get('/addresses', [OrderController::class, 'index']);
Route::delete('/addresses/{id}', [OrderController::class, 'destroy']);
});

Route::prefix('states')->group(function () {
    Route::post('/store', [StateController::class, 'store']);
    Route::post('/update/{id}', [StateController::class, 'update']);
    Route::delete('/delete/{id}', [StateController::class, 'delete']);
    Route::get('/index', [StateController::class, 'index']);
    Route::get('/show/{id}', [StateController::class, 'show']);
});
Route::prefix('cities')->group(function () {
    Route::get('/index', [CityController::class, 'index']); // Bütün cities
    Route::post('/store', [CityController::class, 'store']); // Şəhər əlavə et
    Route::get('/show/{id}', [CityController::class, 'show']); // Şəhər detalları
    Route::post('/update/{id}', [CityController::class, 'update']); // Şəhəri yenilə
    Route::delete('/delete/{id}', [CityController::class, 'destroy']); // Şəhəri sil
});

Route::prefix('favorites')->group(function () {
    Route::get('/get_favorites', [FavoriteController::class, 'showFavorites']);
    Route::get('/get_favoritId', [FavoriteController::class, 'showFavoriteID']);
    Route::post('/add_favorite/{productId}', [FavoriteController::class, 'addToFavorites'])->name('favorites.add'); 
    Route::delete('/{productId}', [FavoriteController::class, 'removeFromFavorites'])->name('favorites.remove');
});


