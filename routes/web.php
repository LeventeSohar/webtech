<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ItemController;

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
