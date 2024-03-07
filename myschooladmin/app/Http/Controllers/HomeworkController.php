<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\ClassSubjectModel;
use App\Models\HomeworkModel;
use Illuminate\Support\Str;
use Auth;



class HomeworkController extends Controller
{
    public function homework()
    {
        $data['getRecord'] = HomeworkModel::getRecord();
        $data['header_title'] = "Homework";
        return view('admin.homework.list', $data);
    }

    public function homework_add()
    {
        $data['getClass'] = ClassModel::getClass();
        $data['header_title'] = "Add New Homework";
        return view('admin.homework.add', $data);
    }

    public function homework_insert(Request $request)
    {
        $homework = new HomeworkModel;
        $homework->class_id = trim($request->class_id);
        $homework->subject_id = trim($request->subject_id);
        $homework->homework_date = trim($request->homework_date);
        $homework->submission_date = trim($request->submission_date);
        $homework->description = trim($request->description);
        $homework->created_by = Auth::user()->id;

        if(!empty($request->file('document_file')))
        {
            $ext = $request->file('document_file')->getClientOriginalExtension();
            $file = $request->file('document_file');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/homework/', $filename);

            $homework->document_file = $filename;
        }

        $homework->save();

        return redirect('admin/homework/homework')->with('success', "Homework successfully created");

    }

    public function ajax_get_subject(Request $request)
    {
        $class_id = $request->class_id;
        $getSubject = ClassSubjectModel::mySubject($class_id);
        $html = '';
        $html .= '<option value="">Select Subject</option>';
        foreach ($getSubject as $value)
        {
            $html .= '<option value="'.$value->subject_id.'">'.$value->subject_name.'</option>';
        }

        $json['success'] = $html;
        echo json_encode($json);
    }
}
