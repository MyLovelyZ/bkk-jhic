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
        Schema::create('tracer_respon', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kuesioner_id')->constrained('tracer_kuesioner')->cascadeOnDelete();
            $table->string('alumni_id', 64)->index();
            $table->foreign('alumni_id')->references('user_id')->on('profil_siswa')->cascadeOnDelete();
            $table->timestamp('tanggal_pengisian')->index();
            $table->enum('status_keterserapan', [
                'Bekerja',
                'Melanjutkan Pendidikan',
                'Wirausaha',
                'Mencari Kerja',
            ])->index();
            $table->string('nama_instansi_atau_usaha', 200)->nullable();
            $table->enum('keselarasan_jurusan', [
                'Sangat Selaras',
                'Selaras',
                'Kurang Selaras',
                'Tidak Selaras',
            ])->nullable()->index();
            $table->string('rentang_gaji_atau_omzet', 100)->nullable();
            $table->unsignedTinyInteger('waktu_tunggu_bulan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tracer_respon');
    }
};
