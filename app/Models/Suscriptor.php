<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suscriptor extends Model
{
    use HasFactory;
    protected $table = 'suscriptores';
    protected $fillable = [
        'email',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];
    public function listas()
    {
        return $this->belongsToMany(Lista::class,'lista_suscriptores','suscriptor_id');
    }
}
