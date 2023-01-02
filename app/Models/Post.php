<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'user_id'
    ];

    // RELACIONES EN LOS MODELOS
    public function user()
    {
        // un post pertenece a un usuario
        return $this->belongsTo(User::class)->select(['name', 'username']);
    }

     public function comentarios()
    {
        // ESTAMOS INDICANDO UNA RELACION 1 a muchos
        return $this->hasMany(Comentario::class);
    }
    public function likes()
    {
        // un post tendra muchos likes
        return $this->hasMany(Like::class);
    }

    // Metodo para revisar si un usuario ya le dio like a una publicacion
    public function checkLike(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }
}
