<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/api/tasks', [TaskController::class, 'index']);
Route::get('/{any}', function() {
    return view('app');
})->where('any', '.*');

