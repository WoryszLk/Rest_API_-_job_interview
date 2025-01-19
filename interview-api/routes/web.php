<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;

Route::get('/', [PetController::class, 'index']);

# Creating
Route::get('/pets/create', [PetController::class, 'create']);

# Adding
Route::post('/pets', [PetController::class, 'store']);

# Getting
Route::get('/pets', [PetController::class, 'index']);

# Editing
Route::get('/pets/{id}/edit', [PetController::class, 'edit']);

# Updating
Route::patch('/pets/{id}', [PetController::class, 'update']);

# Deleting
Route::delete('/pets/{id}', [PetController::class, 'destroy']);