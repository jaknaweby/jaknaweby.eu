<?php

use App\Http\Controllers\ArticleManagementController;
use Illuminate\Support\Facades\Route;

Route::middleware('tutorialsManagement')->group(function () {
    Route::get('tutorials/management', [ArticleManagementController::class, 'index'])
        ->name('management');

    Route::get('tutorials/management/{id}', [ArticleManagementController::class, 'editPage'])
        ->name('editPage');
    
    Route::get('tutorials/management/{id}/content', [ArticleManagementController::class, 'editContent'])
        ->name('editContent');
    
    Route::post('tutorials/management', [ArticleManagementController::class, 'addArticle'])
        ->name('addArticle');

    Route::put('tutorials/management', [ArticleManagementController::class, 'editArticle'])
        ->name('editArticle');

    Route::delete('tutorials/management', [ArticleManagementController::class, 'deleteArticle'])
        ->name('deleteArticle');
});