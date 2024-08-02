<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
        use HasFactory;
        protected $table = 'kontak_pages';
        protected $fillable = ['id','title', 'content','foto','order'];
}
