<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke()
    {



        // OBTENER A QUIENES SEGUIMOS
        $ids = auth()->user()->followings->pluck('id')->toArray();

        // Seleccionamos todos los post donde la tabla user_id sea igual al arreglo de $ids        
        $posts = Post::whereIn('user_id', $ids)->latest()->paginate(20);

        return view('home', [
            'posts' => $posts
        ]);     
    }
}
