<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoalUjian extends Model
{
    use HasFactory;

    protected $table = 'tb_soal_ujian'; // Nama tabel yang sesuai di database
    protected $primaryKey = 'id_soal_ujian'; // Primary key

    protected $fillable = [
        'kode_program_studi', 'id_jenis_ujian', 'pertanyaan', 'a', 'b', 'c', 'd', 'kunci_jawaban'
    ];

    public function programStudy()
    {
        return $this->belongsTo(ProgramStudy::class, 'kode_program_studi', 'kode_program_studi');
    }

    public function jenisUjian()
    {
        return $this->belongsTo(JenisUjian::class, 'id_jenis_ujian', 'id_jenis_ujian');
    }
}
