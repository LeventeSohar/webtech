<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdoptionController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminPageController;



Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminPageController::class, 'dashboard'])->name('dashboard');
    
    Route::get('/animalManage', [AdminPageController::class, 'animalManage'])->name('animalManage');
    Route::post('/animalManage/store', [AdminPageController::class, 'storeAnimal'])->name('storeAnimal');
    Route::delete('/animalManage/delete/{id}', [AdminPageController::class, 'deleteAnimal'])->name('animal.delete');

    Route::get('/volunteerManage', [AdminPageController::class, 'volunteerManage'])->name('volunteerManage');
    Route::delete('/volunteer/{id}', [AdminPageController::class, 'deleteVolunteer'])->name('volunteer.delete');

    Route::get('/blogManage', [AdminPageController::class, 'blogManage'])->name('blogManage');
});


require __DIR__.'/auth.php';

Route::get('/login', [AuthController::class, 'showLogin'])->name('admin.login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');


//static pages.
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/guidelines', [PageController::class, 'guidelines'])->name('guidelines');
Route::get('/donate', [PageController::class, 'donate'])->name('donate');


// Display the volunteer form
Route::get('/volunteer', [VolunteerController::class, 'create'])->name('volunteer.form');

// Handle the form submission
Route::post('/volunteer', [VolunteerController::class, 'store'])->name('volunteer.submit');

//show the animals up for adaption
Route::get('/adopt', [AdoptionController::class, 'index'])->name('adopt');

// Shows blog
Route::get('/blog', [PageController::class, 'blog'])->name('blog');

