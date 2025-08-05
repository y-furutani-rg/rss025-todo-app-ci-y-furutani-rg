<?php

use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/tasks', [TaskController::class, 'index']);

Route::post('/task/create', [TaskController::class, 'store']);

Route::get('/task/show/{id}', [TaskController::class, 'getTask']);

Route::get('/task/edit/{id}', [TaskController::class, 'getTask']);

Route::put('/task/edit/{id}', [TaskController::class, 'update']);
