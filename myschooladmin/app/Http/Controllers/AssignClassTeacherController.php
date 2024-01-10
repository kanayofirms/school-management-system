<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssignClassTeacherController extends Controller
{
    public function list(Request $request)
    {
        $data['header_title'] = "Assign Class Teacher";
        return view('admin.assign_class_teacher.list', $data); 
    }
}
