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
        Schema::create('cv_pendidikan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cv_id')->constrained('cv_resumes')->cascadeOnDelete();
            $table->string('nama_institusi', 150);
            $table->string('jurusan_peminatan', 150);
            $table->string('tahun_mulai', 10);
            $table->string('tahun_selesai', 10);
            $table->string('nilai_akhir', 50)->nullable();
            $table->text('deskripsi_prestasi')->nullable();
            $table->unsignedTinyInteger('urutan')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cv_pendidikan');
    }
};
