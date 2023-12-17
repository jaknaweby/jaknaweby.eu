<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ArticlesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('tutorials/{lang}/{article}', [PagesController::class, 'showArticle']);
// Route::get('tutorials/{lang}', [PagesController::class, 'showArticle']);

// Route::get('tutorials', function () {
//     return "Tutorials main page";
// });

Route::get('tutorials', [ArticlesController::class, 'index']);

Route::get('tutorials/{lang}', [ArticlesController::class, 'show']);
Route::get('tutorials/{lang}/{filename}', [ArticlesController::class, 'show']);