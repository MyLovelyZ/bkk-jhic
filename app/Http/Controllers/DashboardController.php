<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Dashboard utama bkk (hanya dapat diakses role yang diizinkan).
     */
    public function index(Request $request): View|JsonResponse
    {
        // Mengambil metadata user yang telah dimerge oleh VerifyAuthToken middleware
        $authUser = $request->auth_user ?? $request->input('auth_user');

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'data' => [
                    'user' => $authUser,
                ],
            ]);
        }

        return view('bkk.dashboard', compact('authUser'));
    }

    /**
     * Profil pengguna terautentikasi di dashboard bkk.
     */
    public function profile(Request $request): View|JsonResponse
    {
        $authUser = $request->auth_user ?? $request->input('auth_user');

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'data' => $authUser,
            ]);
        }

        return view('bkk.dashboard', compact('authUser'));
    }
}
