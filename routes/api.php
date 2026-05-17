<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BackupController;

// Rute Publik (Bisa diakses tanpa login)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Rute Privat (Wajib menyertakan Bearer Token Sanctum di Header HTTP)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/backup', [BackupController::class, 'backup']);
    Route::get('/restore', [BackupController::class, 'restore']);
});
