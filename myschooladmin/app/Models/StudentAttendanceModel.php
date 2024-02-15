<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAttendanceModel extends Model
{
    use HasFactory;

    protected $table = 'student_attendance';

    static public function CheckAlreadyAttendance($student_id, $class_id, $attendance_date)
    {
        return StudentAttendanceModel::where('student_id', '=', $student_id)->where('class_id', '=', $class_id)->
            where('attendance_date', '=', $attendance_date)->first();

    }

    static public function getRecord()
    {
        return StudentAttendanceModel::select('student_attendance.*', 'class.name as class_name', 'student.name as student_name', 
            'student.middle_name as student_middle_name', 'student.last_name as student_last_name',
            'createdby.name as created_name')
            ->join('class', 'class.id', '=', 'student_attendance.class_id')
            ->join('users as student', 'student.id', '=', 'student_attendance.student_id')
            ->join('users as createdby', 'createdby.id', '=', 'student_attendance.created_by')
            ->orderBy('student_attendance.id', 'desc')
            ->paginate(50);
    }
}
