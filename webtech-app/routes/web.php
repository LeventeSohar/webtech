<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AnimalController;

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

Route::get('/donate', [PageController::class, 'donate']);

//Static routes for now (except Adoption)
/*Route::get('/', function () {
    return view('home');
});
*/
Route::get('/adopt', [AnimalController::class, 'adopt'])->name('adopt.index');

Route::get('/guidelines', function () {
    return 'Guidelines (to be implemented)';
});


Route::get('/volunteer', function () {
    return 'Volunteer page (to be implemented)';
});

Route::get('/blog', function () {
    return 'Blog page (to be implemented)';
});

Route::get('/signin', function () {
    return 'Sign-in page (to be implemented)';
});


