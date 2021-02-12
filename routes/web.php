<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {

    Route::get('/', [HomeController::class, 'home'])->name('home');
    Route::any('/search', [HomeController::class, 'search'])->name('search');
    Route::get('/new', [HomeController::class, 'new'])->name('new');
    Route::get('/test', [HomeController::class, 'test'])->name('test');

    //Route::resource('posts', \App\Http\Controllers\PostsController::class);

});
