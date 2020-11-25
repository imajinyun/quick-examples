<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
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

Route::prefix('user')->group(function () {
    Route::get('user', [UserController::class, 'index'])->name('user.list');
    Route::get('{id}/user', [UserController::class, 'show'])->name('user.show');
});

Route::prefix('article')->group(function () {
    Route::get('article', [ArticleController::class, 'index'])->name('article.list');
    Route::get('{id}/article', [ArticleController::class, 'show'])->name('article.show');
    Route::post('article', [ArticleController::class, 'store'])->name('article.create');
    Route::put('article', [ArticleController::class, 'update'])->name('article.update');
    Route::delete('{id}/article', [ArticleController::class, 'destroy'])->name('article.delete');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
