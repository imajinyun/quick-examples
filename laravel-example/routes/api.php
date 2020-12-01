<?php

use App\Http\Controllers\ArticleCategoryController;
use App\Http\Controllers\ArticleCommentController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\MechanicController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDegreeController;
use App\Http\Controllers\UserRoleController;
use App\Models\Car;
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

    Route::get('user/degree/test', [UserDegreeController::class, 'test'])->name('user.degree.test');
    Route::get('uesr/degree', [UserDegreeController::class, 'index'])->name('user.degree.list');
    Route::get('user/{id}/degree', [UserDegreeController::class, 'show'])->name('user.degree.show');

    Route::get('user/role/test', [UserRoleController::class, 'test'])->name('user.role.test');
    Route::get('user/role', [UserRoleController::class, 'index'])->name('user.role.list');
    Route::get('user/{id}/role', [UserRoleController::class, 'show'])->name('user.role.show');

    Route::get('role/test', [RoleController::class, 'test'])->name('role.test');
    Route::get('role', [RoleController::class, 'index'])->name('role.list');
    Route::get('{id}/role', [RoleController::class, 'show'])->name('role.show');
});

Route::prefix('article')->group(function () {
    Route::get('article/test', [ArticleController::class, 'test'])->name('article.test');
    Route::get('article', [ArticleController::class, 'index'])->name('article.list');
    Route::get('{id}/article', [ArticleController::class, 'show'])->name('article.show');

    Route::get('category/test', [ArticleCategoryController::class, 'test'])->name('article.category.test');
    Route::get('category', [ArticleCategoryController::class, 'index'])->name('article.category.list');
    Route::get('{id}/category', [ArticleCategoryController::class, 'show'])->name('article.category.show');

    Route::get('comment/test', [ArticleCommentController::class, 'test'])->name('article.comment.test');
    Route::get('comment', [ArticleCommentController::class, 'index'])->name('article.comment.list');
    Route::get('{id}/comment', [ArticleCommentController::class, 'show'])->name('article.comment.show');
});

Route::prefix('hasonethrough')->group(function () {
    Route::get('mechanic/test', [MechanicController::class, 'test'])->name('mechanic.test');
    Route::get('mechanic', [MechanicController::class, 'index'])->name('mechanic.list');
    Route::get('{id}mechanic', [MechanicController::class, 'show'])->name('mechanic.show');

    Route::get('car/test', [CarController::class, 'test'])->name('car.test');
    Route::get('car', [CarController::class, 'index'])->name('car.list');
    Route::get('{id}car', [CarController::class, 'index'])->name('car.show');

    Route::get('owner/test', [OwnerController::class, 'test'])->name('owner.test');
    Route::get('owner', [OwnerController::class, 'index'])->name('owner.list');
    Route::get('{id}/owner', [OwnerController::class, 'show'])->name('owner.show');
});

Route::prefix('hasmanythrough')->group(function () {
    Route::get('country/test', [CountryController::class, 'test'])->name('country.test');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
