<?php

use App\Http\Controllers\Api\AuthController;
use App\Mail\MailableName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use Illuminate\Support\Facades\Mail;

Route::post('/register', [AuthController::class, 'register']);
Route::get('/register', [AuthController::class, 'indexUsers']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/waza', [AuthController::class, 'anything']);


Route::get('/otps', [AuthController::class, 'getOtps']);


Route::post('send-otp', [AuthController::class, 'sendOtp']);
Route::post('first-login', [AuthController::class, 'firstLogin']);



// Route::get('/send-otvp', function() {
//     $name = "nombre en la ruta de api";

//     // The email sending is done using the to method on the Mail facade
//     Mail::to('alexkiller0408@gmail.com')->send(new MailableName($name, '123456', now()->addMinutes(10))); // Ejemplo con OTP y expiración
// });