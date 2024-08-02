<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('informasi_pages', function (Blueprint $table) {
            $table->integer('order')->default(0)->after('id'); // Menambahkan kolom order
        });
    }

    public function down()
    {
        Schema::table('informasi_pages', function (Blueprint $table) {
            $table->dropColumn('order'); // Menghapus kolom order jika diperlukan rollback
        });
    }
};
