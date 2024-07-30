<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest:user,admin'])->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
});

Route::get('/', function () {
    return redirect()->route('login');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware(['auth:user,admin']);
