<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassSubjectModel;
use App\Models\WeekModel;
use App\Models\ClassSubjectTimetableModel;
use Auth;


class CalendarController extends Controller
{
    public function myCalendar()
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
                $dataW['fullcalendar_day'] = $valueW->fullcalendar_day;

                $ClassSubject = ClassSubjectTimetableModel::getRecordClassSubject($value->class_id, $value
                ->subject_id, $valueW->id);

                if(!empty($ClassSubject))
                {
                    $dataW['start_time'] = $ClassSubject->start_time;
                    $dataW['end_time'] = $ClassSubject->end_time;
                    $dataW['class_room'] = $ClassSubject->class_room;
                    $week[] =   $dataW;
                }  
            }
            $dataS['week'] = $week;
            $result[] = $dataS;
        }

        // dd($result);
       $data['getMyTimetable'] = $result;

        $data['header_title'] = "My Calendar";
        return view('student.my_calendar', $data);
    }
}
