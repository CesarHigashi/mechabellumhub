<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['location', 'original_name', 'mime', 'imageable_id', 'imageable_type'];
    public function imageable(){
        return $this->morphTo();
    }
}
