<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran';

    protected $primaryKey = 'id';
    public $incrementing = true;

    protected $fillable = [
        'harie',
        'name',
        'nohp',
        'nik',
        'jenis_kelamin',
        'alamat',
        'pelatihan',
        'sekolah',
        'agama',
        'kota_lahir',
        'pekerjaan',
        'bekerja_detail',
        'freelance_detail',
        'tgl_lahir',
        'tanggal_terbit',
        'tanggal_berakhir',
        'foto_ktp',
        'pas_foto',
        'foto_ijazah',
        'nama_ibu',
        'email',
        'password',  
    ];
    
    public function programStudy()
    {
        return $this->belongsTo(ProgramStudy::class, 'pelatihan', 'kode_program_studi');
    }
    

    protected $hidden = [
        'nama_ibu', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}