<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tank extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'year', 'nations_id', 'caliber_mm', 'crew', 
                          'max_speed_kmh', 'weight_kg', 'category','description'];

    public function nations(){
        /* Un plane pertenece a una nation */
        return $this->belongsTo(Nation::class);
    }                      
}

