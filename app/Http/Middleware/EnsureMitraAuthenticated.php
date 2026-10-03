<?php

namespace App\Http\Middleware;

use App\Models\Mitra;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class EnsureMitraAuthenticated
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $mitraId = $request->session()->get('mitra_id');

        if (!$mitraId) {
            if ($request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Autentikasi Mitra diperlukan untuk mengakses halaman ini.',
                ], Response::HTTP_UNAUTHORIZED);
            }

            return redirect()
                ->route('bkk.mitra.login')
                ->with('error', 'Silakan masuk terlebih dahulu dengan akun Mitra Perusahaan Anda.');
        }

        $mitra = Mitra::find($mitraId);

        if (!$mitra) {
            $request->session()->forget('mitra_id');

            if ($request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Sesi Mitra tidak valid atau akun tidak ditemukan.',
                ], Response::HTTP_UNAUTHORIZED);
            }

            return redirect()
                ->route('bkk.mitra.login')
                ->with('error', 'Sesi login telah kedaluwarsa. Silakan masuk kembali.');
        }

        // Simpan instance Mitra pada request attribute & view data global
        $request->attributes->set('mitra', $mitra);
        $request->merge(['current_mitra' => $mitra]);
        View::share('currentMitra', $mitra);

        return $next($request);
    }
}
