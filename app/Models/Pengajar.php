<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengajar extends Model
{
    protected $table = 'tb_pengajar'; // Nama tabel sesuai dengan yang ada di database

    protected $primaryKey = 'NIK'; // Primary key dari tabel

    public $incrementing = false; // Jika primary key bukan auto-increment
    protected $keyType = 'string'; // Jika primary key adalah string

    protected $fillable = [
        'NIK',
        'nama_pengajar',
        'nama_program_studi' // Menggunakan nama_program_studi
    ];
}
