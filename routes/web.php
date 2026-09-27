<?php

use App\Http\Controllers\Admin\AdminBeritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Me\MeController;
use App\Http\Controllers\Mitra\MitraController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - BKK System
|--------------------------------------------------------------------------
|
| Seluruh endpoint WAJIB memiliki prefix /bkk/.
| - /bkk/*           : Publik (Tanpa middleware)
| - /bkk/admin/*     : Terproteksi Sekolah (Middleware verify.auth + RBAC: ADMIN, KEPALA_SEKOLAH, TU, DEVELOPER)
| - /bkk/me/*        : Terproteksi Siswa & Alumni (Middleware verify.auth: SISWA, ALUMNI)
| - /bkk/dashboard/* : Khusus Mitra Industri / IDUKA (Bypass VerifyMiddleware / Auth NPWP & Password)
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

    // 2. Router Group Terproteksi Admin Sekolah: /bkk/admin/*
    Route::middleware('verify.auth:ADMIN,KEPALA_SEKOLAH,TU,DEVELOPER')->prefix('admin')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('bkk.admin.index');
        Route::get('/profile', [DashboardController::class, 'profile'])->name('bkk.admin.profile');

        // Modul Berita Admin
        Route::get('/berita', [AdminBeritaController::class, 'index'])->name('bkk.admin.berita.index');
        Route::get('/berita/new', [AdminBeritaController::class, 'create'])->name('bkk.admin.berita.create');
        Route::post('/berita', [AdminBeritaController::class, 'store'])->name('bkk.admin.berita.store');
        Route::get('/berita/{id_berita}', [AdminBeritaController::class, 'edit'])->name('bkk.admin.berita.edit');
        Route::put('/berita/{id_berita}', [AdminBeritaController::class, 'update'])->name('bkk.admin.berita.update');
        Route::delete('/berita/{id_berita}', [AdminBeritaController::class, 'destroy'])->name('bkk.admin.berita.destroy');
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

    // 4. Router Group Khusus Mitra (IDUKA): /bkk/dashboard/* (Bypass VerifyMiddleware / Auth NPWP & Password)
    Route::prefix('dashboard')->name('bkk.mitra.')->group(function () {
        Route::get('/', [MitraController::class, 'dashboard'])->name('dashboard');

        // Modul Lowongan Mitra
        Route::get('/lowongan', [MitraController::class, 'lowonganIndex'])->name('lowongan.index');
        Route::get('/lowongan/new', [MitraController::class, 'lowonganCreate'])->name('lowongan.create');
        Route::post('/lowongan', [MitraController::class, 'lowonganStore'])->name('lowongan.store');
        Route::get('/lowongan/{id_lowongan}', [MitraController::class, 'lowonganEdit'])->name('lowongan.edit');
        Route::put('/lowongan/{id_lowongan}', [MitraController::class, 'lowonganUpdate'])->name('lowongan.update');
        Route::delete('/lowongan/{id_lowongan}', [MitraController::class, 'lowonganDestroy'])->name('lowongan.destroy');

        // Modul Review CV & Pelamar
        Route::get('/lowongan/{id_lowongan}/pelamar', [MitraController::class, 'pelamarIndex'])->name('pelamar.index');
        Route::get('/lowongan/{id_lowongan}/pelamar/{id_pelamar}', [MitraController::class, 'pelamarShow'])->name('pelamar.show');
        Route::post('/lowongan/{id_lowongan}/pelamar/{id_pelamar}/status', [MitraController::class, 'pelamarUpdateStatus'])->name('pelamar.updateStatus');
    });
});
