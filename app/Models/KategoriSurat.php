<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriSurat extends Model
{
    public function surats()
    {
        return $this->hasMany(Surat::class, 'id', 'id_kategori');
    }


    use HasFactory;
    protected $table = 'kategori';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'title',
    ];
}
