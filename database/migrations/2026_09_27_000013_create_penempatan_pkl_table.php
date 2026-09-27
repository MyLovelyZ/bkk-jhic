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
        Schema::create('penempatan_pkl', function (Blueprint $table) {
            $table->id();
            $table->string('siswa_id', 64)->index();
            $table->foreign('siswa_id')->references('user_id')->on('profil_siswa')->cascadeOnDelete();
            $table->foreignId('mitra_id')->constrained('mitra')->cascadeOnDelete();
            $table->foreignId('lowongan_id')->nullable()->constrained('lowongan')->nullOnDelete();
            $table->string('guru_pembimbing_id', 64)->index();
            $table->string('pembimbing_industri_nama', 150)->nullable();
            $table->string('unit_kerja_divisi', 150)->nullable();
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->unsignedSmallInteger('target_jam')->default(640);
            $table->unsignedSmallInteger('total_jam_tercapai')->default(0);
            $table->enum('status', ['BERJALAN', 'SELESAI', 'DIBATALKAN', 'MENUNGGU_SURAT'])->default('BERJALAN')->index();
            $table->decimal('nilai_akhir_industri', 5, 2)->nullable();
            $table->decimal('nilai_akhir_sekolah', 5, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penempatan_pkl');
    }
};
