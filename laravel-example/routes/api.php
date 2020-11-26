<?php

use App\Http\Controllers\ArticleCategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDegreeController;
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
    Route::get('test', [UserController::class, 'test'])->name('user.test');
    Route::get('user', [UserController::class, 'index'])->name('user.list');
    Route::get('{id}/user', [UserController::class, 'show'])->name('user.show');
    Route::post('user', [UserController::class, 'store'])->name('user.create');
    Route::put('user', [UserController::class, 'update'])->name('user.update');
    Route::delete('user', [UserController::class, 'destroy'])->name('user.destroy');

    Route::get('degree/test', [UserDegreeController::class, 'test'])->name('user.degree.test');
    Route::get('degree', [UserDegreeController::class, 'index'])->name('user.degree.list');
    Route::get('{id}/degree', [UserDegreeController::class, 'show'])->name('user.degree.show');
});

Route::prefix('article')->group(function () {
    Route::get('article', [ArticleController::class, 'index'])->name('article.list');
    Route::get('{id}/article', [ArticleController::class, 'show'])->name('article.show');
    Route::post('article', [ArticleController::class, 'store'])->name('article.create');
    Route::put('article', [ArticleController::class, 'update'])->name('article.update');
    Route::delete('{id}/article', [ArticleController::class, 'destroy'])->name('article.delete');

    Route::get('category/test', [ArticleCategoryController::class, 'test'])->name('article.category.test');
    Route::get('category', [ArticleCategoryController::class, 'index'])->name('article.category.list');
    Route::get('{id}/category', [ArticleCategoryController::class, 'show'])->name('article.category.show');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
