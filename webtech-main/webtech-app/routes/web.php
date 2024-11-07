<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\volunteercontroller;


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

//Static routes for now (except Adoption)
/*Route::get('/', function () {
    return view('home');
});
*/
Route::get('/adopt', [AnimalController::class, 'adopt'])->name('adopt.index');

Route::get('/guidelines', function () {
    return 'Guidelines (to be implemented)';
});


// Route for displaying the Volunteer page
Route::get('/volunteer', [VolunteerController::class, 'showForm'])->name('volunteer.form');
Route::post('/volunteer', [VolunteerController::class, 'submitForm']);

// Other page routes
Route::get('/', [PageController::class, 'home']);
Route::get('/about', [PageController::class, 'about']);
Route::get('/donate', [PageController::class, 'donate']);
Route::get('/signin', [PageController::class, 'signin']);

Route::get('/blog', function () {
    return 'Blog page (to be implemented)';
});




