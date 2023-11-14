<?php

use App\Http\Controllers\Api\V1\Category\CategoryController;
use App\Http\Controllers\Api\V1\Channels\ChannelsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::group(['prefix' => 'v1',
    'namespace' => 'App\Http\Controllers\Api\V1'], function () {

    Route::prefix('auth')->group(function () {
        Route::post('register', ['uses' => 'Auth\AuthController@register']);
        Route::post('login', ['uses' => 'Auth\AuthController@login']);
    });


});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// api/v1
Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1',
    'middleware' => ['auth:sanctum']], function () {

    Route::prefix('user')->controller(\App\Http\Controllers\Api\V1\User\UserController::class)->group(function () {
        Route::get('list', 'list');
        Route::get('{user}', 'get');
        Route::post('create', 'create');
        Route::post('{user}/update', 'update');
        Route::delete('{user}/delete', 'delete');
    });

    Route::prefix('channel')->controller(ChannelsController::class)->group(function () {
        Route::get('list', 'list');
        Route::get('userChannels', 'userChannels');
        Route::get('privateChannels', 'privateChannels');
        Route::get('{channel}', 'get');
        Route::post('create', 'create');
        Route::post('{channel}/update', 'update');
        Route::delete('{channel}/delete', 'delete');
    });

    Route::prefix('notification')->controller(\App\Http\Controllers\Api\V1\Notifications\NotificationController::class)->group(function () {
        Route::get('list', 'list');
        Route::get('userNotifications', 'userNotifications');
        Route::get('{notification}', 'get');
        Route::post('create', 'create');
        Route::delete('{notification}/delete', 'delete');
        // Add a new route for listing user notifications

    });

    Route::prefix('notification-message')->controller(\App\Http\Controllers\Api\V1\NotificationMessage\NotificationMessageController::class)->group(function () {
        Route::get('list', 'list');
        Route::get('{notificationMessage}', 'get');
        Route::post('create', 'create');
    });
});

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function () {

    Route::prefix('category')->controller(CategoryController::class)->group(function () {
        Route::get('list', 'list');
        Route::get('{category}', 'get');
        Route::post('{channel}/update', 'update');
        Route::delete('{channel}/delete', 'delete');
    });

});
