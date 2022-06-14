<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\Authenticate;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login',[ AuthController::class , 'login']);
    Route::post('signup',[ AuthController::class , 'signUp']);

    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('user', [AuthController::class],'user');
    });
});

Route::middleware(['auth','isAdmin'])->group(function(){});

    Route::get('product/{id}', [ProductController::class, 'getProduct']);
    Route::get('product', [ProductController::class, 'getAll']);
    Route::post('product', [ProductController::class, 'create']);
    Route::delete('product/{id}', [ProductController::class, 'delete']);

    Route::get('article/{id}', [ArticleController::class,'getArticle']);
    Route::get('article', [ArticleController::class,'getAll']);
    Route::post('article', [ArticleController::class,'create']);
    Route::delete('article/{id}', [ArticleController::class,'delete']);


