<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AnimalController;

Route::apiResource('animals', AnimalController::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');