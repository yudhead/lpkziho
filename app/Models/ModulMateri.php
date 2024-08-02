<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ModulMateri extends Model
{
    use HasFactory;

    protected $table = 'modul_materi'; // Nama tabel yang sesuai di database
    protected $primaryKey = 'id_modul'; // Primary key

    protected $fillable = [
        'modul_pembelajaran',
        'judul_materi',
        'kode_program_studi',
        'file_path' // Ganti dengan field baru
    ];

    public function programStudi()
    {
        return $this->belongsTo(ProgramStudy::class, 'kode_program_studi', 'kode_program_studi');
    }
}
