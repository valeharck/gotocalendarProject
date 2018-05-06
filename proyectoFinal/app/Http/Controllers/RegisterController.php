<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create(){
        return view('login.registro');
    }

    public function store(Request $request){

        $usuario = new User();
        $usuario->nombre = $request->nombre;
        $usuario->apellidos = $request->apellidos;
        $usuario->fecha_nacimiento = $request->fecha_nacimiento;
        $usuario->email = $request->email;
        $usuario->username = $request->username;
        $usuario->password = $request->contrasenya;
        if ($usuario->save()){
            return view('main.mainHome');
        }
    }
}
