<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalBits extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'link',
    ];
}
