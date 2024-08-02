<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;

    protected $table = 'tb_peserta';
    protected $primaryKey = 'id_peserta';

    protected $fillable = [
        'kode_program_studi', 'id_siswa', 'id_jenis_ujian', 'tanggal_ujian', 'durasi_ujian', 'status_ujian', 'benar', 'salah', 'nilai'
    ];

    public function siswa()
    {
        return $this->belongsTo(Pendaftaran::class, 'id_siswa', 'id');
    }

    public function jenisUjian()
    {
        return $this->belongsTo(JenisUjian::class, 'id_jenis_ujian');
    }

    public function programStudi()
    {
        return $this->belongsTo(ProgramStudy::class, 'kode_program_studi', 'kode_program_studi');
    }
}
