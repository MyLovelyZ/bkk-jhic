<?php

namespace Database\Seeders;

use App\Models\PermohonanKerjasama;
use Illuminate\Database\Seeder;

class PermohonanKerjasamaSeeder extends Seeder
{
    public function run(): void
    {
        PermohonanKerjasama::updateOrCreate(
            ['email_resmi' => 'partnership@inovasidigital.id'],
            [
                'nama_perusahaan' => 'PT Inovasi Digital Mandiri',
                'bidang_usaha' => 'Software House & Konsultan IT',
                'alamat_perusahaan' => 'Jl. RS Fatmawati No. 15, Cilandak, Jakarta Selatan',
                'no_telepon' => '021-75901234',
                'nama_pic' => 'Andi Pratama, S.T.',
                'jabatan_pic' => 'Head of People & Operations',
                'jenis_kerjasama' => ['PKL / Magang Siswa', 'Perekrutan Lulusan', 'Guru Tamu Industri'],
                'pesan_tambahan' => 'Kami berminat membuka kuota PKL reguler untuk jurusan RPL dan TKJ mulai semester depan.',
                'status' => 'MENUNGGU_REVIEW',
                'catatan_admin' => null,
            ]
        );

        PermohonanKerjasama::updateOrCreate(
            ['email_resmi' => 'corporate@cakrawalalogistik.com'],
            [
                'nama_perusahaan' => 'PT Cakrawala Logistik Nusantara',
                'bidang_usaha' => 'Manajemen Logistik & Supply Chain',
                'alamat_perusahaan' => 'Kawasan Industri Sentul, Jl. Babakan Madang No. 8, Bogor',
                'no_telepon' => '021-87920000',
                'nama_pic' => 'Ratna Puspitasari',
                'jabatan_pic' => 'HR Supervisor',
                'jenis_kerjasama' => ['Perekrutan Lulusan', 'Uji Kompetensi Keahlian (UKK)'],
                'pesan_tambahan' => 'Permohonan kerja sama rekrutmen alumni jurusan Akuntansi & Keuangan Lembaga (AKL) dan Perkantoran.',
                'status' => 'DISETUJUI',
                'catatan_admin' => 'MoU disetujui, draf kontrak telah dikirimkan ke email resmi PIC.',
                'diproses_oleh' => 'adm-bkk-001',
            ]
        );
    }
}
