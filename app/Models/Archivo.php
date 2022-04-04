<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;

    protected $table = 'archivos';

    protected $fillable = [
        'usuario_id',
        'nombre',
        'archivo',
        'descripcion',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class,'usuario_id','id');
    }
}
