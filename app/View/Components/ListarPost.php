<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ListarPost extends Component
{
   
    // $posts= VARIABLE ENVIADA DESDE EL LUGAR DONDE SE RENDERIZA ESTE COMPONENTE, POR EJEMPLO EN home.blade.php
    public $posts;
    public function __construct($posts)
    {
        $this->posts = $posts;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.listar-post');
    }
}
