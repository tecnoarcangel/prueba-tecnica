<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boletin extends Model
{
    use HasFactory;
    protected $fields = [
        'title',
        'slug',
        'text',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];
}
