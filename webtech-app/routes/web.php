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

Route::get('/signin', [PageController::class, 'signin']);

Route::get('/guidelines', [PageController::class, 'guidelines']);

Route::get('/blog', [PageController::class, 'blog']);

//Static routes for now (except Adoption)
/*Route::get('/', function () {
    return view('home');
});
*/
Route::get('/adopt', [AnimalController::class, 'adopt'])->name('adopt.index');




Route::get('/volunteer', function () {
    return 'Volunteer page (to be implemented)';
});






