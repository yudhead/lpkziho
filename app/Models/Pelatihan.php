<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    public function sertifikat()
    {
        return $this->hasMany(Sertifikat::class, 'id', 'id_pelatihan');
    }


    use HasFactory;
    protected $table = 'pelatihan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name_pelatihan'
    ];
}
