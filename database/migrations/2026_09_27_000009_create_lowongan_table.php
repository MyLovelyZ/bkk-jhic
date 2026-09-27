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
        Schema::create('lowongan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mitra_id')->constrained('mitra')->cascadeOnDelete();
            $table->string('judul', 255)->index();
            $table->string('slug', 255)->unique()->index();
            $table->enum('tipe', ['PKL', 'Kerja'])->index();
            $table->string('tipe_badge', 50);
            $table->string('target_jurusan', 150);
            $table->string('lokasi', 150);
            $table->string('kategori_posisi', 100)->nullable();
            $table->string('gaji_kompensasi', 150)->nullable();
            $table->unsignedSmallInteger('kuota')->default(1);
            $table->date('deadline')->index();
            $table->text('deskripsi');
            $table->json('persyaratan_json');
            $table->json('benefit_json')->nullable();
            $table->enum('status', ['Aktif', 'Ditutup', 'Draft'])->default('Aktif')->index();
            $table->unsignedBigInteger('views_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lowongan');
    }
};
