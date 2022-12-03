<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conflict extends Model
{
    use HasFactory;
    protected $fillable = ['name','start_year','end_year', 'description'];
    
    public function nations(){
        return $this->belongsToMany(Nation::class);
    }
}
