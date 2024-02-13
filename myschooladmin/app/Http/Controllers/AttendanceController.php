<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;


class AttendanceController extends Controller
{
    public function attendance_student()
    {
        $data['getClass'] = ClassModel::getClass();
        $data['header_title'] = "Student Attendance";
        return view('admin.attendance.student', $data);
    }
}
