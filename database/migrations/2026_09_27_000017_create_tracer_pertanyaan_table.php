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
        Schema::create('tracer_pertanyaan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kuesioner_id')->constrained('tracer_kuesioner')->cascadeOnDelete();
            $table->unsignedSmallInteger('urutan')->default(1);
            $table->text('teks_pertanyaan');
            $table->enum('tipe_jawaban', [
                'PILIHAN_GANDA',
                'CHECKBOX',
                'TEXT',
                'ANGKA',
                'SKALA_RATING',
                'DROPDOWN',
            ]);
            $table->json('opsi_jawaban_json')->nullable();
            $table->boolean('is_wajib')->default(true);
            $table->json('kondisi_tampil_json')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tracer_pertanyaan');
    }
};
