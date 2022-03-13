<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagina extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'title',
        'route',
        'status',
        'layout',
        'css',
        'body',
        'scripts',
        'meta_title',
        'meta_type',
        'meta_image',
        'meta_url',
        'meta_description',
        'meta_keywords',
    ];
    public function getRouteKeyName()
    {
        return 'route';
    }
}
