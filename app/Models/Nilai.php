<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $table = 'nilai'; // Pastikan ini benar

    protected $fillable = [
        'nik',
        'nama_siswa',
        'kode_program_studi',
        'id_jenis_ujian',
        'tanggal_ujian',
        'jam_ujian',
        'jml_benar',
        'jml_salah',
        'skor'
    ];
}
