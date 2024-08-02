<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'pendaftaran';
    protected $fillable = [
        'harie', 'name', 'nohp', 'pekerjaan', 'bekerja_detail', 'freelance_detail', 'sekolah', 'alamat', 'pelatihan', 'nik', 'jenis_kelamin', 'agama', 'kota_lahir', 'tgl_lahir', 'foto_ktp', 'pas_foto', 'foto_ijazah', 'nama_ibu', 'email', 'created_at', 'updated_at', 'tanggal_terbit', 'tanggal_berakhir'
    ];

    public function programStudy()
    {
        return $this->belongsTo(ProgramStudy::class, 'pelatihan', 'kode_program_studi');
    }
}
