<?php

namespace Tests\Feature;

use Tests\TestCase;

class MitraDashboardTest extends TestCase
{
    /**
     * 1. Dashboard Overview Mitra (/bkk/dashboard) dapat diakses tanpa VerifyMiddleware.
     */
    public function test_mitra_dashboard_page_loads_successfully(): void
    {
        $response = $this->get('/bkk/dashboard');

        $response->assertStatus(200)
            ->assertSee('PT Solusi Teknologi Nusantara')
            ->assertSee('PORTAL MITRA IDUKA')
            ->assertSee('01.234.567.8-091.000')
            ->assertSee('Lowongan Aktif')
            ->assertSee('Total Pelamar');
    }

    /**
     * 2. Daftar Lowongan Mitra (/bkk/dashboard/lowongan).
     */
    public function test_mitra_lowongan_index_loads_successfully(): void
    {
        $response = $this->get('/bkk/dashboard/lowongan');

        $response->assertStatus(200)
            ->assertSee('Kelola Lowongan IDUKA')
            ->assertSee('Junior Frontend Developer')
            ->assertSee('Internship Web & Backend Developer (PKL Siswa)');
    }

    /**
     * 3. Form Pembuatan Lowongan Baru (/bkk/dashboard/lowongan/new).
     */
    public function test_mitra_lowongan_create_loads_successfully(): void
    {
        $response = $this->get('/bkk/dashboard/lowongan/new');

        $response->assertStatus(200)
            ->assertSee('Bikin Lowongan Baru')
            ->assertSee('Target Jurusan SMK Penus')
            ->assertSee('Tayangkan Lowongan Sekarang');
    }

    /**
     * 4. Submit Lowongan Baru (POST /bkk/dashboard/lowongan).
     */
    public function test_mitra_lowongan_store_redirects_with_flash_message(): void
    {
        $response = $this->post('/bkk/dashboard/lowongan', [
            'title' => 'DevOps Junior Engineer',
            'tipe' => 'Kerja',
            'jurusan' => 'Teknik Komputer & Jaringan (TKJ)',
            'lokasi' => 'Bogor',
            'kuota' => 2,
            'deadline' => '2026-11-30',
        ]);

        $response->assertRedirect(route('bkk.mitra.lowongan.index'))
            ->assertSessionHas('success');
    }

    /**
     * 5. Form Edit Lowongan (/bkk/dashboard/lowongan/{id_lowongan}).
     */
    public function test_mitra_lowongan_edit_loads_successfully(): void
    {
        $response = $this->get('/bkk/dashboard/lowongan/low-001');

        $response->assertStatus(200)
            ->assertSee('Edit:')
            ->assertSee('low-001')
            ->assertSee('Simpan Perubahan');
    }

    /**
     * 6. Update Lowongan (PUT /bkk/dashboard/lowongan/{id_lowongan}).
     */
    public function test_mitra_lowongan_update_redirects_with_flash_message(): void
    {
        $response = $this->put('/bkk/dashboard/lowongan/low-001', [
            'title' => 'Senior Frontend Developer (Tailwind & React)',
            'status' => 'Aktif',
        ]);

        $response->assertRedirect(route('bkk.mitra.lowongan.index'))
            ->assertSessionHas('success');
    }

    /**
     * 7. Hapus Lowongan (DELETE /bkk/dashboard/lowongan/{id_lowongan}).
     */
    public function test_mitra_lowongan_destroy_redirects_with_flash_message(): void
    {
        $response = $this->delete('/bkk/dashboard/lowongan/low-001');

        $response->assertRedirect(route('bkk.mitra.lowongan.index'))
            ->assertSessionHas('success');
    }

    /**
     * 8. Review Pelamar (/bkk/dashboard/lowongan/{id_lowongan}/pelamar).
     */
    public function test_mitra_pelamar_index_loads_successfully(): void
    {
        $response = $this->get('/bkk/dashboard/lowongan/low-002/pelamar');

        $response->assertStatus(200)
            ->assertSee('Pelamar:')
            ->assertSee('Ahmad Rizky Pratama')
            ->assertSee('Tinjau CV');
    }

    /**
     * 9. Detail Pelamar & CV Preview (/bkk/dashboard/lowongan/{id_lowongan}/pelamar/{id_pelamar}).
     */
    public function test_mitra_pelamar_detail_loads_successfully(): void
    {
        $response = $this->get('/bkk/dashboard/lowongan/low-002/pelamar/pel-001');

        $response->assertStatus(200)
            ->assertSee('Ahmad Rizky Pratama')
            ->assertSee('Update Status Seleksi')
            ->assertSee('Riwayat Pendidikan')
            ->assertSee('Keterampilan Teknis');
    }

    /**
     * 10. Update Status Seleksi Pelamar (POST /bkk/dashboard/lowongan/{id}/pelamar/{id}/status).
     */
    public function test_mitra_pelamar_update_status_redirects_with_flash_message(): void
    {
        $response = $this->post('/bkk/dashboard/lowongan/low-002/pelamar/pel-001/status', [
            'status' => 'Diterima',
            'nama' => 'Ahmad Rizky Pratama',
            'catatan_seleksi' => 'Lulus wawancara user dengan nilai sangat memuaskan.',
        ]);

        $response->assertRedirect(route('bkk.mitra.pelamar.show', ['low-002', 'pel-001']))
            ->assertSessionHas('success');
    }
}
