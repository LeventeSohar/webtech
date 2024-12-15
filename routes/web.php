<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AnimalController;


Route::resource('animals', AnimalController::class);

//I (Hanna) provided the beginning structure for all with static routes:

Route::get('/', function () {
    return view('home');
});

// The only dynamic route i (Hanna) made (functioning) for the adopt part
Route::get('/adopt', [AnimalController::class, 'adopt'])->name('adopt.index');


//The other routes are implemented by multiple team members later!
Route::get('/guidelines', function () {
    return 'Guidelines (to be implemented)';
});

Route::get('/donate', function () {
    return 'Donate page (to be implemented)';
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

Route::get('/dashboard', function () {
    return view('dashboard');  
})->name('dashboard');
