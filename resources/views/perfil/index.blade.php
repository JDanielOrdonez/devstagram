@extends('layouts.app')

@section('titulo')
    Editar perfil: {{ auth()->user()->username }}
@endsection


@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form method="POST" action="{{ route('perfil.store') }}"  enctype="multipart/form-data" class="mt-10 md:mt-0">
                @csrf
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                        Username
                    </label>
                    {{-- Los username son lo que se envia y recibe en el servidor --}}
                    <input 
                        name="username" 
                        id="username" 
                        type="text" 
                        placeholder="Tu nombre de Usuario" 
                        class="border p-3 w-full rounded-lg @error('username')
                            border-red-500
                        @enderror"
                        value="{{ auth()->user()->username }}"
                        >
                        

                     {{--Por si hay un error en el input name, este error lo devuelve despues de validar en el RegisterController  --}}
                        {{-- $message = es el mensaje de error que ya laravel tiene por defecto --}}
                     @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                        Email
                    </label>
                    <input 
                        name="email" 
                        id="email" 
                        type="email" 
                        placeholder="Tu email de Registro" 
                        class="border p-3 w-full rounded-lg @error('email')
                            border-red-500
                        @enderror"
                        {{-- Con old cuando el usuario de clic en enviar y si algo esta mal, aun asi mantendra los datos que ya escribio --}}
                        value="{{ old('email') }}"
                        >                        
                     @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold">
                        Imagen perfil
                    </label>
                    <input 
                        name="imagen" 
                        id="imagen" 
                        type="file" 
                        class="border p-3 w-full rounded-lg"
                        value=""
                        accept=".jpg, .jpeg, .png"
                    />                        
                </div>
                <input 
                    type="submit" 
                    value="Guardar Cambios"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg" 
                />
            </form>
        </div>
    </div>
@endsection