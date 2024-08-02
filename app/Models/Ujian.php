<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ujian extends Model
{
    use HasFactory;

    protected $table = 'tb_peserta';

    protected $fillable = [
        'kode_program_studi', 
        'id_siswa', 
        'id_jenis_ujian', 
        'tanggal_ujian', 
        'durasi_ujian', 
        'status_ujian', 
        'benar', 
        'salah', 
        'nilai'
    ];
}
