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
        Schema::create('mitra', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perusahaan', 200)->index();
            $table->string('singkatan', 50)->nullable();
            $table->string('npwp', 50)->unique()->index();
            $table->string('password', 255);
            $table->string('sektor_industri', 150);
            $table->text('alamat_kantor');
            $table->string('kota', 100);
            $table->string('website', 255)->nullable();
            $table->string('email_perusahaan', 150);
            $table->string('no_telp_perusahaan', 50);
            $table->text('logo_url')->nullable();
            $table->string('status_kemitraan', 100)->default('Mitra IDUKA Terverifikasi');
            $table->date('tanggal_mou_mulai')->nullable();
            $table->date('tanggal_mou_selesai')->nullable();
            $table->boolean('is_verified')->default(false)->index();
            $table->string('pic_name', 150);
            $table->string('pic_role', 150);
            $table->string('pic_email', 150);
            $table->string('pic_phone', 50);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mitra');
    }
};
