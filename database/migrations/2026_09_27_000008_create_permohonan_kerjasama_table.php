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
        Schema::create('permohonan_kerjasama', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perusahaan', 200);
            $table->string('bidang_usaha', 150);
            $table->text('alamat_perusahaan');
            $table->string('email_resmi', 150);
            $table->string('no_telepon', 50);
            $table->string('nama_pic', 150);
            $table->string('jabatan_pic', 150);
            $table->json('jenis_kerjasama');
            $table->text('pesan_tambahan')->nullable();
            $table->text('file_draft_mou')->nullable();
            $table->enum('status', ['MENUNGGU_REVIEW', 'DISETUJUI', 'DITOLAK'])->default('MENUNGGU_REVIEW');
            $table->text('catatan_admin')->nullable();
            $table->string('diproses_oleh', 64)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permohonan_kerjasama');
    }
};
