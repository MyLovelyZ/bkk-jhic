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
        Schema::create('jadwal_interview', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lamaran_id')->unique()->constrained('lamaran')->cascadeOnDelete();
            $table->date('tanggal_interview');
            $table->string('waktu_interview', 20);
            $table->enum('mode', [
                'Tatap Muka (Offline)',
                'Online (Zoom Meeting)',
                'Online (Google Meet)',
            ])->default('Tatap Muka (Offline)');
            $table->text('lokasi_atau_url');
            $table->string('pic_pewawancara', 150);
            $table->text('instruksi_khusus')->nullable();
            $table->enum('status_kehadiran', ['TERJADWAL', 'HADIR', 'RESCHEDULE', 'BATAL'])->default('TERJADWAL');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_interview');
    }
};
