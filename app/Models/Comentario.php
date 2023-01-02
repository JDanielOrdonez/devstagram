<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    // AQUI INDICAMOS LOS CAMPOS QUE SE INSERTARAN A LA BASE DE DATOS
    protected $fillable = [
        'user_id',
        'post_id',
        'comentario'
    ];

    // RELACION DE 1 COMENTARIO A 1 USUARIO
    public function user()
    {
        // Indicamos que este comentario pertenece a un usuario
        return $this->belongsTo(User::class);
    }
}
