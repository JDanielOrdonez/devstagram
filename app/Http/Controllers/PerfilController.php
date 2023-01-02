<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('perfil.index');
    }

    public function store(Request $request)
    {
        $request->request->add(['username' => Str::slug($request->username)]);

        $this->validate($request, [
            'username' => ['required', 'unique:users,username,'.auth()->user()->id, 'min:3', 'max:20', 'not_in:twitter,editar-perfil'],
            'email' => ['required', 'unique:users,email,'.auth()->user()->id, 'email', 'max:60'],
        ]);

        // Aqui validamos si hay una imagen en el request
        if($request->imagen){            
            $imagen = $request->file('imagen');
            
            $nombreImagen = Str::uuid() . "." . $imagen->extension();
            $imagenServidor = Image::make($imagen);
            $imagenServidor->fit(1000,1000);

            // MOVEMOS LA IMAGEN A LA CARPETA public/perfiles 
            $imagenPath = public_path('perfiles') . '/' . $nombreImagen;

            // GUARDAMOS LA IMAGEN(no se guarda la imagen, solo el nombre)
            $imagenServidor->save($imagenPath);
        }

        $usuario = User::find(auth()->user()->id);        
        $usuario->username = $request->username;    
        $usuario->email = $request->email;
        
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen  ?? null;
        
        // Guardamos en la base de datos los nuevos datos
        $usuario->save();


        // REDIRECCIONAR AL USUARIO
        return redirect()->route('posts.index', $usuario->username);
    }
}
