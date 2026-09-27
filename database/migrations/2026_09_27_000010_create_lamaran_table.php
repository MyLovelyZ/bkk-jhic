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
        Schema::create('lamaran', function (Blueprint $table) {
            $table->id();
            $table->string('kode_lamaran', 50)->unique()->index();
            $table->foreignId('lowongan_id')->constrained('lowongan')->cascadeOnDelete();
            $table->string('siswa_id', 64)->index();
            $table->foreign('siswa_id')->references('user_id')->on('profil_siswa')->cascadeOnDelete();
            $table->foreignId('cv_id')->constrained('cv_resumes')->cascadeOnDelete();
            $table->date('tanggal_melamar')->index();
            $table->unsignedTinyInteger('skor_match_ai')->default(0);
            $table->enum('status', ['Terkirim', 'Sedang Ditinjau', 'Dipanggil Interview', 'Diterima', 'Ditolak'])->default('Terkirim')->index();
            $table->unsignedTinyInteger('step_tahapan')->default(1);
            $table->text('catatan_seleksi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lamaran');
    }
};
