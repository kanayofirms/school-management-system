<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ClassModel;
use Illuminate\Support\Str;
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
        
        request()->validate([
            'email' => 'required|email|unique:users',
            'genotype' => 'max:10',
            'blood_group' => 'max:10',
            'religion' => 'max:50',
            'admission_number' => 'max:50',
            'roll_number' => 'max:50',
            'address' => 'max:255',
            'country' => 'max:50',
            'state' => 'max:50',
            'local_govt_area' => 'max:50',
            'hometown' => 'max:50',        
        ]);

        $student = new User;
        $student->name = trim($request->name);
        $student->middle_name = trim($request->middle_name);
        $student->last_name = trim($request->last_name);
        $student->admission_number = trim($request->admission_number);
        $student->roll_number = trim($request->roll_number);
        $student->class_id = trim($request->class_id);
        $student->gender = trim($request->gender);
        
        if(!empty($request->date_of_birth))
        {
            $student->date_of_birth = trim($request->date_of_birth);
        }

        if(!empty($request->file('profile_pic')))
        {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $student->profile_pic = $filename;
        }
        $student->address = trim($request->address);
        $student->country = trim($request->country);
        $student->state = trim($request->state);
        $student->local_govt_area = trim($request->local_govt_area);
        $student->hometown = trim($request->hometown);
        $student->religion = trim($request->religion);

        if(!empty($request->admission_date))
        {
            $student->admission_date = trim($request->admission_date);
        }
        
        $student->blood_group = trim($request->blood_group);
        $student->genotype = trim($request->genotype);
        $student->disability = trim($request->disability);
        $student->status = trim($request->status);
        $student->email = trim($request->email);
        $student->password = Hash::make($request->password);
        $student->user_type = 3;
        $student->save();

        return redirect('admin/student/list')->with('success', "Student Successfully Created");

    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['getClass'] = ClassModel::getClass();
            $data['header_title'] = "Edit Student";
            return view('admin.student.edit', $data);
        }
        else
        {
            abort(404);
        }
    }

    public function update($id, Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id,
            'genotype' => 'max:10',
            'blood_group' => 'max:10',
            'religion' => 'max:50',
            'admission_number' => 'max:50',
            'roll_number' => 'max:50',
            'address' => 'max:255',
            'country' => 'max:50',
            'state' => 'max:50',
            'local_govt_area' => 'max:50',
            'hometown' => 'max:50',        
        ]);

        $student = User::getSingle($id);
        $student->name = trim($request->name);
        $student->middle_name = trim($request->middle_name);
        $student->last_name = trim($request->last_name);
        $student->admission_number = trim($request->admission_number);
        $student->roll_number = trim($request->roll_number);
        $student->class_id = trim($request->class_id);
        $student->gender = trim($request->gender);
        
        if(!empty($request->date_of_birth))
        {
            $student->date_of_birth = trim($request->date_of_birth);
        }

        if(!empty($request->file('profile_pic')))
        {
            if(!empty($student->getProfile()))
            {
                unlink('upload/profile/'.$student->profile_pic);
            }
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $student->profile_pic = $filename;
        }
        $student->address = trim($request->address);
        $student->country = trim($request->country);
        $student->state = trim($request->state);
        $student->local_govt_area = trim($request->local_govt_area);
        $student->hometown = trim($request->hometown);
        $student->religion = trim($request->religion);

        if(!empty($request->admission_date))
        {
            $student->admission_date = trim($request->admission_date);
        }
        
        $student->blood_group = trim($request->blood_group);
        $student->genotype = trim($request->genotype);
        $student->disability = trim($request->disability);
        $student->status = trim($request->status);
        $student->email = trim($request->email);
        if(!empty($request->password))
        {
            $student->password = Hash::make($request->password);   
        }
        

        $student->save();

        return redirect('admin/student/list')->with('success', "Student Successfully Updated");

    }

    public function delete($id)
    {
        $getRecord = User::getSingle($id);
        if(!empty($getRecord))
        {
            $getRecord->is_delete = 1;
            $getRecord->save();

            return redirect()->back()->with('success', "Student Successfully deleted");
        }
        else
        {
            abort(404);
        }
    }
}
