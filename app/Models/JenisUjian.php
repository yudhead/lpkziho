<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisUjian extends Model
{
    use HasFactory;

    protected $table = 'tb_jenis_ujian'; // Nama tabel yang sesuai di database
    protected $primaryKey = 'id_jenis_ujian'; // Primary key

    protected $fillable = [
        'nama_ujian',
    ];

    public function peserta()
    {
        return $this->hasMany(Peserta::class, 'id_jenis_ujian', 'id_jenis_ujian');
    }
}

