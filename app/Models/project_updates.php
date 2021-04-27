<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project_updates extends Model
{
    use HasFactory;
    protected $fillable = [
        'remarks',
        'user_id',
        'project_id',
        'date',

    ];

    public function projects()
    {
        return $this->belongsTo(Projects::class);
    }
}
