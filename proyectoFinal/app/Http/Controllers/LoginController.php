<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    private $session_key;
    /*public function __construct()
    {
        $this->middleware('authuser');
    }*/
    public function open() {
        return view('login.login');
    }

    public function postLogin(Request $request){
        $errors= Validator::make($request->all(),
            [
                'username' => 'required',
                'password' => 'required'
            ],
            [
                'usario.required' => 'Campo obligatorio',
                'password.required' => 'Campo obligatorio'
            ]
        );
        if ($errors->fails()){
            return redirect()->back()->withErrors($errors);
        }
        $credenciales = [
            'usuario' => $request->usuario,
            'password' => $request->password,
        ];
        if (Auth::attempt($credenciales, true)) {
            session([$this->session_key => Auth::user()]);
            return redirect('home');
        } else {
            $errors = ['ko' => 'Usuario o contrasenya inccorrectos'];
            return redirect()->back()->withErrors($errors);

        }






    }
}
