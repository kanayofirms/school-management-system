<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function myCalendar()
    {
        $data['header_title'] = "My Calendar";
        return view('student.my_calendar', $data);
    }
}
