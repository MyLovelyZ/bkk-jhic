<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PublicController extends Controller
{
    /**
     * Endpoint publik utama BKK (Landpage).
     */
    public function index(Request $request): View|JsonResponse
    {
        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'data' => [
                    'prefix' => '/bkk',
                ],
            ]);
        }

        return view('index.pages.index');
    }

    /**
     * Endpoint informasi BKK.
     */
    public function info(Request $request): View|JsonResponse
    {
        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'bkk Info',
            ]);
        }

        return view('index.pages.index');
    }

    /**
     * Daftar Berita & Agenda BKK.
     */
    public function berita(): View
    {
        return view('index.pages.berita');
    }

    /**
     * Detail Berita BKK.
     */
    public function beritaDetail(string $id_berita): View
    {
        return view('index.pages.berita-detail', compact('id_berita'));
    }

    /**
     * Daftar Lowongan PKL & Kerja BKK.
     */
    public function lowongan(): View
    {
        return view('index.pages.lowongan');
    }

    /**
     * Detail Lowongan PKL & Kerja BKK.
     */
    public function lowonganDetail(string $id_lowongan): View
    {
        return view('index.pages.lowongan-detail', compact('id_lowongan'));
    }

    /**
     * Halaman Profil & Struktur Tentang BKK.
     */
    public function tentang(): View
    {
        return view('index.pages.tentang');
    }

    /**
     * Halaman Informasi Kemitraan & Kerja Sama IDUKA.
     */
    public function kerjasama(): View
    {
        return view('index.pages.kerjasama');
    }
}
