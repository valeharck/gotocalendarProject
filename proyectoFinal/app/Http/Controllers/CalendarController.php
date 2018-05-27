<?php

namespace App\Http\Controllers;

use App\eventos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

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
        $user_id = session()->get('user')->id;
        $event = new eventos();
        $event->title = $data['title'];
        $event->allDay = $data['allDay'];
        $event->fecha_ini = $data['fecha_ini'];
        $event->fecha_fin = $data['fecha_fin'];
        $event->user_id = $user_id;
        $event->save();
    }

    public function deleteEvent(Request $request) {
        eventos::where('id',$request->id)->delete();
    }

    public function updateEvent(){
        $data = Input::all();
        $id = $data['id'];
        $event = eventos::find($id);
        $event->title = $data['title'];
        $event->fecha_ini = $data['start'];
        $event->fecha_fin = $data['end'];
        $event->update();
    }
}
