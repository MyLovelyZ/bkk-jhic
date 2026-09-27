<?php

namespace Database\Seeders;

use App\Models\Notifikasi;
use Illuminate\Database\Seeder;

class NotifikasiSeeder extends Seeder
{
    public function run(): void
    {
        $notifications = [
            [
                'recipient_id' => 'usr-siswa-001',
                'recipient_role' => 'SISWA',
                'judul' => 'Panggilan Interview Terjadwal',
                'deskripsi' => 'PT Telkom Akses Semarang mengundang Anda untuk sesi interview online pada 5 Oktober 2026 pukul 09:30 WIB.',
                'tipe_notifikasi' => 'INTERVIEW',
                'url_action' => '/bkk/me/lamaran',
                'is_read' => false,
                'is_accent' => true,
            ],
            [
                'recipient_id' => 'usr-siswa-001',
                'recipient_role' => 'SISWA',
                'judul' => 'Catatan Revisi Jurnal PKL',
                'deskripsi' => 'Guru pembimbing memberikan catatan revisi pada log jurnal harian tanggal 25 September 2026.',
                'tipe_notifikasi' => 'PKL',
                'url_action' => '/bkk/me/jurnal',
                'is_read' => true,
                'is_accent' => false,
            ],
            [
                'recipient_id' => 'usr-alumni-001',
                'recipient_role' => 'ALUMNI',
                'judul' => 'Lowongan Baru Sesuai Minat Anda',
                'deskripsi' => 'PT BCA Digital membuka lowongan Junior IT Operations & Helpdesk Support yang cocok dengan profil kejuruan Anda.',
                'tipe_notifikasi' => 'LOWONGAN',
                'url_action' => '/bkk/lowongan',
                'is_read' => false,
                'is_accent' => true,
            ],
            [
                'recipient_id' => '01.234.567.8-012.000',
                'recipient_role' => 'MITRA',
                'judul' => 'Pelamar Baru Mendaftar',
                'deskripsi' => 'Ahmad Rizky Pratama (Siswa RPL SMK Penus) baru saja mengirimkan lamaran untuk posisi Web Application Support.',
                'tipe_notifikasi' => 'LAMARAN',
                'url_action' => '/bkk/dashboard/lowongan',
                'is_read' => false,
                'is_accent' => true,
            ],
        ];

        foreach ($notifications as $n) {
            Notifikasi::updateOrCreate(
                [
                    'recipient_id' => $n['recipient_id'],
                    'judul' => $n['judul'],
                ],
                $n
            );
        }
    }
}
