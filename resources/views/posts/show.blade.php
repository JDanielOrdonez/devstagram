@extends('layouts.app')

@section('titulo')
    {{ $post->titulo }}
@endsection

@section('contenido')
    <div class="container mx-auto md:flex">
        <div class="md:w-1/2">
            {{-- asset apunta directamente a la carpeta de public --}}
            <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del Post {{ $post->titulo }}">
            <div class="p-3 flex items-center gap-4">
                {{-- ?¿!?!?!?!?!?SIN LIVEWIRE --}}
                {{-- auth= Mostrará el codigo a los usuarios que estan autenticados --}}
                {{-- @auth --}}
                    {{-- El siguiente es un componente de livewire video 162 --}}
                    {{-- <livewire:like-post /> --}}
                    
                    {{-- ENVIAR UNA VARIABLE A LikePost.php desde este template --}}
                    {{-- @php
                        $mensaje = "hola mundo desde una variable!!";
                    @endphp --}}
                    {{-- pasamos la variable mensaje a LikePost.php --}}
                    {{-- <livewire:like-post :mensaje="$mensaje"/> --}}


                    {{-- ENVIAR $post A LikePost y luego se tendra disponible en like-post --}}
                    {{-- <livewire:like-post :post="$post"/> --}}


                    {{-- llamamos al metodo checkLike(esta en Post.php) y le pasamos el usuario que esta autenticado--}}
                    {{-- El metodo checkLike revisa si el usuario autenticado ya dio like al post y devuelve true o false --}}
                    {{-- @if ($post->checkLike(auth()->user())) 
                        <form action="{{ route('posts.likes.destroy', $post)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <div class="my-4">
                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                    </svg>
                                </button>
                            </div>                            
                        </form>                    
                    @else
                        <form action="{{ route('posts.likes.store', $post)}}" method="POST">
                            @csrf
                            <div class="my-4">
                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                    </svg>
                                </button>
                            </div>                            
                        </form>           
                    @endif         
                @endauth --}}
                {{-- auth= Mostrará el codigo a los usuarios que estan autenticados --}}
                {{-- @auth --}}
                    {{-- El siguiente es un componente de livewire video 162 --}}
                    {{-- <livewire:like-post /> --}}
                    
                    {{-- ENVIAR UNA VARIABLE A LikePost.php desde este template --}}
                    {{-- @php
                        $mensaje = "hola mundo desde una variable!!";
                    @endphp --}}
                    {{-- pasamos la variable mensaje a LikePost.php --}}
                    {{-- <livewire:like-post :mensaje="$mensaje"/> --}}


                    {{-- ENVIAR $post A LikePost y luego se tendra disponible en like-post --}}
                    {{-- <livewire:like-post :post="$post"/> --}}


                    {{-- llamamos al metodo checkLike(esta en Post.php) y le pasamos el usuario que esta autenticado--}}
                    {{-- El metodo checkLike revisa si el usuario autenticado ya dio like al post y devuelve true o false --}}
                    {{-- @if ($post->checkLike(auth()->user())) 
                        <form action="{{ route('posts.likes.destroy', $post)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <div class="my-4">
                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                    </svg>
                                </button>
                            </div>                            
                        </form>                    
                    @else
                        <form action="{{ route('posts.likes.store', $post)}}" method="POST">
                            @csrf
                            <div class="my-4">
                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                    </svg>
                                </button>
                            </div>                            
                        </form>           
                    @endif         
                @endauth --}}
                {{-- Contamos con count() la candidad de likes en el post --}}
                {{-- se puede acceder asi ya que en el modelo Post.php ya hay una relacion de uno a muchos en el metodo likes() y eso mismo relaciona la tabla de post con la de likes --}}
                {{-- <p class="font-bold">{{ $post->likes->count() }} <span class="font-normal"> Likes</span></p> --}}


                {{-- CON LIVEWIRE --}}
                {{-- auth= Mostrará el codigo a los usuarios que estan autenticados --}}
                @auth
                    {{-- ENVIAR $post A LikePost y luego se tendra disponible en like-post --}}
                    <livewire:like-post :post="$post"/>
                @endauth
            </div>



            <div>
                {{-- Podemos acceder al usuario que publico el post gracias a la relacion de que 1 post puede ser de un usuario
                    y 1 usuario a muchos posts --}}
                <a class="font-bold">{{ $post->user->username }}</a>

                {{-- created_at es la fecha en que se subio ese post y laravel automaticmanet lo crea en la base de datos --}}
                {{-- diffForHumans formatea la fecha y la muestra mas legible, esto lo trae laravel junto con una libreria
                     que ya tiene instalada por defecto y se llama Carbon --}}
                <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>

                <p class="mt-5">{{ $post->descripcion }}</p>
            </div>

            {{-- con @auth revisamos que el usuario este autenticado o halla iniciado secion --}}
            @auth
                {{-- $post->user_id= Si la persona que hizo el post es igual a la que esta autenticada, entonces muestra el boton de eliminar--}}
                @if ($post->user_id === auth()->user()->id)
                    <form method="POST" action="{{ route('posts.destroy', $post) }}">
                        {{-- Indicamos con esto que el metodo será para borrar(DELETE)
                            Conocidos como METHOD SPOOFING --}}
                        {{-- nativamente el navegador solo permite get y post, method spoofing te permite
                            a otro tipo de peticiones como delete etc 
                            tambien se usa para actualizar registros--}}
                        @method('DELETE')
                        @csrf
                        <input 
                            type="submit"
                            value="Eliminar Publicación"
                            class="bg-red-500 hover:bg-red-600 p-2 rounded text-white font-bold mt-4 cursor-pointer"    
                        />
                    </form>                                
                @endif                
            @endauth

        </div>
        <div class="md:w-1/2 p-5">
            <div class="shadow bg-white p-5 mb-5">
                
                {{-- auth decimos que solo los usuarios que estan autenticados pueden ver este contenido --}}
                @auth()                                    
                <p class="text-xl font-bold text-center mb-4">Agrega un nuevo comentario</p>
                
                {{-- ESA variable se envia desde el metodo store cuando un comentario se agrega correctamente --}}
                {{-- si la variable mensaje que esta en sesion tiene algo entonces entra el if --}}
                @if (session('mensaje'))
                    <div class="bg-green-500 p-2 rounded-lg mb-6 text-white text-center uppercase font-bold">
                        {{ session('mensaje') }}
                    </div>
                @endif

                {{-- los datos se enviaran a la ruta de comentarios.store y a su controlador para que los guarde en la base de datos --}}
                {{-- Tambien se envian las variables mediante un arreglo --}}
                <form action="{{ route('comentarios.store', ['post' => $post, 'user' => $user]) }}" method="POST">
                    @csrf
                    <div class="mb-5">
                        <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold">
                            Añade un comentario
                        </label>
                        {{-- Los name son lo que se envia y recibe en el servidor --}}
                        <textarea 
                            name="comentario" 
                            id="comentario" 
                            placeholder="Agrega un comentario" 
                            class="border p-3 w-full rounded-lg @error('name')
                                border-red-500
                            @enderror">
                        </textarea>
                            
    
                         {{--Por si hay un error en el input name, este error lo devuelve despues de validar en el RegisterController  --}}
                            {{-- $message = es el mensaje de error que ya laravel tiene por defecto --}}
                         @error('comentario')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <input 
                        type="submit" 
                        value="Comentar"
                        class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg" 
                    >
                </form>
                @endauth

                {{-- COMENTARIOS --}}
                {{-- overflow-y-scroll= con esto se agrega la barra de scroll --}}
                <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-10">
                    {{--$post->comentarios= AQUI PRACTICAMENTE ACCEDEMOS A LA RELACION QUE HAY DE LA TABLA POST A LA DE COMENTARIOS --}}
                    {{-- ESTA RELACION SE CREA EN EL METODO comentario() de Post.php --}}
                    @if ($post->comentarios->count())
                        @foreach ($post->comentarios as $comentario)
                            <div class="p-5 border-gray-300 border-b">
                                {{-- AL DAR CLIC AL ENLACE LO REDIGIRA AL PERFIL DEL USUARIO QUE ESCRIBIO EL COMENTARIO
                                    SE LE PASA COMO PARAMETRO EL USUARIO $comentario->user --}}
                                <a href="{{ route('posts.index', $comentario->user) }}" class="font-bold">
                                    {{-- AQUI ACCEDEMOS A LA REALACION UNO A UNO DE COMENTARIO Y USUARIO. se creo en Comentario.php --}}
                                    {{-- LA REALACION INDICA QUE 1 COMENTARIO PERTENECE A USUARIO --}}
                                    {{ $comentario->user->username }}
                                </a>
                                <p>{{ $comentario->comentario }}</p>
                                {{-- created_at es la fecha en que se subio ese post y laravel automaticmanet lo crea en la base de datos --}}
                                {{-- diffForHumans formatea la fecha y la muestra mas legible, esto lo trae laravel junto con una libreria
                                     que ya tiene instalada por defecto y se llama Carbon --}}
                                <p class="text-sm text-gray-500">{{ $comentario->created_at->diffForHumans() }}</p>{{-- fecha que se hizo el comentario --}}
                            </div>
                        @endforeach
                    @else
                        <p class="p-10 text-center">No Hay Comentarios Aún</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection