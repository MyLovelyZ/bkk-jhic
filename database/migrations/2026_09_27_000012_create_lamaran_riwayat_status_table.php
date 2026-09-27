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
        Schema::create('lamaran_riwayat_status', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lamaran_id')->constrained('lamaran')->cascadeOnDelete();
            $table->string('judul_tahapan', 100);
            $table->text('deskripsi')->nullable();
            $table->string('diubah_oleh_id', 100)->nullable();
            $table->string('diubah_oleh_role', 50)->nullable();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lamaran_riwayat_status');
    }
};
