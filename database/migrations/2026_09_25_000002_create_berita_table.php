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
        Schema::create('berita', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 255);
            $table->string('slug', 255)->unique()->index();
            $table->foreignId('kategori_id')->constrained('kategori_berita')->cascadeOnDelete();
            $table->text('ringkasan');
            $table->longText('konten'); // Markdown content
            $table->text('gambar_sampul')->nullable();
            $table->string('caption_gambar', 255)->nullable();
            $table->string('penulis_nama', 150);
            $table->string('penulis_jabatan', 150)->nullable();
            $table->text('penulis_avatar')->nullable();
            $table->text('penulis_bio')->nullable();
            $table->string('estimasi_baca', 50)->nullable();
            $table->boolean('is_featured')->default(false)->index();
            $table->string('status', 20)->default('PUBLISHED')->index(); // PUBLISHED, DRAFT
            $table->unsignedBigInteger('views_count')->default(0);
            $table->timestamp('published_at')->nullable()->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berita');
    }
};
