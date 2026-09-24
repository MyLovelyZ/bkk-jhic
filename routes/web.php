<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - bkk System
|--------------------------------------------------------------------------
|
| Seluruh endpoint WAJIB memiliki prefix /bkk/.
| - /bkk/*           : Publik (Tanpa middleware)
| - /bkk/dashboard/* : Terproteksi (Middleware verify.auth + RBAC: ADMIN, KEPALA_SEKOLAH, TU, DEVELOPER)
|
*/

// Redirect root ke /bkk
Route::redirect('/', '/bkk');

Route::prefix('bkk')->group(function () {
    // 1. Router Group Publik: /bkk/*
    Route::get('/', [PublicController::class, 'index'])->name('bkk.index');
    Route::get('/info', [PublicController::class, 'info'])->name('bkk.info');
    Route::get('/berita', [PublicController::class, 'berita'])->name('bkk.berita');
    Route::get('/berita/{id_berita}', [PublicController::class, 'beritaDetail'])->name('bkk.berita.detail');
    Route::get('/lowongan', [PublicController::class, 'lowongan'])->name('bkk.lowongan');
    Route::get('/lowongan/{id_lowongan}', [PublicController::class, 'lowonganDetail'])->name('bkk.lowongan.detail');
    Route::get('/tentang', [PublicController::class, 'tentang'])->name('bkk.tentang');
    Route::get('/kerja-sama', [PublicController::class, 'kerjasama'])->name('bkk.kerjasama');

    // 2. Router Group Terproteksi: /bkk/dashboard/*
    Route::prefix('dashboard')
        ->middleware('verify.auth:ADMIN,KEPALA_SEKOLAH,TU,DEVELOPER')
        ->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('bkk.dashboard.index');
            Route::get('/profile', [DashboardController::class, 'profile'])->name('bkk.dashboard.profile');
        });
});
