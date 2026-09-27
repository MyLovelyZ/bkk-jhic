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
        Schema::create('cv_pengalaman', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cv_id')->constrained('cv_resumes')->cascadeOnDelete();
            $table->enum('tipe_pengalaman', ['PKL', 'KERJA', 'MAGANG', 'FREELANCE', 'PROYEK'])->default('PKL');
            $table->string('posisi', 150);
            $table->string('perusahaan', 150);
            $table->string('lokasi', 100)->nullable();
            $table->string('periode_mulai', 20);
            $table->string('periode_selesai', 20)->nullable();
            $table->boolean('is_current')->default(false);
            $table->text('deskripsi_tugas');
            $table->unsignedTinyInteger('urutan')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cv_pengalaman');
    }
};
