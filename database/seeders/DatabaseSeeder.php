<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            KategoriBeritaSeeder::class,
            BeritaSeeder::class,
            ProfilSiswaSeeder::class,
            MitraSeeder::class,
            PermohonanKerjasamaSeeder::class,
            LowonganSeeder::class,
            CvResumeSeeder::class,
            LamaranSeeder::class,
            PenempatanPklSeeder::class,
            TracerStudySeeder::class,
            NotifikasiSeeder::class,
        ]);
    }
}
