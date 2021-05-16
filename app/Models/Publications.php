<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publications extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'type',
        'tags',
        'content',
        'img',
        'status',
    ];


    public function usersPublications()
    {
        return $this->belongsTo(User::class);
    }
}
