<?php

use App\Http\Controllers\Admin\AdminBeritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Me\MeController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - BKK System
|--------------------------------------------------------------------------
|
| Seluruh endpoint WAJIB memiliki prefix /bkk/.
| - /bkk/*        : Publik (Tanpa middleware)
| - /bkk/admin/*  : Terproteksi (Middleware verify.auth + RBAC: ADMIN, KEPALA_SEKOLAH, TU, DEVELOPER)
| - /bkk/dashboard/* : Alias kompatibel ke admin
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

    // 2. Router Group Terproteksi: /bkk/admin/* & /bkk/dashboard/*
    Route::middleware('verify.auth:ADMIN,KEPALA_SEKOLAH,TU,DEVELOPER')->group(function () {
        foreach (['admin', 'dashboard'] as $prefix) {
            Route::prefix($prefix)->group(function () use ($prefix) {
                Route::get('/', [DashboardController::class, 'index'])->name("bkk.{$prefix}.index");
                Route::get('/profile', [DashboardController::class, 'profile'])->name("bkk.{$prefix}.profile");

                // Modul Berita Admin
                Route::get('/berita', [AdminBeritaController::class, 'index'])->name("bkk.{$prefix}.berita.index");
                Route::get('/berita/new', [AdminBeritaController::class, 'create'])->name("bkk.{$prefix}.berita.create");
                Route::post('/berita', [AdminBeritaController::class, 'store'])->name("bkk.{$prefix}.berita.store");
                Route::get('/berita/{id_berita}', [AdminBeritaController::class, 'edit'])->name("bkk.{$prefix}.berita.edit");
                Route::put('/berita/{id_berita}', [AdminBeritaController::class, 'update'])->name("bkk.{$prefix}.berita.update");
                Route::delete('/berita/{id_berita}', [AdminBeritaController::class, 'destroy'])->name("bkk.{$prefix}.berita.destroy");
            });
        }
    });

    // 3. Router Group Terproteksi Khusus Siswa & Alumni: /bkk/me/*
    Route::middleware('verify.auth:SISWA,ALUMNI')->prefix('me')->name('bkk.me.')->group(function () {
        Route::get('/', [MeController::class, 'dashboard'])->name('index');
        Route::get('/lamaran', [MeController::class, 'lamaran'])->name('lamaran');
        Route::get('/cv', [MeController::class, 'cv'])->name('cv');
        Route::get('/cv/edit', [MeController::class, 'cvEdit'])->name('cv.edit');
        Route::get('/jurnal', [MeController::class, 'jurnal'])->name('jurnal');
        Route::get('/laporan', [MeController::class, 'laporan'])->name('laporan');
    });
});
