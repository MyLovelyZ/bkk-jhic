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
        Schema::create('pkl_jurnal_harian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penempatan_pkl_id')->constrained('penempatan_pkl')->cascadeOnDelete();
            $table->string('siswa_id', 64)->index();
            $table->date('tanggal')->index();
            $table->text('aktivitas');
            $table->unsignedTinyInteger('durasi_jam')->default(8);
            $table->text('foto_dokumentasi_url')->nullable();
            $table->enum('status', ['Menunggu', 'Disetujui', 'Revisi'])->default('Menunggu')->index();
            $table->text('catatan_revisi')->nullable();
            $table->string('divalidasi_oleh', 64)->nullable();
            $table->timestamp('divalidasi_pada')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pkl_jurnal_harian');
    }
};
