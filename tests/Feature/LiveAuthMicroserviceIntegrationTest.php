<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class LiveAuthMicroserviceIntegrationTest extends TestCase
{
    use RefreshDatabase;

    protected string $authServerUrl = 'http://localhost:3002';

    /**
     * Check if the real auth microservice is running.
     */
    protected function isAuthServerRunning(): bool
    {
        try {
            $response = Http::timeout(2)->post($this->authServerUrl . '/api/user/login', [
                'username' => 'admin',
                'password' => 'Password123!',
            ]);
            return $response->successful();
        } catch (\Throwable $e) {
            return false;
        }
    }

    /**
     * Login via live auth service and obtain token.
     */
    protected function loginLive(string $username, string $password = 'Password123!'): ?string
    {
        $response = Http::timeout(5)->post($this->authServerUrl . '/api/user/login', [
            'username' => $username,
            'password' => $password,
        ]);

        return $response->json('access_token');
    }

    /**
     * Test live integration for ADMIN accessing dashboard.
     */
    public function test_live_admin_login_and_access_dashboard(): void
    {
        if (!$this->isAuthServerRunning()) {
            $this->markTestSkipped('Auth service on localhost:3002 is not reachable.');
        }

        // 1. Login user ADMIN
        $token = $this->loginLive('admin');
        $this->assertNotEmpty($token);

        // 2. Akses dashboard via Authorization Bearer
        $response = $this->withHeader('Authorization', 'Bearer ' . $token)
            ->getJson('/bkk/dashboard');

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

        // 3. Akses dashboard profile
        $resProfile = $this->withHeader('Authorization', 'Bearer ' . $token)
            ->getJson('/bkk/dashboard/profile');

        $resProfile->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => [
                    'username' => 'admin',
                    'role' => 'ADMIN',
                ],
            ]);
    }

    /**
     * Test live integration for TU accessing dashboard via Cookie.
     */
    public function test_live_tu_login_via_cookie(): void
    {
        if (!$this->isAuthServerRunning()) {
            $this->markTestSkipped('Auth service on localhost:3002 is not reachable.');
        }

        // Login user TU (Budi Santoso)
        $token = $this->loginLive('tu_budi');
        $this->assertNotEmpty($token);

        // Akses dashboard via cookie
        $response = $this->withCredentials()
            ->withUnencryptedCookie('access_token', $token)
            ->getJson('/bkk/dashboard');

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => [
                    'user' => [
                        'username' => 'tu_budi',
                        'role' => 'TU',
                    ],
                ],
            ]);
    }

    /**
     * Test live integration: SISWA role gets 403 Forbidden on dashboard.
     */
    public function test_live_siswa_role_gets_403_forbidden_on_dashboard(): void
    {
        if (!$this->isAuthServerRunning()) {
            $this->markTestSkipped('Auth service on localhost:3002 is not reachable.');
        }

        // Login user SISWA (Ahmad Rizky Pratama)
        $token = $this->loginLive('siswa_rizky');
        $this->assertNotEmpty($token);

        // Akses dashboard dengan token SISWA -> Wajib 403 Forbidden
        $response = $this->withHeader('Authorization', 'Bearer ' . $token)
            ->getJson('/bkk/dashboard');

        $response->assertStatus(403)
            ->assertJson([
                'success' => false,
            ]);
    }
}
