<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\User;

class AssignClassTeacherController extends Controller
{
    public function list(Request $request)
    {
        $data['header_title'] = "Assign Class Teacher";
        return view('admin.assign_class_teacher.list', $data); 
    }

    public function add(Request $request)
    {
        $data['getClass'] = ClassModel::getClass();
        $data['getTeacher'] = User::getTeacherClass();
        $data['header_title'] = "Add Assign Class Teacher";
        return view('admin.assign_class_teacher.add', $data);
    }
}
