<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plane extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'year', 'country', 'machine_guns',
                           'cannons', 'turrets', 'max_height_m', 'crew',
                           'max_speed_kmh', 'weight_kg', 'category','description'];
}
