<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\ClassSubjectModel;
use App\Models\HomeworkModel;
use App\Models\AssignClassTeacherModel;
use App\Models\HomeworkSubmitModel;
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

    public function homework_edit($id)
    {
        $getRecord = HomeworkModel::getSingle($id);
        $data['getRecord'] = $getRecord;
        $data['getSubject'] = ClassSubjectModel::mySubject($getRecord->class_id);
        $data['getClass'] = ClassModel::getClass();
        $data['header_title'] = "Edit Homework";
        return view('admin.homework.edit', $data);
    }

    public function homework_update(Request $request, $id)
    {
        $homework = HomeworkModel::getSingle($id);
        $homework->class_id = trim($request->class_id);
        $homework->subject_id = trim($request->subject_id);
        $homework->homework_date = trim($request->homework_date);
        $homework->submission_date = trim($request->submission_date);
        $homework->description = trim($request->description);

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

        return redirect('admin/homework/homework')->with('success', "Homework 
        successfully updated");
    }

    public function homework_delete($id)
    {
        $homework = HomeworkModel::getSingle($id);
        $homework->is_delete = 1;
        $homework->save();

        return redirect()->back()->with('success', "Homework successfully deleted");
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

    // teacher side code

    public function homework_teacher()
    {
        $class_ids = array();
        $getClass = AssignClassTeacherModel::getMyClassSubjectGroup(Auth::user()->id);
        foreach($getClass as $class)
        {
            $class_ids[] = $class->class_id;
        }
        $data['getRecord'] = HomeworkModel::getRecordTeacher($class_ids);
        $data['header_title'] = "Homework";
        return view('teacher.homework.list', $data);
    }

    public function homework_teacher_add()
    {
        $data['getClass'] = AssignClassTeacherModel::getMyClassSubjectGroup(Auth::user()->id); 
        $data['header_title'] = "Add New Homework";
        return view('teacher.homework.add', $data);
    }

    public function homework_teacher_insert(Request $request)
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

        return redirect('teacher/homework/homework')->with('success', "Homework successfully created");
    }

    public function homework_teacher_edit($id)
    {
        $getRecord = HomeworkModel::getSingle($id);
        $data['getRecord'] = $getRecord;
        $data['getSubject'] = ClassSubjectModel::mySubject($getRecord->class_id);
        $data['getClass'] = AssignClassTeacherModel::getMyClassSubjectGroup(Auth::user()->id); 
        $data['header_title'] = "Edit Homework";
        return view('teacher.homework.edit', $data); 
    }

    public function homework_teacher_update($id, Request $request)
    {
        $homework = HomeworkModel::getSingle($id);
        $homework->class_id = trim($request->class_id);
        $homework->subject_id = trim($request->subject_id);
        $homework->homework_date = trim($request->homework_date);
        $homework->submission_date = trim($request->submission_date);
        $homework->description = trim($request->description);

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

        return redirect('teacher/homework/homework')->with('success', "Homework 
        successfully updated");
    }

    // student side code

    public function my_homework()
    {
        $data['getRecord'] = HomeworkModel::getRecordStudent(Auth::user()->class_id, Auth::user()->id);
        $data['header_title'] = "My Homework";
        return view('student.homework.list', $data);
    }

    public function submit_homework($homework_id)
    {
        $data['getRecord'] = HomeworkModel::getSingle($homework_id);
        $data['header_title'] = "Submit My Homework";
        return view('student.homework.submit', $data);
    }

    public function submit_homework_insert($homework_id, Request $request)
    {
        $homework = new HomeworkSubmitModel;
        $homework->homework_id = $homework_id;
        $homework->student_id = Auth::user()->id;
        $homework->description = trim($request->description);

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

        return redirect('teacher/homework/homework')->with('success', "Homework 
        successfully submitted");
    }
}
