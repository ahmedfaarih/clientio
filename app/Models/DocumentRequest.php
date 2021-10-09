<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'request_staus'
    ];

    public function images()
    {
        return $this->morphMany(Imageable::class,'imageable');
    }
}
