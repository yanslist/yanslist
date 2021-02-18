<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TrySomething;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {

    Route::get('/', [HomeController::class, 'home'])->name('home');
    Route::get('/new', [HomeController::class, 'new'])->name('new');
    Route::post('/new', [HomeController::class, 'store'])->name('store');
    Route::get('/l/{post}', [HomeController::class, 'view'])->name('view');

    if (config('app.debug')) {
        Route::get('/test', TrySomething::class)->name('test');
    }

});
