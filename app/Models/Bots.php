<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bots extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',  'image','details'
    ];
}
