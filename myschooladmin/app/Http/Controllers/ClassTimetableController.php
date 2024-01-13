<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassTimetableController extends Controller
{
    public function list()
    {
        $data['header_title'] = "Class Timetable List";
        return view('admin.class_timetable.list', $data); 
    }
}
