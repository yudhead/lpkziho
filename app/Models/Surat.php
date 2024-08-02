<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;

class Surat extends Model
{
    use HasFactory;

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id');
    }

    protected $table = 'surats';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nomor_surat',
        'id_kategori',
        'judul',
        'tujuan',
        'waktu_pengarsipan',
        'file_surat',
    ];
}
