<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ArticlesController;


Route::view('/', 'index')->name('index');

Route::get('tutorials', [ArticlesController::class, 'index'])->name('tutorials');
Route::view('tutorials/login', 'auth.login')->name('login');

Route::get('tutorials/{lang}', [ArticlesController::class, 'show']);
Route::get('tutorials/{lang}/{filename}', [ArticlesController::class, 'show']);