<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AnimalController;


Route::resource('animals', AnimalController::class);


//Static routes for now (except Adoption)
Route::get('/', function () {
    return view('home');
});

Route::get('/adopt', [AnimalController::class, 'adopt'])->name('adopt.index');

Route::get('/adopt/{animal}', [AnimalController::class, 'show'])->name('adopt.show');

//I need to temporarely workaround those to make my site work! Its needed for authentificationa and authorization!
Route::get('/profile/edit', function () {
    return 'This is a placeholder for profile editing.';
})->name('profile.edit');

Route::get('/logout', function () {
    return 'Logout functionality will be implemented here.';
})->name('logout');


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
