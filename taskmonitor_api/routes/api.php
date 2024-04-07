<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TasksController;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

Route::get('/mead', function (Request $request) {
    return $request->user();

})->middleware('auth:sanctum');

/// Public Routes
Route::post('/login', [AuthController::class, 'login']);

// Protected Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::resource('users', UserController::class);
    Route::get('/tasks_list', [TasksController::class, 'index']);
    Route::resource('tasks', TasksController::class);
    Route::post('/tasks/{id}/assign', [TasksController::class, 'assign']);
    Route::get('/user/tasks', [TasksController::class, 'index']);
});

