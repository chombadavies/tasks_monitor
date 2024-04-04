<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TasksController;

Route::get('/mead', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


;

Route::post('/login', [AuthController::class, 'login']);
Route::resource('users', UserController::class);
Route::get('/tasks_list', [TasksController::class, 'index']);
Route::resource('tasks', TasksController::class);
Route::get('/user/tasks', [TasksController::class, 'index']);
