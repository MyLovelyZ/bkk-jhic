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
        Schema::create('cv_keahlian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cv_id')->constrained('cv_resumes')->cascadeOnDelete();
            $table->string('nama_keahlian', 100);
            $table->string('kategori', 50)->default('Teknis');
            $table->enum('tingkat_kemahiran', ['Dasar', 'Menengah', 'Mahir'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cv_keahlian');
    }
};
