<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nation extends Model
{
    use HasFactory;
    
    public function planes(){
        /* Una nation tiene varios planes */
        return $this->hasMany(Plane::class);
    }

    public function conflicts(){
        return $this->belongsToMany(Conflict::class);
    }
}
