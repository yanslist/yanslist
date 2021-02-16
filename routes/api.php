<?php

use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\RegionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(
    [
        'middleware' => ['api']
    ], function () {

    Route::get('regions', [RegionController::class, 'index'])->name('api.regions.index');
    Route::post('posts/{post}/comments', [PostController::class, 'comments'])->name('api.posts.comments');
    Route::post('posts/{post}/comment', [PostController::class, 'comment'])->name('api.posts.comment');
});
