<?php

namespace App\Http\Controllers;

use App\eventos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;

class CalendarController extends Controller
{
    public function getCalendar() {
        return view('home.calendar');
    }

    public function getCalendarInfo(){
        $eventos = eventos::all();
        foreach ($eventos as $event) {
            $array[] = array(
                'id' => $event->id,
                'title' => $event->title,
                'start' => $event->fecha_ini,
                'end' => $event->fecha_fin
            );
        }
        return response()->json($array);
    }

    public function addEvent(){
        $data = Input::all();
        $errors = Validator::make($data,[
            'title' => 'required',
            'fecha_ini' => 'required'
        ],[
            'title.required' => 'El titulo no puede estar vacio',
            'fecha_ini.required' => 'La fecha inicial no puede estar vacia'
        ]);

        if ($errors->fails()) {
            return response()->json(array(
                'success' => false,
                'errors' => $errors->getMessageBag()->toArray()
            ), 200);
        }
        $user_id = session()->get('user')->id;
        $event = new eventos();
        $event->title = $data['title'];
        $event->allDay = $data['allDay'];
        $event->fecha_ini = $data['fecha_ini'];
        $event->fecha_fin = $data['fecha_fin'];
        $event->user_id = $user_id;
        $event->save();
        return response()->json(array(
            'succes' => true
        ),200);
    }

    public function deleteEvent(Request $request) {
        eventos::where('id',$request->id)->delete();
    }

    public function updateEvent(){
        $data = Input::all();
        $errors = Validator::make($data,[
            'title' => 'required',
            'start' => 'required'
        ],[
            'title.required' => 'El titulo no puede estar vacio',
            'start.required' => 'La fecha inicial no puede estar vacia'
        ]);

        if ($errors->fails()) {
            return response()->json(array(
                'success' => false,
                'errors' => $errors->getMessageBag()->toArray()
            ), 200);
        }
        $id = $data['id'];
        $event = eventos::find($id);
        $event->title = $data['title'];
        $event->fecha_ini = $data['start'];
        $event->fecha_fin = $data['end'];
        $event->update();
        return response()->json(array(
            'succes' => true
        ),200);
    }
}
