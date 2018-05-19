<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function getLogin() {
        return view('login.login');
    }

    public function postLogin(Request $request){
        $errors= Validator::make($request->all(),
            [
                'email' => 'required',
                'password' => 'required'
            ],
            [
                'email.required' => 'Campo obligatorio',
                'password.required' => 'Campo obligatorio'
            ]
        );
        if ($errors->fails()){
            return redirect()->back()->withErrors($errors);

        }
        $credentials = [
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ];
        if (Auth::attempt($credentials, true)) {
            //$user = User::where('email', $credentials['email'])->get();
            session(['user'=>Auth::user()]);
            return redirect('home');
        }
        $errors += [ 'invalid' => "Error, Usuario o contrasenya incorrectos" ];
        return redirect()->back()->with($errors);
    }

    public function getRegister(){
        return view('login.registro');
    }

    public function postRegister(Request $request)
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

    public function getLogout() {
        session()->flush();
        return redirect('/');
    }

    public function getProfile() {
        $id = session()->get('user')->id;
        $user = User::where('id',$id)->get();
        return view('home.profile', compact('user','contra'));
    }

    public function updateUser(Request $request){
        if ($request->ajax()){
            $user = new User();
            $user->id =  session()->get('user')->id;
            $user->nombre = $request->nombre;
            $user->apellidos = $request->apellidos;
            $user->fecha_nacimiento = $request->fecha_nacimiento;
            $user->email = $request->email;
            $user->username = $request->username;
            $user->password = $request->password;

            $user = User::where('id', id)->update([
                'nombre' => nombre,
                'apellidos' => apellidos,
                'fecha_nacimiento' => fecha_nacimiento,
                'email' => email,
                'username' => username,
                'password' => password,
            ]);
            /*if ($user->save()){
                return response()->json([
                    'Actualizado' => true
                ]);
            } else {
                return false;
            }*/
        }
    }
}
