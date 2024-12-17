<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\TwoFactorController;
use Illuminate\Support\Facades\Auth;

// Animal resource routes
Route::resource('animals', AnimalController::class);

// Homepage route
Route::get('/', [PageController::class, 'home']);
// About page route
Route::get('/about', [PageController::class, 'about']);
// Route for handling the form submission
Route::post('/submit', [PageController::class, 'submitForm'])->name('submitForm');

// Resourceful routes for items
Route::resource('items', ItemController::class);

// Route to display the items view
Route::get('/items', [ItemController::class, 'index'])->name('items.index');

// Other pages routes
Route::get('/donate', [PageController::class, 'donate']);
Route::get('/signin', [PageController::class, 'signin']);
Route::get('/guidelines', [PageController::class, 'guidelines']);
Route::get('/blog', [PageController::class, 'blog']);

// Static routes for adoption page
Route::get('/adopt', [AnimalController::class, 'index'])->name('adopt.index');

// Volunteer routes
Route::get('/volunteer', [VolunteerController::class, 'showForm'])->name('volunteer.form');
Route::post('/volunteer', [VolunteerController::class, 'submitForm']);

// Authentication routes
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Dashboard route, requires authentication
Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard')->middleware('auth');

// Two-factor authentication routes, requires authentication
Route::get('/two-factor', [TwoFactorController::class, 'showTwoFactorForm'])->name('two-factor.form');

// Handle the verification of the 2FA code (email method)
Route::post('/two-factor/verify-email', [TwoFactorController::class, 'verifyEmailCode'])->name('two-factor.verify.email');

// Handle the verification of the 2FA code (authenticator method)
Route::post('/two-factor/verify-authenticator', [TwoFactorController::class, 'verifyAuthenticatorCode'])->name('two-factor.verify.authenticator');

// Enable 2FA
Route::get('/two-factor/enable', [TwoFactorController::class, 'enableTwoFactor'])->name('two-factor.enable');

// Resend the 2FA code (email method)
Route::post('/resend-2fa-code', [TwoFactorController::class, 'resendCode'])->name('resend-2fa-code');

Route::get('/two-factor', [TwoFactorController::class, 'showTwoFactorForm'])->name('two-factor.form');


// 2FA routes (index and store) handled by TwoFactorController
Route::get('2fa', [TwoFactorController::class, 'index'])->name('2fa.index');
Route::post('2fa', [TwoFactorController::class, 'store'])->name('2fa.store');

// ** REMOVE the redundant logout route **
Route::delete('/animals/{id}', [AnimalController::class, 'destroy'])->middleware('admin')->name('animals.destroy');

// Route for showing the two-factor authentication challenge form (authenticated session)
Route::get('/two-factor-challenge', [AuthenticatedSessionController::class, 'showTwoFactorChallenge'])->name('two-factor.challenge');

// Handle the verification of the 2FA code (for 2FA enabled sessions)
//Route::post('/two-factor/verify', [AuthenticatedSessionController::class, 'verifyTwoFactorCode'])->name('two-factor.verify');

// Enable 2FA for the authenticated session
//Route::get('/two-factor/enable', [AuthenticatedSessionController::class, 'enableTwoFactor'])->name('two-factor.enable');
