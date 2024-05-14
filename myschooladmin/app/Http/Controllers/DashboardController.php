<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\ExamModel;
use App\Models\ClassModel;
use App\Models\StudentAddFeesModel;
use App\Models\SubjectModel;
use App\Models\AssignClassTeacherModel;


class DashboardController extends Controller
{
    public function dashboard()
    {
        $data['header_title'] = 'Dashboard';
        if(Auth::user()->user_type == 1)
        {
            $data['getTotalFees'] = StudentAddFeesModel::getTotalFees();
            $data['getTotalTodayFees'] = StudentAddFeesModel::getTotalTodayFees();
            $data['TotalAdmin'] = User::getTotalUser(1);
            $data['TotalTeacher'] = User::getTotalUser(2);
            $data['TotalStudent'] = User::getTotalUser(3);
            $data['TotalParent'] = User::getTotalUser(4);

            $data['TotalExam'] = ExamModel::getTotalExam();
            $data['TotalClass'] = ClassModel::getTotalClass();
            $data['TotalSubject'] = SubjectModel::getTotalSubject();
            $data['TotalUsers'] = $data['TotalAdmin'] + $data['TotalTeacher'] + $data['TotalStudent'] + $data['TotalParent'];

            return view('admin.dashboard', $data);
        }
        else if(Auth::user()->user_type == 2)
        {
            $userId = Auth::user()->id;
            $data['TotalStudent'] = User::getTeacherStudentCount($userId);
            $data['TotalClass'] = AssignClassTeacherModel::getMyClassSubjectGroupCount($userId);
            $data['TotalSubject'] = AssignClassTeacherModel::getMyClassSubjectCount($userId);

            return view('teacher.dashboard', $data);
        }
        else if(Auth::user()->user_type == 3)
        {
            return view('student.dashboard', $data);
        }
        else if(Auth::user()->user_type == 4)
        {
            return view('parent.dashboard', $data);
        }
        
    }
}
