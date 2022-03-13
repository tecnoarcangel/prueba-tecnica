<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaSuscriptores extends Model
{
    use HasFactory;
    protected $fields = [
        'lista_id',
        'suscriptor_id',
    ];

    public function suscriptor()
    {
        return $this->belongsTo(Suscriptor::class,'suscriptor_id','id');
    }

    public function lista()
    {
        return $this->belongsTo(Lista::class,'lista_id','id');
    }
}
