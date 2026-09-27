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
        Schema::create('notifikasi', function (Blueprint $table) {
            $table->id();
            $table->string('recipient_id', 100)->index();
            $table->string('recipient_role', 50)->index();
            $table->string('judul', 200);
            $table->text('deskripsi');
            $table->string('tipe_notifikasi', 50)->default('INFO');
            $table->string('url_action', 255)->nullable();
            $table->boolean('is_read')->default(false)->index();
            $table->boolean('is_accent')->default(false);
            $table->timestamp('read_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifikasi');
    }
};
