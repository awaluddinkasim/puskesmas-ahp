<?php

use App\Http\Controllers\Admin\AbsensiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AhpController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EvaluasiController;
use App\Http\Controllers\Admin\PasienController;
use App\Http\Controllers\Admin\ResultController;

Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    })->name('index');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => 'ahp', 'as' => 'ahp.'], function () {
        Route::get('/kriteria', [AhpController::class, 'kriteria'])->name('kriteria');
        Route::post('/kriteria', [AhpController::class, 'storeKriteria'])->name('kriteria.store');
        Route::delete('/kriteria/{kriteria}', [AhpController::class, 'deleteKriteria'])->name('kriteria.delete');

        Route::get('/perbandingan', [AhpController::class, 'perbandingan'])->name('perbandingan');
        Route::post('/perbandingan', [AhpController::class, 'storePerbandingan'])->name('perbandingan.store');
    });

    Route::get('/perawat', [UserController::class, 'index'])->name('perawat');
    Route::post('/perawat', [UserController::class, 'store'])->name('perawat.store');
    Route::get('/perawat/{user}', [UserController::class, 'edit'])->name('perawat.edit');
    Route::put('/perawat/{user}', [UserController::class, 'update'])->name('perawat.update');
    Route::delete('/perawat/{user}', [UserController::class, 'delete'])->name('perawat.delete');

    Route::group(['prefix' => 'pasien', 'as' => 'pasien.'], function () {
        Route::get('/list', [PasienController::class, 'index'])->name('list');
        Route::get('/create', [PasienController::class, 'create'])->name('create');
        Route::post('/store', [PasienController::class, 'store'])->name('store');
        Route::get('/penanganan', [PasienController::class, 'penanganan'])->name('penanganan');
    });

    Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi');

    Route::get('/evaluasi', [EvaluasiController::class, 'index'])->name('evaluasi');
    Route::get('/evaluasi/{user}', [EvaluasiController::class, 'evaluasi'])->name('evaluasi.user');

    Route::get('/perawat-terbaik', [ResultController::class, 'index'])->name('result');
});
