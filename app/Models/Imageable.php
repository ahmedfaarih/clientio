<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imageable extends Model
{
    use HasFactory;
    protected $fillable = [
        'imageable_type',
        'imageable_id',
        'file_path'
    ];


    public function imageable()
    {
        return $this->morphTo();
    }
}
