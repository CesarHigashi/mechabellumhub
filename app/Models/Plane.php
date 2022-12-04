<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plane extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name', 'year', 'nations_id', 'machine_guns',
                           'cannons', 'turrets', 'max_height_m', 'crew',
                           'max_speed_kmh', 'weight_kg', 'category','description'];
    
    public function nations(){
        /* Un plane pertenece a una nation */
        return $this->belongsTo(Nation::class);
    }

    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
}
