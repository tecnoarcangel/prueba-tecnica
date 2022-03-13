<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    use HasFactory;
    protected $fields = [
        'title',
        'active',
    ];
    protected $casts = [
        'active' => 'boolean',
    ];
    public function suscriptores()
    {
        return $this->hasMany(Suscriptor::class,'lista_id','id');
    }
}
