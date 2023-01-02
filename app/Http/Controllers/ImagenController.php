<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    public function store(Request $request){
        $imagen = $request->file('file');

        $nombreImagen = Str::uuid() . "." . $imagen->extension();
        $imagenServidor = Image::make($imagen);
        $imagenServidor->fit(1000,1000);

        // MOVEMOS LA IMAGEN A LA CARPETA uploads QUE ESTA EN public
        $imagenPath = public_path('uploads') . '/' . $nombreImagen;

        // GUARDAMOS LA IMAGEN(no se guarda la imagen, solo el nombre)
        $imagenServidor->save($imagenPath);
        
        return response()->json(['imagen' => $nombreImagen]);   
    }
}
