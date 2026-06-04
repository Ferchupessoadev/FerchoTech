<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LucideIcon extends Model
{
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['id', 'tags'];

    protected $casts = [
        'tags' => 'array',
    ];
}
