<?php

namespace App\Http\Controllers;

use App\recordatorios;
use App\tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


class RecController extends Controller
{
    public function getRecordatorios(){
        return view('home.recordatorio');
    }

    public function getInfoRecordatorios(){
        $rec = recordatorios::all();
        $array = array();
        foreach ( $rec as $r){
            array_push($array,[
                'id' => $r->id,
                'taitle' => $r->titulo,
                'tasks' => recordatorios::find($r->id)->tasks
            ]);
        }
        return response()->json($array);
    }

    public function getRecordatoriospecific(Request $request){
        $rec = recordatorios::find($request->id);
        return response()->json($rec);
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
        $data = Input::all();
        $id = $data['id'];
        $recordatorios = recordatorios::find($id);
        $recordatorios->titulo = $data['titulo'];
        $recordatorios->update();
    }

    public function deleteRecord(Request $request) {
        recordatorios::where('id',$request->id)->delete();
    }

    public function setTask(){
        $data = Input::all();
        $tarea = new tasks();
        $tarea->body = $data['body'];
        $tarea->recordatorios_id = $data['rec_id'];
        $tarea->save();
    }

    public function deleteTask(Request $request){
        tasks::where('id',$request->id)->delete();
    }
}
