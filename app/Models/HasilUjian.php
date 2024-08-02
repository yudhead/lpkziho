<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilUjian extends Model
{
    use HasFactory;

    protected $table = 'tb_peserta';  // Menggunakan tabel 'tb_peserta' sebagai sumber data

    public function pendaftaran()
{
    return $this->belongsTo(Pendaftaran::class, 'id_siswa', 'id_siswa');
}


    public function programStudi()
    {
        return $this->belongsTo(ProgramStudy::class, 'kode_program_studi', 'kode_program_studi');
    }

    public function jenisUjian()
    {
        return $this->belongsTo(JenisUjian::class, 'id_jenis_ujian', 'id_jenis_ujian');
    }
}
