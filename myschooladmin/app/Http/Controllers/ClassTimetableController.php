<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ClassModel;
use App\Models\SubjectModel;
use App\Models\WeekModel;
use App\Models\ClassSubjectModel;
use App\Models\ClassSubjectTimetableModel;
use Auth;


class ClassTimetableController extends Controller
{
    public function list(Request $request)
    {
        $data['getClass'] = ClassModel::getClass();
        if(!empty($request->class_id))
        {
            $data['getSubject'] = ClassSubjectModel::mySubject($request->class_id); 
        }

        $getWeek = WeekModel::getRecord();
        $week = array();

        foreach($getWeek as $value)
        {
            $dataW = array();
            $dataW['week_id'] = $value->id;
            $dataW['week_name'] = $value->name;


            if(!empty($request->class_id) && !empty($request->subject_id))
            {
                $ClassSubject = ClassSubjectTimetableModel::getRecordClassSubject($request->class_id, $request
                                ->subject_id, $value->id);

                if(!empty($ClassSubject))
                {
                    $dataW['start_time'] = $ClassSubject->start_time;
                    $dataW['end_time'] = $ClassSubject->end_time;
                    $dataW['class_room'] = $ClassSubject->class_room;

                }
                else
                {
                    $dataW['start_time'] = '';
                    $dataW['end_time'] = '';
                    $dataW['class_room'] = '';
                }
            }
            else
            {
                    $dataW['start_time'] = '';
                    $dataW['end_time'] = '';
                    $dataW['class_room'] = '';
            }

            $week[] = $dataW;
        }

        $data['week'] = $week;

        $data['header_title'] = "Class Timetable";
        return view('admin.class_timetable.list', $data); 
    }

    public function get_subject(Request $request)
    {
        $getSubject = ClassSubjectModel::mySubject($request->class_id);

        $html = "<option value=''>Select</option>";

        foreach($getSubject as $value)
        {
            $html .= "<option value='".$value->subject_id."'>".$value->subject_name."</option>";
        }

        $json['html'] = $html;
        echo json_encode($json);
    }

    public function insert_update(Request $request)
    {
        ClassSubjectTimetableModel::where('class_id', '=', $request->class_id)->where('subject_id', '=', $request->subject_id)->delete();

        foreach($request->timetable as $timetable)
        {
            if(!empty($timetable['week_id']) && !empty($timetable['start_time']) && !empty($timetable['end_time']) && !empty($timetable['class_room']))
            {
                $save = new ClassSubjectTimetableModel;
                $save->class_id = $request->class_id;
                $save->subject_id = $request->subject_id;
                $save->week_id = $timetable['week_id'];
                $save->end_time = $timetable['end_time'];
                $save->start_time = $timetable['start_time'];
                $save->class_room = $timetable['class_room'];
                $save->save();

            }
        }

        return redirect()->back()->with('success', "Class Timetable Successfully Saved");
    }

    // student side code

    public function myTimetable()
    {
        $result = array();
        $getRecord = ClassSubjectModel::mySubject(Auth::user()->class_id);
        foreach($getRecord as $value)
        {
            $dataS['name'] = $value->subject_name;

            $getWeek = WeekModel::getRecord();
            $week = array();
            foreach($getWeek as $valueW)
            {
                $dataW = array();
                $dataW['week_name'] = $valueW->name;

                $ClassSubject = ClassSubjectTimetableModel::getRecordClassSubject($value->class_id, $value
                ->subject_id, $valueW->id);

                if(!empty($ClassSubject))
                {
                    $dataW['start_time'] = $ClassSubject->start_time;
                    $dataW['end_time'] = $ClassSubject->end_time;
                    $dataW['class_room'] = $ClassSubject->class_room;

                }
                else
                {
                    $dataW['start_time'] = '';
                    $dataW['end_time'] = '';
                    $dataW['class_room'] ='';
                }
                $week[] =   $dataW;
            }
            $dataS['week'] = $week;
            $result[] = $dataS;
        }
        $data['getRecord'] = $result;

        $data['header_title'] = "My Timetable";
        return view('student.my_timetable', $data);
    }

    // teacher side code

    public function myTimetableTeacher($class_id, $subject_id, $student_id)
    {
        $data['getClass'] = ClassModel::getSingle($class_id);
        $data['getSubject'] = SubjectModel::getSingle($subject_id);

        $getWeek = WeekModel::getRecord();
        $week = array();
        foreach($getWeek as $valueW)
        {
            $dataW = array();
            $dataW['week_name'] = $valueW->name;

            $ClassSubject = ClassSubjectTimetableModel::getRecordClassSubject($class_id, $subject_id, $valueW->id);

            if(!empty($ClassSubject))
            {
                $dataW['start_time'] = $ClassSubject->start_time;
                $dataW['end_time'] = $ClassSubject->end_time;
                $dataW['class_room'] = $ClassSubject->class_room;

            }
            else
            {
                $dataW['start_time'] = '';
                $dataW['end_time'] = '';
                $dataW['class_room'] ='';
            }
                $result[] =   $dataW;
            }
        
        $data['getRecord'] = $result;

        $data['header_title'] = "My Timetable";
        return view('teacher.my_timetable', $data);
    }

    // parent side code

    public function myTimetableParent($class_id, $subject_id, $student_id)
    {
        $data['getClass'] = ClassModel::getSingle($class_id);
        $data['getSubject'] = SubjectModel::getSingle($subject_id);
        $data['getStudent'] = User::getSingle($student_id);


        $getWeek = WeekModel::getRecord();
        $week = array();
        foreach($getWeek as $valueW)
        {
            $dataW = array();
            $dataW['week_name'] = $valueW->name;

            $ClassSubject = ClassSubjectTimetableModel::getRecordClassSubject($class_id, $subject_id, $valueW->id);

            if(!empty($ClassSubject))
            {
                $dataW['start_time'] = $ClassSubject->start_time;
                $dataW['end_time'] = $ClassSubject->end_time;
                $dataW['class_room'] = $ClassSubject->class_room;

            }
            else
            {
                $dataW['start_time'] = '';
                $dataW['end_time'] = '';
                $dataW['class_room'] ='';
            }
                $result[] =   $dataW;
            }
        
        $data['getRecord'] = $result;

        $data['header_title'] = "My Timetable";
        return view('parent.my_timetable', $data);
    }
}
