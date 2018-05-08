<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function open() {
        return view('login.login');
    }

    public function postLogin(Request $request){

    }
}
