<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Validator;
use Illuminate\Support\Facades\Auth;
use App\Mail\WelcomeEmail;

class UserController extends Controller
{
    public function getLogin() {
        return view('login.login');
    }

    public function postLogin(Request $request){
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ],
            [
                'email.required' => 'Campo obligatorio',
                'password.required' => 'Campo obligatorio'
            ]
        );
        $credentials = $request->only('email','password');
        if (Auth::attempt($credentials, true)){
            session(['user'=>Auth::user()]);
            return redirect('home');
        }
        return redirect()->back()
            ->withInput($request->only('email', 'remember'))
            ->withErrors([
                'invalid' => "email o contrasenya incorrectos",
            ]);
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
            /* ENVIAMOS CORREO DE BIENVENIDA*/
            $objDemo = new \stdClass();
            $objDemo->sender = 'Aitor Lopez';
            $objDemo->receiver = $request->nombre;

            Mail::to($request->email)->send(new WelcomeEmail($objDemo));
            /* REDIRIGIMOS*/
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
        $data = Input::all();
        $errors = Validator::make($data,[
            'nombre' => 'required',
            'apellidos' => 'required',
            'fecha_nacimiento' => 'required',
            'email' => 'required|regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/',
            'username' => 'required',
        ],[
            'nombre.required' => 'No sabemos como te llamas, dinos tu nombre',
            'fecha_nacimiento.required' => 'Introduce tu fecha de nacimiento',
            'email.required' => 'Dinos cual es tu email',
            'email.regex' => 'introduce un email valido' ,
            'username.required' => 'Introduce un nombre de usuario',
        ]);

        if ($errors->fails()) {
            return response()->json(array(
                'success' => false,
                'errors' => $errors->getMessageBag()->toArray()

            ), 200);
        }
            $id =  session()->get('user')->id;
            $user = User::find($id)->first();
            $user->nombre = $data['nombre'];
            $user->apellidos = $data['apellidos'];
            $user->fecha_nacimiento = $data['fecha_nacimiento'];
            $user->email = $data['email'];
            $user->username = $data['username'];
            $user->password = $data['password'];
            $user->update();
            return response()->json(array(
                'succes' => true
            ),200);
        }
}
