<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sertifikat', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_sertifikat');
            $table->string('periode');
            $table->foreignId('id_pelatihan')->constrained('pelatihan', 'id')->onDelete('cascade')->onUpdate('cascade');
            $table->string('lokasi');
            $table->string('nomor_urut');
            $table->string('nama');
            $table->datetime('waktu')->nullable()->default(now());
            $table->string('file_sertifikat');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('sertifikat');
    }
};
