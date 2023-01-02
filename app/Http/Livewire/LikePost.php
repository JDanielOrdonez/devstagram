<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LikePost extends Component
{
    // 1.- PARA PASAR VARIABLE PRIMERO SE TIENE QUE PASAR DESDE LA VISTA POR EJEMPLO EN show.blade.php <livewire:like-post :post="$post"/>
    // 2.- SEGUNDO TENEMOS QUE INDICARLO AQUI public $post;
    // 3.- TERCERO TENEMOS QUE MOSTRARLO EN EL COMPONENTE like-post.blade.php <h1>{{ $post->titulo }}</h1> 


    // ahora es post la variable que se envia desde show.blade y se muestra en like-post.blade.php
    public $post; //Modelo post
    public $isLiked; //saber si el usuario autenticado ya dio like o no
    public $likes; //Contador de likes

    // mount es una funcion que se ejecutara automaticamente cuando este LikePost sea instansiado como un constructor :V solo cambia en nombre
    // SE EJECUTA UNA SOLA VEZ
    public function mount($post)
    {
        // Cuando mandamos a llamar este LikePost en el show.blade.php se manda a llamar automaticamente este mount
        // despues evalua con el metodo checkLike si el usuario actual o autenticado ya dio like al post 
        // despues lo que devuelve checklike es un booleano por lo que se guarda en isLiked
        $this->isLiked = $post->checkLike(auth()->user());
        $this->likes = $post->likes->count(); //Contamos la cantidad de likes que tiene el post
    }
   
   public function like()
   {
        //Con este if evaluamos si el usuario ya dio like a la publicacion    
        // checkLike es una funcion que evalua si el usuario ya dio like
       if ($this->post->checkLike(auth()->user())){
            // si es true quiere decir que ya dio like por lo que borramos ese like
            // despues filtramos con where en la columna post_id el id para borrarlos posteriormente con delete()
           $this->post->likes()->where('post_id', $this->post->id)->delete();
           $this->isLiked = false; //Reescribimos la variable para que valla camnbiando dinamicamente   
           $this->likes--; //Disminuimos 1 like
       }else{
        //    si el false quiere decir que no ha dado like y almacenamos su like en la columna 'user_id' 
           $this->post->likes()->create([
               'user_id' => auth()->user()->id
            ]);
            $this->isLiked = true;
            $this->likes++;//Aumentamos 1 like
    }
   }
   
   
    // $mensaje es un atributo creado aqui
    // con solo ponerlo aqui ya esta disponible tambien en la vista, en este caso en like-post.blade.php
    // public $mensaje = "Hola mundo desde un atributo";

    // ahora $mensaje ya es un atributo o variable que viene desde el template de show.blade.php se envio asi= <livewire:like-post :mensaje="$mensaje"/>
    // public $mensaje;    

    public function render()
    {
        return view('livewire.like-post');
    }
}
