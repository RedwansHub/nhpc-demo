
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// CRUD operations for users
Route::get('/getUsers', [UserController::class, 'index']); // Get all users
Route::get('/users/{id}', [UserController::class, 'show']); // Get a specific user by ID
Route::post('/users', [UserController::class, 'store']); // Create a new user
Route::put('/users/{id}', [UserController::class, 'update']); // Update an existing user by ID
Route::delete('/users/{id}', [UserController::class, 'destroy']); // Delete a user by ID
