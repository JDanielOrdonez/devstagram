<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class logoutController extends Controller
{
    //
    public function store()
    {
        // Cerrar la secion
        auth()->logout();

        return redirect()->route('login');
    }
}
