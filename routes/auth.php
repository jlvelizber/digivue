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
    // Componente de inicio de sesion
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');
    // Accion de inicio de sesion 
    Route::post('register', [RegisteredUserController::class, 'store']);
    //  Inicio de sesion
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');
    // Accion de inicio de sesion
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
    // Accion de olvido de contraseña
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');
    //  Accion que envia correo de solicitud de cambio de contraseña
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');
    // Recepta la solicitud de cambio de contraseña mediante el link enviado en el correo de solicitud de cambio de contraseña
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');
    
    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
