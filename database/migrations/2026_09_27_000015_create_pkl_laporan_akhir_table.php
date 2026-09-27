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
        Schema::create('pkl_laporan_akhir', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penempatan_pkl_id')->constrained('penempatan_pkl')->cascadeOnDelete();
            $table->string('siswa_id', 64)->index();
            $table->unsignedTinyInteger('nomor_bab');
            $table->string('judul_bab', 200);
            $table->text('file_draft_url')->nullable();
            $table->enum('status', ['Belum', 'Ditinjau', 'Revisi', 'Disetujui'])->default('Belum')->index();
            $table->text('catatan_pembimbing')->nullable();
            $table->date('terakhir_diperbarui')->nullable();
            $table->string('divalidasi_oleh', 64)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pkl_laporan_akhir');
    }
};
