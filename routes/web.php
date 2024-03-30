<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\ArticlesController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsUserAdmin;
use App\Livewire\DynamicElements;

Route::get('tutorials/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('tutorials/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('tutorials/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('tutorials/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });


// Loads auth routes sooner than the web ones
require __DIR__.'/auth.php';
require __DIR__.'/articles.php';


Route::view('/', 'index')->name('index');

Route::get('tutorials', [ArticlesController::class, 'index'])->name('tutorials');

Route::get('tutorials/{lang}', [ArticlesController::class, 'show']);
Route::get('tutorials/{lang}/{filename}', [ArticlesController::class, 'show']);
