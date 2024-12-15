<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\Blog\PostController;
use App\Http\Controllers\Blog\CommentController;

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

// Blog index route (shows all posts)
Route::get('/blog', [PostController::class, 'index']);

// Single post route (shows a specific post with comments)
Route::get('/post/{post}', [PostController::class, 'show']);

// Route for submitting a comment on a post
Route::post('/post/{post}/comment', [CommentController::class, 'store'])->middleware('auth');

// Route for deleting a comment (only for authorized staff)
Route::delete('/comment/{comment}', [CommentController::class, 'destroy'])->middleware('can:delete,comment');

Route::get('/posts', [PostController::class, 'index']);
Route::get('/comments', [CommentController::class, 'index']);

Route::get('/test', [App\Http\Controllers\Blog\TestController::class, 'index']);
