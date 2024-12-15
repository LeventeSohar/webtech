<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Homepage route
Route::get('/', [PageController::class, 'home']);

// About page route
Route::get('/about', [PageController::class, 'about']);

// Static routes
Route::get('/guidelines', [PageController::class, 'guidelines'])->name('guidelines');
Route::get('/donate', [PageController::class, 'donate'])->name('donate');
Route::get('/signin', [PageController::class, 'signin'])->name('signin');
Route::get('/blog', [PageController::class, 'blog'])->name('blog');

// Dashboard route (requires authentication)
Route::get('/dashboard', [PageController::class, 'dashboard'])
    ->name('dashboard')
    ->middleware('auth');

// Adoption page
Route::get('/adopt', [AnimalController::class, 'adopt'])->name('adopt.index');

// Animal resource routes
Route::resource('animals', AnimalController::class);

// Resourceful routes for items
Route::resource('items', ItemController::class);

// Route to display the items view
Route::get('/items', [ItemController::class, 'index'])->name('items.index');

// Form submission route
Route::post('/submit', [PageController::class, 'submitForm'])->name('submitForm');

// Volunteer routes
Route::get('/volunteer', [VolunteerController::class, 'showForm'])->name('volunteer.form');
Route::post('/volunteer', [VolunteerController::class, 'submitForm']);

// Authentication routes
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Two-factor authentication routes
Route::get('/two-factor', [AuthenticatedSessionController::class, 'showTwoFactorChallenge'])
    ->name('two-factor.challenge');
Route::post('/two-factor/verify', [AuthenticatedSessionController::class, 'verifyTwoFactorCode'])
    ->name('two-factor.verify');
Route::get('/two-factor/enable', [AuthenticatedSessionController::class, 'enableTwoFactor'])
    ->name('two-factor.enable');
