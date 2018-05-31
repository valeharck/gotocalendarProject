<?php

namespace App\Http\Controllers;

use App\recordatorios;
use App\tasks;
use Validator;
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
        $errors = Validator::make($data,[
            'titulo' => 'required'
        ],[
            'titulo.required' => 'El titulo no puede estar vacio'
        ]);

        if ($errors->fails()) {
            return response()->json(array(
                'success' => false,
                'errors' => $errors->getMessageBag()->toArray()
            ), 200);
        }
        $user_id = session()->get('user')->id;
        $recordatorio = new recordatorios();
        $recordatorio ->titulo = $data['titulo'];
        $recordatorio ->user_id = $user_id;
        $recordatorio->save();
        return response()->json(array(
            'succes' => true
        ),200);
    }

    public function updateRecord(){
        $data = Input::all();
        $errors = Validator::make($data,[
            'titulo' => 'required'
        ],[
            'titulo.required' => 'El titulo no puede estar vacio'
        ]);

        if ($errors->fails()) {
            return response()->json(array(
                'success' => false,
                'errors' => $errors->getMessageBag()->toArray()
            ), 200);
        }
        $id = $data['id'];
        $recordatorios = recordatorios::find($id);
        $recordatorios->titulo = $data['titulo'];
        $recordatorios->update();
        return response()->json(array(
            'succes' => true
        ),200);
    }

    public function deleteRecord(Request $request) {
        recordatorios::where('id',$request->id)->delete();
    }

    public function setTask(){
        $data = Input::all();
        $errors = Validator::make($data,[
            'body' => 'required'
        ],[
            'body.required' => 'La tarea no puede estar vacio'
        ]);

        if ($errors->fails()) {
            return response()->json(array(
                'success' => false,
                'errors' => $errors->getMessageBag()->toArray()
            ), 200);
        }
        $tarea = new tasks();
        $tarea->body = $data['body'];
        $tarea->recordatorios_id = $data['rec_id'];
        $tarea->save();
        return response()->json(array(
            'succes' => true
        ),200);
    }

    public function deleteTask(Request $request){
        tasks::where('id',$request->id)->delete();
    }
}
