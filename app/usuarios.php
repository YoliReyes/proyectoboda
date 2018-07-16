<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usuarios extends Model
{
    
    protected $fillable = [
        'id_usuario', 'nombre', 'codigo_confirmacion','adulto','confirmado', 'asistira','updated_at','comida', 'cafe', 'recena', 'menuespecial','Observaciones', 'nombreConfirm', 'tlfConfirm', 'emailConfirm',
    ];

}
