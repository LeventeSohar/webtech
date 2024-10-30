<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

// Homepage route
Route::get('/', [PageController::class, 'home']);

// About page route
Route::get('/about', [PageController::class, 'about']);

// Route for handling the form submission
Route::post('/submit', [PageController::class, 'submitForm'])->name('submitForm');
