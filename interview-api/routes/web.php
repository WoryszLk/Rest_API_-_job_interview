<?php

use Illuminate\Support\Facades\Route;

# Creating
Route::get('/pets/create', [PetController::class, 'create']);

# Adding
Route::post('/pets', [PetController::class, 'store']);

# Getting
Route::get('/pets', [PetController::class, 'index']);

# Edditing
Route::get('/pets/{id}/edit', [PetController::class, 'edit']);

# Updating
Route::patch('/pets/{id}', [PetController::class, 'update']);

# Deleting
Route::delete('/pets/{id}', [PetController::class, 'destroy']);