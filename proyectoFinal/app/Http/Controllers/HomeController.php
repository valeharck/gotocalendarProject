<?php

namespace App\Http\Controllers;

use App\notes;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    public function index(){
        $user = session()->get('user');
        return view('home.home', compact('user'));
    }
    public function getNotes($id){
        $notes = User::find($id)->notes;
        return $notes;
    }

    public function getBlocNotas() {
        $id = session()->get('user')->id;
        $notes = $this->getNotes($id);
        return view('home.notes', compact('notes'));
    }

    public function setNota() {
        $data = Input::all();
        $errors = Validator::make($data,[
            'nota' => 'required'
        ],[
            'nota.required' => 'El titulo no puede estar vacio'
        ]);

        if ($errors->fails()) {
            return response()->json(array(
                'success' => false,
                'errors' => $errors->getMessageBag()->toArray()
            ), 200);
        }
        $user_id = session()->get('user')->id;
        $note = new notes();
        $note->nota = $data['nota'];
        $note->user_id = $user_id;
        $note->save();
        return response()->json(array(
            'succes' => true
        ),200);
    }

    public function updateNota() {
        $data = Input::all();
        $errors = Validator::make($data,[
            'nota' => 'required'
        ],[
            'nota.required' => 'El titulo no puede estar vacio'
        ]);

        if ($errors->fails()) {
            return response()->json(array(
                'success' => false,
                'errors' => $errors->getMessageBag()->toArray()
            ), 200);
        }
        $id = $data['id'];
        $nota = notes::find($id);
        $nota->nota = $data['nota'];
        $nota->update();
        return response()->json(array(
            'succes' => true
        ),200);
    }

    public function deleteNota(Request $request) {
        notes::where('id',$request->id)->delete();
    }
}
