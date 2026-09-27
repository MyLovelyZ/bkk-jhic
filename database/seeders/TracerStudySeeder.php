<?php

namespace Database\Seeders;

use App\Models\ProfilSiswa;
use App\Models\TracerJawabanDetail;
use App\Models\TracerKuesioner;
use App\Models\TracerPertanyaan;
use App\Models\TracerRespon;
use Illuminate\Database\Seeder;

class TracerStudySeeder extends Seeder
{
    public function run(): void
    {
        $kuesioner = TracerKuesioner::updateOrCreate(
            ['slug' => 'tracer-study-lulusan-2024-satu-tahun'],
            [
                'judul' => 'Tracer Study Lulusan 2024 (1 Tahun Pasca Lulus)',
                'deskripsi' => 'Survei penelusuran keterserapan lulusan SMK Plus Pelita Nusantara untuk memetakan lulusan yang Bekerja, Melanjutkan Pendidikan, atau Wirausaha (BMW).',
                'tahun_sasaran_lulusan' => '2024',
                'tanggal_mulai' => '2025-01-01',
                'tanggal_selesai' => '2025-12-31',
                'is_aktif' => true,
                'created_by' => 'adm-bkk-001',
            ]
        );

        $q1 = TracerPertanyaan::updateOrCreate(
            ['kuesioner_id' => $kuesioner->id, 'urutan' => 1],
            [
                'teks_pertanyaan' => 'Apa status aktivitas utama Anda saat ini?',
                'tipe_jawaban' => 'PILIHAN_GANDA',
                'opsi_jawaban_json' => ['Bekerja', 'Melanjutkan Pendidikan', 'Wirausaha', 'Mencari Kerja'],
                'is_wajib' => true,
            ]
        );

        $q2 = TracerPertanyaan::updateOrCreate(
            ['kuesioner_id' => $kuesioner->id, 'urutan' => 2],
            [
                'teks_pertanyaan' => 'Apa nama perusahaan, institusi perguruan tinggi, atau nama unit usaha Anda?',
                'tipe_jawaban' => 'TEXT',
                'opsi_jawaban_json' => null,
                'is_wajib' => true,
            ]
        );

        $q3 = TracerPertanyaan::updateOrCreate(
            ['kuesioner_id' => $kuesioner->id, 'urutan' => 3],
            [
                'teks_pertanyaan' => 'Seberapa selaras bidang pekerjaan / studi Anda saat ini dengan kejuruan di SMK Penus?',
                'tipe_jawaban' => 'DROPDOWN',
                'opsi_jawaban_json' => ['Sangat Selaras', 'Selaras', 'Kurang Selaras', 'Tidak Selaras'],
                'is_wajib' => true,
            ]
        );

        $q4 = TracerPertanyaan::updateOrCreate(
            ['kuesioner_id' => $kuesioner->id, 'urutan' => 4],
            [
                'teks_pertanyaan' => 'Berapa rentang penghasilan / omzet bersih bulanan Anda?',
                'tipe_jawaban' => 'DROPDOWN',
                'opsi_jawaban_json' => [
                    '< Rp 3.000.000',
                    'Rp 3.000.000 - Rp 5.000.000',
                    'Rp 5.000.000 - Rp 8.000.000',
                    '> Rp 8.000.000',
                ],
                'is_wajib' => false,
            ]
        );

        $q5 = TracerPertanyaan::updateOrCreate(
            ['kuesioner_id' => $kuesioner->id, 'urutan' => 5],
            [
                'teks_pertanyaan' => 'Berapa lama waktu tunggu Anda sejak dinyatakan lulus sekolah hingga diterima bekerja pertama kali?',
                'tipe_jawaban' => 'ANGKA',
                'opsi_jawaban_json' => null,
                'is_wajib' => false,
            ]
        );

        // Respon dari alumni demo: usr-alumni-001 (Nadia Salsabila)
        $alumni = ProfilSiswa::find('usr-alumni-001');
        if ($alumni) {
            $respon = TracerRespon::updateOrCreate(
                [
                    'kuesioner_id' => $kuesioner->id,
                    'alumni_id' => $alumni->user_id,
                ],
                [
                    'tanggal_pengisian' => '2025-03-15 10:20:00',
                    'status_keterserapan' => 'Bekerja',
                    'nama_instansi_atau_usaha' => 'PT Telkom Akses Semarang',
                    'keselarasan_jurusan' => 'Sangat Selaras',
                    'rentang_gaji_atau_omzet' => 'Rp 5.000.000 - Rp 8.000.000',
                    'waktu_tunggu_bulan' => 2,
                ]
            );

            TracerJawabanDetail::updateOrCreate(
                ['respon_id' => $respon->id, 'pertanyaan_id' => $q1->id],
                ['jawaban_teks' => 'Bekerja']
            );
            TracerJawabanDetail::updateOrCreate(
                ['respon_id' => $respon->id, 'pertanyaan_id' => $q2->id],
                ['jawaban_teks' => 'PT Telkom Akses Semarang']
            );
            TracerJawabanDetail::updateOrCreate(
                ['respon_id' => $respon->id, 'pertanyaan_id' => $q3->id],
                ['jawaban_teks' => 'Sangat Selaras']
            );
            TracerJawabanDetail::updateOrCreate(
                ['respon_id' => $respon->id, 'pertanyaan_id' => $q4->id],
                ['jawaban_teks' => 'Rp 5.000.000 - Rp 8.000.000']
            );
            TracerJawabanDetail::updateOrCreate(
                ['respon_id' => $respon->id, 'pertanyaan_id' => $q5->id],
                ['jawaban_teks' => '2']
            );
        }
    }
}
