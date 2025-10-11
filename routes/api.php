<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::get('/register', [AuthController::class, 'indexUsers']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/waza', [AuthController::class, 'anything']);