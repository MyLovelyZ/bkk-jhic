<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profil_siswa', function (Blueprint $table) {
            $table->string('user_id', 64)->primary();
            $table->string('nis', 20)->index();
            $table->string('nisn', 20)->nullable()->index();
            $table->string('jurusan', 100);
            $table->string('kelas', 50)->nullable();
            $table->string('angkatan', 10);
            $table->string('tahun_lulus', 10)->nullable();
            $table->enum('status_kelulusan', ['SISWA_AKTIF', 'ALUMNI'])->default('SISWA_AKTIF');
            $table->string('status_aktivitas', 100)->nullable();
            $table->unsignedTinyInteger('kelengkapan_profil')->default(0);
            $table->string('headline_profesi', 150)->nullable();
            $table->text('bio_singkat')->nullable();
            $table->string('link_linkedin', 255)->nullable();
            $table->string('link_github', 255)->nullable();
            $table->string('link_portfolio', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_siswa');
    }
};
