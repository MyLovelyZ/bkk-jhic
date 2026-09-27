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
        Schema::create('tracer_jawaban_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('respon_id')->constrained('tracer_respon')->cascadeOnDelete();
            $table->foreignId('pertanyaan_id')->constrained('tracer_pertanyaan')->cascadeOnDelete();
            $table->text('jawaban_teks')->nullable();
            $table->json('jawaban_json')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tracer_jawaban_detail');
    }
};
