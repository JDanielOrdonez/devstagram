@extends('layouts.app')

@section('titulo')
    Crea una nueva publicación
@endsection

{{-- push es para poner archivos javascript o css e inyectarlo en app.blade en la parte de stack --}}
{{-- esta hoja de estilo solo aparecera en una ruta y no en todas, solo donde se requiera --}}
@push('styles')
    {{-- estilos de dropzone --}}
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            {{-- enctype="multipart/form-data"= obligatorio poner para subir imagenes --}}
            {{-- el siguiente form es para subir imagenes y se hizo con la libreria de dropzone --}}
            <form action="{{ route('imagenes.store') }}" method="POST" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                {{-- directiva de seguridad obligatoria en los forms y para dropzone --}}
                @csrf
            </form>
        </div>
        <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0">
            {{-- Los datos se envian a crear-cuenta --}}
            {{-- <form action="/crear-cuenta" method="POST"> usando /crear-cuenta(una url)--}} 
                <form action="{{ route('posts.store') }}" method="POST" novalidate>
                    {{-- Esto de csrf es una implementacion de seguridad a los metodos de envio
                        en este caso para post y genera un token de seguridad para cada envio al formulario--}}
                        {{-- Cross-site request forgery --}}
                    @csrf
                    <div class="mb-5">
                        <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">
                            Titulo
                        </label>
                        {{-- Los name son lo que se envia y recibe en el servidor --}}
                        <input 
                            name="titulo" 
                            id="titulo" 
                            type="text" 
                            placeholder="Titulo de la publicación" 
                            class="border p-3 w-full rounded-lg @error('name')
                                border-red-500
                            @enderror"
                            {{-- Con old cuando el usuario de clic en enviar y si algo esta mal, aun asi mantendra los datos que ya escribio --}}
                            value="{{ old('titulo') }}"
                            >
                            
    
                         {{--Por si hay un error en el input name, este error lo devuelve despues de validar en el RegisterController  --}}
                            {{-- $message = es el mensaje de error que ya laravel tiene por defecto --}}
                         @error('titulo')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">
                            Descripción
                        </label>
                        {{-- Los name son lo que se envia y recibe en el servidor --}}
                        <textarea 
                            name="descripcion" 
                            id="descripcion" 
                            placeholder="Descripción de la publicación" 
                            class="border p-3 w-full rounded-lg @error('name')
                                border-red-500
                            @enderror"
                            {{-- Con old cuando el usuario de clic en enviar y si algo esta mal, aun asi mantendra los datos que ya escribio --}}                            
                            >{{ old('descripcion') }}</textarea>
                            
    
                         {{--Por si hay un error en el input name, este error lo devuelve despues de validar en el RegisterController  --}}
                            {{-- $message = es el mensaje de error que ya laravel tiene por defecto --}}
                         @error('descripcion')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Ponemos la imagen en un input hidden para posteiormente guardarlo en la base de datos
                        cuando la imagen se sube se guarda en la base de datos y eso se mueve desde app.js --}}
                    {{-- old para que cuando se envie y si hay un error que el valor de imagen no se elimine --}}
                        <div class="mb-5">
                        <input 
                            name="imagen"
                            type="hidden" 
                            value="{{ old('imagen') }}"
                        />
                        @error('imagen')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <input 
                    type="submit" 
                    value="Crear publicación"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg" 
                    >
                </form>
        </div>
    </div>
@endsection