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
        Schema::create('cv_resumes', function (Blueprint $table) {
            $table->id();
            $table->string('siswa_id', 64)->index();
            $table->foreign('siswa_id')->references('user_id')->on('profil_siswa')->cascadeOnDelete();
            $table->string('judul_cv', 150)->default('CV Utama ATS');
            $table->boolean('is_primary')->default(true);
            $table->string('target_posisi', 150)->nullable();
            $table->string('domisili_kota', 100)->nullable();
            $table->text('ringkasan_eksekutif')->nullable();
            $table->longText('konten_markdown');
            $table->unsignedTinyInteger('skor_total_ai')->default(0);
            $table->json('skor_parameter_json')->nullable();
            $table->json('saran_perbaikan_ai_json')->nullable();
            $table->timestamp('terakhir_dianalisis_ai')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cv_resumes');
    }
};
