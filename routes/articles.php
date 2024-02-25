<?php

use App\Http\Controllers\ArticleManagementController;
use Illuminate\Support\Facades\Route;

Route::middleware('tutorialsManagement')->group(function () {
    Route::get('tutorials/management', [ArticleManagementController::class, 'index'])
        ->name('management');
    
    Route::post('tutorials/management', [ArticleManagementController::class, 'addArticle'])
        ->name('addArticle');

    Route::put('tutorials/management', [ArticleManagementController::class, 'editArticle'])
        ->name('editArticle');

    Route::delete('tutorials/management', [ArticleManagementController::class, 'deleteArticle'])
        ->name('deleteArticle');
});