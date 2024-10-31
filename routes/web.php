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
// düzəldi ) COX sag olun
// daha hər dəfə githudan yükləməyin sadəcə burdan reloada basın son kodlar gələcək 

// oldu

// indi etmirəm çünkü iki dənə dəyişikliyiniz var onları göndərməsəz təzə kodlar çəkə bilməyəcksiz
// gərək son kodları göndərək ki təzələri çəkə bilək  bir də çalışın ikiniz eyni faylda çox işləməyin conflick(çaxışma) olacaq yoxsa 
// yəni ikində web.php faylında işləyəcəksizsə bacarın eyni sətirlərə kod yazmayın fərli sətirlər olsun yoxsa kodlar çaxışacaq ) tamam
//başqa nəsə problem var?helekı yox 
//tamamdır cox sag olun muəllim
// buyurun)