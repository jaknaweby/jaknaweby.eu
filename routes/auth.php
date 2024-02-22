<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('tutorials/register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('tutorials/register', [RegisteredUserController::class, 'store']);

    Route::get('tutorials/login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('tutorials/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('tutorials/forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('tutorials/forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('tutorials/reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('tutorials/reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('tutorials/verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('tutorials/verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('tutorials/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('tutorials/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('tutorials/profile', [ProfileController::class, 'update'])->name('profile.update');
    
    Route::delete('tutorials/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('tutorials/confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('tutorials/confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('tutorials/password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('tutorials/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
