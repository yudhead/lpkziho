<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramStudy extends Model
{
    use HasFactory;

    protected $table = 'tb_program_studi';
    protected $primaryKey = 'kode_program_studi';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'kode_program_studi',
        'nama_program_studi',
        'biaya',
        'lama_waktu',
    ];

    public function pendaftaran()
    {
        return $this->belongsTo(pendaftaran::class, 'pelatihan', '');
    }

    public function peserta()
    {
        return $this->hasMany(Peserta::class, 'kode_program_studi', 'kode_program_studi');
    }
}
