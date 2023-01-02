<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    //Guardar likes en la base de datos
    public function store(Request $request,  Post $post)
    {
        $post->likes()->create([
            'user_id' => $request->user()->id
        ]);

        return back();
    }

    public function destroy(Request $request, Post $post)
    {
        // En el request viene el usuario(user) y ya tiene los likes gracias a la relacion en User.php
        // despues filtramos con where en la columna post_id el id para borrarlos posteriormente con delete()
        $request->user()->likes()->where('post_id', $post->id)->delete();
        return back();
    }

}
