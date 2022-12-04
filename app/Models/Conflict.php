<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Conflict extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name','start_year','end_year', 'description'];
    
    public function nations(){
        return $this->belongsToMany(Nation::class);
    }
}
