<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;

class ClassTimetableController extends Controller
{
    public function list()
    {
        $data['getClass'] = ClassModel::getClass();
        $data['header_title'] = "Class Timetable List";
        return view('admin.class_timetable.list', $data); 
    }

    public function get_subject(Request $request)
    {
        $getSubject = ClassSubjectModel::mySubject($request-class_id);
        $html = "<option value=''>Select</option>";
        foreach($getSubject as $value)
        {
            $html = "<option value='".$value->subject_id."'>".$value->subject->name."</option>";
        }

        $json['html'] = $html;
        echo json_encode($json);
    }
}
