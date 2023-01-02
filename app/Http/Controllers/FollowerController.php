<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function store(User $user)
    {
        // GUARDAR EN LA BD UN SEGUIDOR
        $user->followers()->attach( auth()->user()->id );
        return back();
    }
    public function destroy(User $user)
    {
        // ELIMINAR UN SEGUIDOR DE LA BD
        $user->followers()->detach( auth()->user()->id );
        return back();
    }
}
