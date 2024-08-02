<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pelatihan;

class Sertifikat extends Model
{
    use HasFactory;
    public function pelatihan()
    {
        return $this->belongsTo(Pelatihan::class, 'id_pelatihan', 'id');
    }

    protected $table = 'sertifikat';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nomor_sertifikat',
        'periode',
        'id_pelatihan',
        'lokasi',
        'nomor_urut',
        'nama',
        'waktu',
        'file_sertifikat',
    ];
}
