<?php

namespace Database\Seeders;

use App\Models\KategoriBerita;
use Illuminate\Database\Seeder;

class KategoriBeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'nama' => 'Agenda & Event',
                'slug' => 'agenda-event',
                'warna_badge' => 'bg-primary text-on-primary',
                'icon' => 'event',
            ],
            [
                'nama' => 'Kunjungan Industri',
                'slug' => 'kunjungan-industri',
                'warna_badge' => 'bg-secondary text-white',
                'icon' => 'apartment',
            ],
            [
                'nama' => 'Panduan & Tips Karier',
                'slug' => 'panduan-tips-karier',
                'warna_badge' => 'bg-secondary-container text-on-secondary-container',
                'icon' => 'school',
            ],
            [
                'nama' => 'Prestasi Alumni',
                'slug' => 'prestasi-alumni',
                'warna_badge' => 'bg-tertiary text-white',
                'icon' => 'workspace_premium',
            ],
            [
                'nama' => 'Kemitraan',
                'slug' => 'kemitraan',
                'warna_badge' => 'bg-primary/10 text-primary',
                'icon' => 'handshake',
            ],
            [
                'nama' => 'Peluang Global',
                'slug' => 'peluang-global',
                'warna_badge' => 'bg-tertiary-fixed text-on-tertiary-fixed',
                'icon' => 'public',
            ],
        ];

        foreach ($categories as $cat) {
            KategoriBerita::updateOrCreate(
                ['slug' => $cat['slug']],
                $cat
            );
        }
    }
}
