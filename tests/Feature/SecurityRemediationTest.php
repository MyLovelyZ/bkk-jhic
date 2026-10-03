<?php

namespace Tests\Feature;

use App\Models\CvResume;
use App\Models\Lamaran;
use App\Models\Lowongan;
use App\Models\Mitra;
use App\Models\ProfilSiswa;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class SecurityRemediationTest extends TestCase
{
    use RefreshDatabase;

    protected Mitra $mitra;

    protected function setUp(): void
    {
        parent::setUp();

        $this->mitra = Mitra::create([
            'nama_perusahaan' => 'PT Mitra Pengujian Keamanan',
            'singkatan' => 'MPK',
            'password' => Hash::make('PasswordAman123!'),
            'npwp' => '01.999.888.7-001.000',
            'sektor_industri' => 'Teknologi Informasi',
            'alamat_kantor' => 'Jl. Sudirman No. 1, Jakarta',
            'kota' => 'Jakarta',
            'email_perusahaan' => 'security@mitrapengujian.com',
            'no_telp_perusahaan' => '021-5551234',
            'pic_name' => 'Budi Santoso',
            'pic_role' => 'HR Manager',
            'pic_email' => 'budi@mitrapengujian.com',
            'pic_phone' => '081234567890',
            'is_verified' => true,
            'status_kemitraan' => 'Mitra IDUKA Terverifikasi',
        ]);
    }

    /**
     * Finding 1 Test: Unauthenticated request with X-Mitra-ID header cannot access dashboard.
     */
    public function test_mitra_auth_bypass_via_header_is_rejected(): void
    {
        $response = $this->withHeaders([
            'X-Mitra-ID' => (string) $this->mitra->id,
        ])->get('/bkk/dashboard');

        $response->assertRedirect(route('bkk.mitra.login'));
    }

    /**
     * Finding 1 Test: Unauthenticated JSON request with X-Mitra-ID header returns 401.
     */
    public function test_mitra_auth_bypass_via_header_returns_401_for_json(): void
    {
        $response = $this->withHeaders([
            'X-Mitra-ID' => (string) $this->mitra->id,
            'Accept' => 'application/json',
        ])->getJson('/bkk/dashboard');

        $response->assertStatus(401)
            ->assertJson([
                'success' => false,
                'message' => 'Autentikasi Mitra diperlukan untuk mengakses halaman ini.',
            ]);
    }

    /**
     * Finding 1 Test: Request with unencrypted cookie mitra_token without valid session is rejected.
     */
    public function test_mitra_auth_bypass_via_cookie_is_rejected(): void
    {
        $response = $this->withUnencryptedCookie('mitra_token', (string) $this->mitra->id)
            ->get('/bkk/dashboard');

        $response->assertRedirect(route('bkk.mitra.login'));
    }

    /**
     * Finding 1 Test: Legitimate session authentication succeeds.
     */
    public function test_mitra_authenticated_session_succeeds(): void
    {
        $response = $this->withSession(['mitra_id' => $this->mitra->id])
            ->get('/bkk/dashboard');

        $response->assertStatus(200)
            ->assertSee($this->mitra->nama_perusahaan);
    }

    /**
     * Finding 2 Test: Stored XSS payload in applicant CV Markdown is neutralized.
     */
    public function test_stored_xss_in_cv_markdown_is_stripped_and_neutralized(): void
    {
        $lowongan = Lowongan::create([
            'mitra_id' => $this->mitra->id,
            'judul' => 'Software Engineer Intern',
            'slug' => 'software-engineer-intern-' . uniqid(),
            'tipe' => 'PKL',
            'tipe_badge' => 'Magang PKL',
            'target_jurusan' => 'Rekayasa Perangkat Lunak (RPL)',
            'lokasi' => 'Jakarta',
            'kuota' => 2,
            'deadline' => now()->addMonth(),
            'deskripsi' => 'Deskripsi lowongan magang software engineering.',
            'persyaratan_json' => ['Siswa aktif kelas XII SMK RPL'],
            'status' => 'Aktif',
        ]);

        $profil = ProfilSiswa::create([
            'user_id' => 'usr-attacker-001',
            'nis' => '12345678',
            'jurusan' => 'Rekayasa Perangkat Lunak (RPL)',
            'angkatan' => '2026',
            'status_kelulusan' => 'SISWA_AKTIF',
        ]);

        // Malicious XSS payload containing <script>, <img onerror>, and javascript: links
        $xssPayload = <<<EOT
## Curriculum Vitae

<script>alert('XSS-ATTACK-SCRIPT')</script>
<img src="invalid_image.jpg" onerror="alert('XSS-ONERROR')">
[Malicious Link](javascript:alert('XSS-LINK'))

### Keahlian Asli
- PHP & Laravel
- TypeScript
EOT;

        $cv = CvResume::create([
            'siswa_id' => $profil->user_id,
            'judul_cv' => 'CV Default',
            'konten_markdown' => $xssPayload,
            'is_primary' => true,
        ]);

        $lamaran = Lamaran::create([
            'kode_lamaran' => 'LAM-' . uniqid(),
            'lowongan_id' => $lowongan->id,
            'siswa_id' => $profil->user_id,
            'cv_id' => $cv->id,
            'status' => 'Terkirim',
            'tanggal_melamar' => now(),
            'skor_match_ai' => 85,
        ]);

        // Access candidate detail page as the authenticated Mitra recruiter
        $response = $this->withSession(['mitra_id' => $this->mitra->id])
            ->get("/bkk/dashboard/lowongan/{$lowongan->id}/pelamar/{$lamaran->id}");

        $response->assertStatus(200);

        // Verify that raw script tags and onerror handlers are completely stripped
        $response->assertDontSee("<script>alert('XSS-ATTACK-SCRIPT')</script>", false);
        $response->assertDontSee("onerror=\"alert('XSS-ONERROR')\"", false);
        $response->assertDontSee("href=\"javascript:alert('XSS-LINK')\"", false);

        // Verify that legitimate Markdown formatting is preserved
        $response->assertSee('Curriculum Vitae');
        $response->assertSee('Keahlian Asli');
        $response->assertSee('PHP &amp; Laravel', false);
    }
}
