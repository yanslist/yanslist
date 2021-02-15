<?php

use App\Http\Controllers\HomeController;
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

    Route::get('/test', [HomeController::class, 'test'])->name('test');

    //Route::resource('posts', \App\Http\Controllers\PostsController::class);

});
