<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    /*public function __construct()
    {
        $this->middleware('authuser');
    }*/

    public function create(){
        return view('login.registro');
    }

    public function store(Request $request)
    {
        //validamos que todos los campos se escriban correctamente

        $errors = Validator::make($request->all(),[
            'nombre' => 'required',
            'apellidos' => 'required',
            'fecha_nacimiento' => 'required',
            'email' => 'required|regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/',
            'username' => 'required',
            'contrasenya' => 'required',
        ],[
            'nombre.required' => 'No sabemos como te llamas, dinos tu nombre',
            'fecha_nacimiento.required' => 'Introduce tu fecha de nacimiento',
            'email.required' => 'Dinos cual es tu email',
            'email.regex' => 'introduce un email valido' ,
            'username.required' => 'Introduce un nombre de usuario',
            'contrasenya.required' => 'Introduce una contrasenya',
        ]);

        if ($errors->fails()) {
             return redirect()->back()->withErrors($errors);
        }
        //creamos el usuario nuevo
        $usuario = new User();
        $usuario->nombre = $request->nombre;
        $usuario->apellidos = $request->apellidos;
        $usuario->fecha_nacimiento = $request->fecha_nacimiento;
        $usuario->email = $request->email;
        $usuario->username = $request->username;
        $usuario->password = bcrypt($request->contrasenya);
        $usuario->remember_token = $request->_token;
        if ($usuario->save()){
            return view('main.mainHome');
        }
    }
}
