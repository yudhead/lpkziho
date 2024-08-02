<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat');
            $table->foreignId('id_kategori')->constrained('kategori', 'id')->onDelete('cascade')->onUpdate('cascade');
            $table->string('judul');
            $table->string('tujuan');
            $table->datetime('waktu_pengarsipan')->nullable()->default(now());
            $table->string('file_surat');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('surats');
    }
};
