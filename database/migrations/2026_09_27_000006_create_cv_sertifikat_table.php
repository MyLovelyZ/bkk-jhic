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
        Schema::create('cv_sertifikat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cv_id')->constrained('cv_resumes')->cascadeOnDelete();
            $table->string('nama_sertifikat', 200);
            $table->string('lembaga_penerbit', 150);
            $table->string('tahun_perolehan', 10);
            $table->string('nomor_sertifikat', 100)->nullable();
            $table->text('file_url')->nullable();
            $table->enum('status_verifikasi', ['MENUNGGU', 'VALID', 'TIDAK_VALID'])->default('MENUNGGU');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cv_sertifikat');
    }
};
