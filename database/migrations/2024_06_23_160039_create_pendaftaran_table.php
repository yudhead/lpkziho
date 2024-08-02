<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->string('harie')->nullable();
            $table->string('name')->nullable();
            $table->string('nohp');
            $table->string('pekerjaan');
            $table->string('bekerja_detail');
            $table->string('freelance_detail');
            $table->string('sekolah');
            $table->string('alamat');
            $table->string('pelatihan');
            $table->string('nik')->nullable()->unique();
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable();
            $table->string('agama');
            $table->string('kota_lahir');
            $table->date('tgl_lahir');
            $table->string('tanggal_berakhir');
            $table->date('tanggal_terbit');
            $table->string('foto_ktp', 255)->nullable();
            $table->string('pas_foto', 255)->nullable();
            $table->string('foto_ijazah', 255)->nullable();
            $table->string('nama_ibu');
            $table->string('email')->unique();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran');
    }
};
