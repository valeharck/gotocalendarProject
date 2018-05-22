<?php

namespace App\Http\Controllers;

use App\notes;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $user = session()->get('user');
        return view('home.home', compact('user'));
    }
    public function getNotes($id){
        $notes = User::find($id)->first()->notes;
        return $notes;
    }

    public function getBlocNotas() {
        $id = session()->get('user')->id;
        $notes = $this->getNotes($id);
        return view('home.notes', compact('notes'));
    }

    public function setNota(Request $request) {
        $user_id = session()->get('user')->id;
        $note = new notes();
        $note->nota = $request->nota;
        $note->user_id = $user_id;
        if ($note->save()){
            return true ;
        } else {
            return false;
        }
    }

    public function updateNota() {

    }

    public function deleteNota() {

    }
}
