<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class PpdbRoutingAndAuthTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Test public routes can be accessed without authentication.
     */
    public function test_public_routes_are_accessible_without_token(): void
    {
        // 1. GET / redirects to /bkk
        $resRedirect = $this->get('/');
        $resRedirect->assertRedirect('/bkk');

        // 2. GET /bkk returns 200 OK
        $resIndex = $this->get('/bkk');
        $resIndex->assertStatus(200);

        // JSON format
        $resIndexJson = $this->getJson('/bkk');
        $resIndexJson->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => [
                    'prefix' => '/bkk',
                ],
            ]);

        // 3. GET /bkk/info returns 200 OK
        $resInfo = $this->get('/bkk/info');
        $resInfo->assertStatus(200);

        $resInfoJson = $this->getJson('/bkk/info');
        $resInfoJson->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }

    /**
     * Test admin dashboard returns 401 when token is missing.
     */
    public function test_dashboard_returns_401_when_unauthenticated(): void
    {
        $response = $this->getJson('/bkk/admin');

        $response->assertStatus(401)
            ->assertJson([
                'success' => false,
                'message' => 'Token otentikasi tidak ditemukan',
            ]);
    }

    /**
     * Test admin dashboard returns 401 when token is invalid.
     */
    public function test_dashboard_returns_401_when_token_is_invalid(): void
    {
        Http::fake([
            '*/api/user/verify' => Http::response([
                'success' => false,
                'message' => 'access_token tidak valid',
            ], 401),
        ]);

        $response = $this->withHeader('Authorization', 'Bearer invalid_token')
            ->getJson('/bkk/admin');

        $response->assertStatus(401)
            ->assertJson([
                'success' => false,
                'message' => 'access_token tidak valid',
            ]);
    }

    /**
     * Test admin dashboard returns 403 when user account is inactive.
     */
    public function test_dashboard_returns_403_when_account_is_inactive(): void
    {
        Http::fake([
            '*/api/user/verify' => Http::response([
                'success' => true,
                'message' => 'Token terverifikasi',
                'data' => [
                    'id' => 'user-inactive',
                    'username' => 'guru_nonaktif',
                    'role' => 'ADMIN',
                    'status_aktif' => false,
                ],
            ], 200),
        ]);

        $response = $this->withHeader('Authorization', 'Bearer valid_token')
            ->getJson('/bkk/admin');

        $response->assertStatus(403)
            ->assertJson([
                'success' => false,
                'message' => 'Akun pengguna sedang dinonaktifkan',
            ]);
    }

    /**
     * Test admin dashboard returns 403 when user role is not authorized.
     */
    public function test_dashboard_returns_403_for_unauthorized_role(): void
    {
        Http::fake([
            '*/api/user/verify' => Http::response([
                'success' => true,
                'message' => 'Token terverifikasi',
                'data' => [
                    'id' => 'user-siswa',
                    'username' => 'siswa_rizky',
                    'role' => 'SISWA',
                    'status_aktif' => true,
                ],
            ], 200),
        ]);

        $response = $this->withHeader('Authorization', 'Bearer token_siswa')
            ->getJson('/bkk/admin');

        $response->assertStatus(403)
            ->assertJson([
                'success' => false,
            ]);
    }

    /**
     * Test admin dashboard succeeds for authorized role via Bearer Header.
     */
    public function test_dashboard_accessible_with_valid_bearer_token(): void
    {
        Http::fake([
            '*/api/user/verify' => Http::response([
                'success' => true,
                'message' => 'Token terverifikasi',
                'data' => [
                    'id' => 'admin-id',
                    'username' => 'admin',
                    'nama_lengkap' => 'Administrator IT',
                    'role' => 'ADMIN',
                    'status_aktif' => true,
                ],
            ], 200),
        ]);

        $response = $this->withHeader('Authorization', 'Bearer valid_admin_token')
            ->getJson('/bkk/admin');

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => [
                    'user' => [
                        'username' => 'admin',
                        'role' => 'ADMIN',
                    ],
                ],
            ]);

        // Verifikasi bahwa access_token diteruskan ke auth server dalam bentuk JSON payload
        Http::assertSent(function ($request) {
            return str_contains($request->url(), '/api/user/verify')
                && $request->isJson()
                && $request['access_token'] === 'valid_admin_token';
        });
    }

    /**
     * Test token extraction from cookie and body.
     */
    public function test_dashboard_accessible_via_cookie_and_body(): void
    {
        Http::fake([
            '*/api/user/verify' => Http::response([
                'success' => true,
                'message' => 'Token terverifikasi',
                'data' => [
                    'id' => 'kepsek-id',
                    'username' => 'kepsek',
                    'nama_lengkap' => 'Dr. H. Bambang',
                    'role' => 'KEPALA_SEKOLAH',
                    'status_aktif' => true,
                ],
            ], 200),
        ]);

        // Via Cookie
        $resCookie = $this->withCredentials()
            ->withUnencryptedCookie('access_token', 'cookie_token')
            ->getJson('/bkk/admin');
        $resCookie->assertStatus(200);

        // Via Request Query/Body
        $resBody = $this->getJson('/bkk/admin?access_token=body_token');
        $resBody->assertStatus(200);
    }
}
