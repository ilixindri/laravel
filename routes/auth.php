<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/signin/mail', [AuthenticatedSessionController::class, 'mail']);
    Route::get('/transfer/mail', [AuthenticatedSessionController::class, 'mailTransfer']);

    Route::get('/signin/pass/auth', [AuthenticatedSessionController::class, 'pass']);
	Route::POST('/transfer/pass/auth', [AuthenticatedSessionController::class, 'passTransfer']);
    
	Route::get('/signin/pass/register', [RegisteredUserController::class, 'pass']);
	Route::POST('/transfer/pass/register', [RegisteredUserController::class, 'passTransfer']);

    Route::get('/signin/new', [AuthenticatedSessionController::class, 'new']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');

	
	Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
			->middleware('throttle:6,1')
			->name('verification.send');

Route::get('verify-email', EmailVerificationPromptController::class)
			->name('verification.notice');

Route::middleware('auth')->group(function () {

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');


    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'patch'])->name('password.patch');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
