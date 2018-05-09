<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('userauth');
    }
    public function open() {
        return view('login.login');
    }

    public function postLogin(Request $request){

    }
}
