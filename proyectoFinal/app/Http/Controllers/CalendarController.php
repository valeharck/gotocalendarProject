<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function getCalendar() {
        return view('home.calendar');
    }
}
