<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ClassModel;
use Hash;
use Auth;

class StudentController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getStudent();
        $data['header_title'] = "Student List";
        return view('admin.student.list', $data);
    }

    public function add()
    {
        $data['getClass'] = ClassModel::getClass();
        $data['header_title'] = "Add New Student";
        return view('admin.student.add', $data);
    }

    public function insert(Request $request)
    {

        $student = new User;
        $student->name = trim($request->last_name);
        $student->middle_name = trim($request->middle_name);
        $student->last_name = trim($request->last_name);
        $student->admission_number = trim($request->admission_number);
        $student->roll_number = trim($request->roll_number);
        
        if(!empty($request->date_of_birth))
        {
            $student->date_of_birth = trim($request->date_of_birth);
        }
        $student->address = trim($request->address);
        $student->country = trim($request->country);
        $student->state = trim($request->state);
        $student->local_govt_area = trim($request->local_govt_area);
        $student->hometown = trim($request->hometown);
        $student->religion = trim($request->religion);
        $student->admission_date = trim($request->admission_date);
        $student->blood_group = trim($request->blood_group);
        $student->genotype = trim($request->genotype);
        $student->disability = trim($request->disability);
        $student->status = trim($request->status);
        $student->email = trim($request->email);
        $student->password = Hash::make($request->password);
        $student->save();

        return redirect('admin/student/list')->with('success', "Student Successfully Created");

    }
}
