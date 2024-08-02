<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramPelatihan extends Model
{
    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
        use HasFactory;
        protected $table = 'program_pelatihan_pages';
        protected $fillable = ['id','title', 'content','order'];
}
