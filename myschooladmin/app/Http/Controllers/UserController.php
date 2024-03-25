<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SettingModel;
use Illuminate\Support\Str;
use Auth;
use Hash;

class UserController extends Controller
{
    public function Setting()
    {
        $data['getRecord'] = SettingModel::getSingle();
        $data['header_title'] = "Setting";
        return view('admin.setting', $data);
    }

    public function updateSetting(Request $request)
    {
        $setting = SettingModel::getSingle();
        $setting->paystack_email = trim($request->paystack_email);
        $setting->save();

        return redirect()->back()->with('success', "Setting Successfully Updated");
    }

    public function myAccount()
    {
        $data['getRecord'] = User::getSingle(Auth::user()->id);
        $data['header_title'] = "My Account";
        if(Auth::user()->user_type == 1)
        {
            return view('admin.my_account', $data);
        }
        else if(Auth::user()->user_type == 2)
        {
            return view('teacher.my_account', $data);
        }
        else if(Auth::user()->user_type == 3)
        {
            return view('student.my_account', $data);
        }
        else if(Auth::user()->user_type == 4)
        {
            return view('parent.my_account', $data);
        }
        
    }

    public function updateMyAccountAdmin(Request $request)
    {
        $id = Auth::user()->id;
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id 
        ]);

        $admin = User::getSingle($id);
        $admin->name = trim($request->name);
        $admin->email = trim($request->email);
        $admin->save();

        return redirect()->back()->with('success', "Account Successfully Updated");
    }

    public function updateMyAccountTeacher(Request $request)
    {
        $id = Auth::user()->id;
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id,
            'mobile_number' => 'max:14|min:11',
            'marital_status' => 'max:50',
        ]);

        $teacher = User::getSingle($id);
        $teacher->name = trim($request->name);
        $teacher->last_name = trim($request->last_name);
        $teacher->gender = trim($request->gender);

        if(!empty($request->date_of_birth))
        {
            $teacher->date_of_birth = trim($request->date_of_birth);
        }
    
        if(!empty($request->file('profile_pic')))
        {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $teacher->profile_pic = $filename;
        }

        $teacher->marital_status = trim($request->marital_status);
        $teacher->address = trim($request->address);
        $teacher->mobile_number = trim($request->mobile_number);
        $teacher->qualification = trim($request->qualification);
        
        $teacher->email = trim($request->email);
        
        
        $teacher->save();

        return redirect()->back()->with('success', "Account Successfully Updated");
    }

    public function updateMyAccountStudent(Request $request)
    {
        $id = Auth::user()->id;
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id,
            'genotype' => 'max:10',
            'blood_group' => 'max:10',
            'religion' => 'max:50',
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
        $student->blood_group = trim($request->blood_group);
        $student->genotype = trim($request->genotype);
        $student->disability = trim($request->disability);
        $student->email = trim($request->email);

        $student->save();

        return redirect()->back()->with('success', "Account Successfully Updated");
    }

    public function updateMyAccountParent(Request $request)
    {
        $id = Auth::user()->id;
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id,
            'mobile_number' => 'max:14|min:11',
            'address' => 'max:255',
            'occupation' => 'max:255',         
        ]);

        $parent = User::getSingle($id);

        $parent->name = trim($request->name);
        $parent->last_name = trim($request->last_name);
        $parent->gender = trim($request->gender);
        $parent->occupation = trim($request->occupation);
        
        if(!empty($request->file('profile_pic')))
        {
            if(!empty($student->getProfile()))
            {
                unlink('upload/profile/'.$parent->profile_pic);
            }

            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $parent->profile_pic = $filename;
        }
        $parent->address = trim($request->address);
        $parent->mobile_number = trim($request->mobile_number);
        $parent->email = trim($request->email);
        
        $parent->save();

        return redirect()->back()->with('success', "Account Successfully Updated");
    }

    public function change_password()
    {
        $data['header_title'] = "Change Password";
        return view('profile.change_password', $data);
    }

    public function update_change_password(Request $request)
    {
        $user = User::getSingle(Auth::user()->id);
        if(Hash::check($request->old_password, $user->password))
        {
            $user->password = Hash::make($request->new_password);
            $user->save();

            return redirect()->back()->with('success', "Password successfully updated");
        }
        else
        {
            return redirect()->back()->with('error', "Old Password is not correct");
        }
    }
}
