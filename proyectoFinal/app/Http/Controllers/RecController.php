<?php

namespace App\Http\Controllers;

use App\recordatorios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


class RecController extends Controller
{
    public function getRecordatorios(){
        return view('home.recordatorio');
    }

    public function setRecordatorio(){
        $data = Input::all();
        $user_id = session()->get('user')->id;
        $recordatorio = new recordatorios();
        $recordatorio ->titulo = $data['titulo'];
        $recordatorio ->user_id = $user_id;
        $recordatorio->save();
    }

    public function updateRecord(){

    }

    public function deleteRecord(Request $request) {
        recordatorios::where('id',$request->id)->delete();
    }
}
