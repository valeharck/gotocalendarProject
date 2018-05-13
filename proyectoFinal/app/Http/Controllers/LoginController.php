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
                'usuario' => 'required',
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
        $credentials = [
            'username' => $request->get('usuario'),
            'password' => $request->get('password'),
        ];
        if (Auth::attempt($credentials, true)) {
            session([$this->session_key => Auth::user()]);
            return redirect('home');
        }
        $errors += [ 'invalid' => "Error, Usuario o contrasenya incorrectos" ];
        return redirect()->back()->with($errors);








    }
}
