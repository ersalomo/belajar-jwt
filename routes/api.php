<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UserController,
    ArticleController,
    ArticleCommentController
};

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {

    Route::post('register', [UserController::class, 'register'])->name('register');
    Route::post('login', [UserController::class, 'login'])->name('login');
    Route::post('me', [UserController::class, 'me'])->name('me');
    Route::post('logout', [UserController::class, 'logout'])->name('logout');
    Route::post('refresh', [UserController::class, 'refresh'])->name('refresh');
    Route::get('index', [UserController::class, 'index'])->name('index');

    // article
    Route::post('store', [ArticleController::class, 'store'])->name('store');
    Route::get('index-article', [ArticleController::class, 'index'])->name('index-article');
    Route::get('show-article/{article?}', [ArticleController::class, 'show'])->name('show-article');
    Route::put('update/{id}', [ArticleController::class, 'update'])->name('update-article');
    Route::delete('delete/{article}', [ArticleController::class, 'destroy'])->name('delete-article');

    Route::controller(ArticleCommentController::class)
        ->prefix('comments')
        ->group(function () {
            Route::get('index', 'index');
            Route::post('store', 'store');
            Route::put('update/{articleComment?}', 'update');
            Route::delete('delete/{articleComment?}', 'delete');
        });
});
