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
        Schema::create('tracer_kuesioner', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 255);
            $table->string('slug', 255)->unique();
            $table->text('deskripsi')->nullable();
            $table->string('tahun_sasaran_lulusan', 10)->index();
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->boolean('is_aktif')->default(true)->index();
            $table->string('created_by', 64);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tracer_kuesioner');
    }
};
