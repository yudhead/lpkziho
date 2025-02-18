<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
    use HasFactory;
    protected $table = 'home_pages';

    protected $fillable = ['id','title', 'content','order'];
}
