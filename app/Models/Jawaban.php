<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    use HasFactory;

    protected $table = 'tb_jawaban'; // Nama tabel yang sesuai di database
    protected $primaryKey = 'id_jawaban'; // Primary key

    protected $fillable = [
        'id_peserta', 'id_soal_ujian', 'jawaban', 'skor'
    ];

    public function peserta()
    {
        return $this->belongsTo(Peserta::class, 'id_peserta');
    }
}

