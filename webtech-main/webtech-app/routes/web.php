<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
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
Route::get('/adopt', [AnimalController::class, 'adopt'])->name('adopt.index');

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


Route::get('/two-factor', [AuthenticatedSessionController::class, 'showTwoFactorChallenge'])
    ->name('two-factor.challenge');

// Handle the verification of the 2FA code
Route::post('/two-factor/verify', [AuthenticatedSessionController::class, 'verifyTwoFactorCode'])
    ->name('two-factor.verify');

// Enable 2FA
Route::get('/two-factor/enable', [AuthenticatedSessionController::class, 'enableTwoFactor'])
    ->name('two-factor.challenge');
// Remove redundant logout route
