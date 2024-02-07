<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\ExamModel;
use App\Models\ClassModel;
use App\Models\ClassSubjectModel;
use App\Models\ExamScheduleModel;
use App\Models\MarksRegisterModel;
use App\Models\AssignClassTeacherModel;
use App\Models\User;


class ExaminationsController extends Controller
{
    public function exam_list()
    {
        $data['getRecord'] = ExamModel::getRecord();
        $data['header_title'] = "Exam List";
        return view('admin.examinations.exam.list', $data);
    }

    public function exam_add()
    {
        $data['header_title'] = "Add New Exam";
        return view('admin.examinations.exam.add', $data);
    }

    public function exam_insert(Request $request)
    {
        $exam = new ExamModel;
        $exam->name = trim($request->name);
        $exam->note = trim($request->note);
        $exam->created_by = Auth::user()->id;
        $exam->save();

        return redirect('admin/examinations/exam/list')->with('success', "Exam successfully created");
    }

    public function exam_edit($id)
    {
        $data['getRecord'] = ExamModel::getSingle($id);
        if (!empty($data['getRecord'])) {
            $data['header_title'] = "Edit Exam";
            return view('admin.examinations.exam.edit', $data);
        } else {
            abort(404);
        }
    }

    public function exam_update($id, Request $request)
    {
        $exam = ExamModel::getSingle($id);
        $exam->name = trim($request->name);
        $exam->note = trim($request->note);
        $exam->save();

        return redirect('admin/examinations/exam/list')->with('success', "Exam successfully updated");
    }

    public function exam_delete($id)
    {
        $getRecord = ExamModel::getSingle($id);
        if (!empty($getRecord)) {
            $getRecord->is_delete = 1;
            $getRecord->save();

            return redirect()->back()->with('success', "Exam successfully deleted");
        } else {
            abort(404);
        }
    }

    public function exam_schedule(Request $request)
    {
        $data['getClass'] = ClassModel::getClass();
        $data['getExam'] = ExamModel::getExam();

        $result = array();
        if (!empty($request->get('exam_id')) && !empty($request->get('class_id'))) {
            $getSubject = ClassSubjectModel::mySubject($request->get('class_id'));
            foreach ($getSubject as $value) {
                $dataS = array();
                $dataS['subject_id'] = $value->subject_id;
                $dataS['class_id'] = $value->class_id;
                $dataS['subject_name'] = $value->subject_name;
                $dataS['subject_type'] = $value->subject_type;

                $ExamSchedule = ExamScheduleModel::getRecordSingle($request->get('exam_id'), $request->get('class_id'), $value->subject_id);
                if (!empty($ExamSchedule)) {
                    $dataS['exam_date'] = $ExamSchedule->exam_date;
                    $dataS['start_time'] = $ExamSchedule->start_time;
                    $dataS['end_time'] = $ExamSchedule->end_time;
                    $dataS['class_room'] = $ExamSchedule->class_room;
                    $dataS['full_mark'] = $ExamSchedule->full_mark;
                    $dataS['passing_mark'] = $ExamSchedule->passing_mark;
                } else {
                    $dataS['exam_date'] = '';
                    $dataS['start_time'] = '';
                    $dataS['end_time'] = '';
                    $dataS['class_room'] = '';
                    $dataS['full_mark'] = '';
                    $dataS['passing_mark'] = '';
                }
                $result[] = $dataS;
            }
        }

        $data['getRecord'] = $result;

        $data['header_title'] = "Exam Schedule";
        return view('admin.examinations.exam_schedule', $data);
    }

    public function exam_schedule_insert(Request $request)
    {
        ExamScheduleModel::deleteRecord($request->exam_id, $request->class_id);

        if (!empty($request->schedule)) {
            foreach ($request->schedule as $schedule) {
                if (
                    !empty($schedule['subject_id']) && !empty($schedule['exam_date']) && !empty($schedule['start_time']) &&
                    !empty($schedule['end_time']) && !empty($schedule['class_room']) && !empty($schedule['full_mark']) &&
                    !empty($schedule['passing_mark'])
                ) {
                    $exam = new ExamScheduleModel;
                    $exam->exam_id = $request->exam_id;
                    $exam->class_id = $request->class_id;
                    $exam->subject_id = $schedule['subject_id'];
                    $exam->exam_date = $schedule['exam_date'];
                    $exam->start_time = $schedule['start_time'];
                    $exam->end_time = $schedule['end_time'];
                    $exam->class_room = $schedule['class_room'];
                    $exam->full_mark = $schedule['full_mark'];
                    $exam->passing_mark = $schedule['passing_mark'];
                    $exam->created_by = Auth::user()->id;
                    $exam->save();
                }
            }
        }

        return redirect()->back()->with('success', "Exam Schedule Successfully Saved");
    }

    public function marks_register(Request $request)
    {
        $data['getClass'] = ClassModel::getClass();
        $data['getExam'] = ExamModel::getExam();

        if (!empty($request->get('exam_id')) && !empty($request->get('class_id'))) {
            $data['getSubject'] = ExamScheduleModel::getSubject($request->get('exam_id'), $request->get('class_id'));
            $data['getStudent'] = User::getStudentClass($request->get('class_id'));
        }

        $data['header_title'] = "Marks Register";
        return view('admin.examinations.marks_register', $data);
    }

    // teacher side code

    public function marks_register_teacher(Request $request)
    {
        
        $data['getClass'] = AssignClassTeacherModel::getMyClassSubjectGroup(Auth::user()->id);
        $data['getExam'] = ExamScheduleModel::getExamTeacher(Auth::user()->id);
        

        if (!empty($request->get('exam_id')) && !empty($request->get('class_id'))) {
            $data['getSubject'] = ExamScheduleModel::getSubject($request->get('exam_id'), $request->get('class_id'));
            $data['getStudent'] = User::getStudentClass($request->get('class_id'));
        }

        $data['header_title'] = "Marks Register";
        return view('teacher.marks_register', $data);
    }

    public function submit_marks_register(Request $request)
    {
        $validation = 0;
        if (!empty($request->mark)) {
            foreach ($request->mark as $mark) {

                $getExamSchedule = ExamScheduleModel::getSingle($mark['id']);
                $full_mark = $getExamSchedule->full_mark;

                $attendance = !empty($mark['attendance']) ? $mark['attendance'] : 0;
                $cat_one = !empty($mark['cat_one']) ? $mark['cat_one'] : 0;
                $cat_two = !empty($mark['cat_two']) ? $mark['cat_two'] : 0;
                $exam = !empty($mark['exam']) ? $mark['exam'] : 0;
                $full_mark = !empty($mark['full_mark']) ? $mark['full_mark'] : 0;
                $passing_mark = !empty($mark['passing_mark']) ? $mark['passing_mark'] : 0;


                $total_mark = $attendance + $cat_one + $cat_two + $exam;
                if ($full_mark >= $total_mark) {

                    $getMark = MarksRegisterModel::CheckAlreadyMark($request->student_id, $request->exam_id, $request->class_id, $mark['subject_id']);
                    if (!empty($getMark)) {
                        $save = $getMark;
                    } else {
                        $save = new MarksRegisterModel;
                        $save->created_by = Auth::user()->id;
                    }

                    $save->student_id = $request->student_id;
                    $save->exam_id = $request->exam_id;
                    $save->class_id = $request->class_id;
                    $save->subject_id = $mark['subject_id'];
                    $save->attendance = $attendance;
                    $save->cat_one = $cat_one;
                    $save->cat_two = $cat_two;
                    $save->exam = $exam;
                    $save->full_mark = $full_mark;
                    $save->passing_mark = $passing_mark;
                    $save->save();
                }
                else
                {
                    $validation = 1;
                }
            }
        }

        if($validation == 0)
        {
            $json['message'] = "Mark Register Successfully Saved";
        }
        else{
            $json['message'] = "Mark Register Successfully Saved. Some Subject Total mark greater than Full mark";
        }
           
        echo json_encode($json);
    }

    public function single_submit_marks_register(Request $request)
    {
        $id = $request->id;
        $getExamSchedule = ExamScheduleModel::getSingle($id);

        $full_mark = $getExamSchedule->full_mark;

        $attendance = !empty($request->attendance) ? $request->attendance : 0;
        $cat_one = !empty($request->cat_one) ? $request->cat_one : 0;
        $cat_two = !empty($request->cat_two) ? $request->cat_two : 0;
        $exam = !empty($request->exam) ? $request->exam : 0;

        // $full_mark = !empty($request->full_mark) ? $request->full_mark : 0;
        // $passing_mark = !empty($request->passing_mark) ? $request->passing_mark : 0;        

        $total_mark = $attendance + $cat_one + $cat_two + $exam;

        if ($full_mark >= $total_mark) {
            $getMark = MarksRegisterModel::CheckAlreadyMark($request->student_id, $request->exam_id, $request->class_id, $request->subject_id);

            if (!empty($getMark)) {
                $save = $getMark;
            } else {
                $save = new MarksRegisterModel;
                $save->created_by = Auth::user()->id;
            }

            $save->student_id = $request->student_id;
            $save->exam_id = $request->exam_id;
            $save->class_id = $request->class_id;
            $save->subject_id = $request->subject_id;
            $save->attendance = $attendance;
            $save->cat_one = $cat_one;
            $save->cat_two = $cat_two;
            $save->exam = $exam;

            $save->full_mark = $getExamSchedule->full_mark;
            $save->passing_mark = $getExamSchedule->passing_mark;

            $save->save();

            $json['message'] = "Mark Register Successfully Saved";
        } else {
            $json['message'] = "Total mark greater than Full mark";
        }


        echo json_encode($json);
    }

    // student side code

    public function myExamTimetable(Request $request)
    {
        $class_id = Auth::user()->class_id;
        $getExam = ExamScheduleModel::getExam($class_id);
        $result = array();
        foreach ($getExam as $value) {
            $dataE = array();
            $dataE['name'] = $value->exam_name;
            $getExamTimetable = ExamScheduleModel::getExamTimetable($value->exam_id, $class_id);
            $resultS = array();
            foreach ($getExamTimetable as $valueS) {
                $dataS = array();
                $dataS['subject_name'] = $valueS->subject_name;
                $dataS['exam_date'] = $valueS->exam_date;
                $dataS['start_time'] = $valueS->start_time;
                $dataS['end_time'] = $valueS->end_time;
                $dataS['class_room'] = $valueS->class_room;
                $dataS['full_mark'] = $valueS->full_mark;
                $dataS['passing_mark'] = $valueS->passing_mark;
                $resultS[] = $dataS;
            }

            $dataE['exam'] = $resultS;
            $result[] = $dataE;
        }

        $data['getRecord'] = $result;

        $data['header_title'] = "My Exam Timetable";
        return view('student.my_exam_timetable', $data);
    }

    // teacher side code

    public function myExamTimetableTeacher()
    {
        $result = array();
        $getClass = AssignClassTeacherModel::getMyClassSubjectGroup(Auth::user()->id);
        foreach ($getClass as $class) {
            $dataC = array();
            $dataC['class_name'] = $class->class_name;

            $getExam = ExamScheduleModel::getExam($class->class_id);
            $examArray = array();
            foreach ($getExam as $exam) {
                $dataE = array();
                $dataE['exam_name'] = $exam->exam_name;

                $getExamTimetable = ExamScheduleModel::getExamTimetable($exam->exam_id, $class->class_id);
                $subjectArray = array();
                foreach ($getExamTimetable as $valueS) {
                    $dataS = array();
                    $dataS['subject_name'] = $valueS->subject_name;
                    $dataS['exam_date'] = $valueS->exam_date;
                    $dataS['start_time'] = $valueS->start_time;
                    $dataS['end_time'] = $valueS->end_time;
                    $dataS['class_room'] = $valueS->class_room;
                    $dataS['full_mark'] = $valueS->full_mark;
                    $dataS['passing_mark'] = $valueS->passing_mark;
                    $subjectArray[] = $dataS;
                }
                $dataE['subject'] = $subjectArray;
                $examArray[] = $dataE;
            }
            $dataC['exam'] = $examArray;

            $result[] = $dataC;
        }

        $data['getRecord'] = $result;

        $data['header_title'] = "My Exam Timetable";
        return view('teacher.my_exam_timetable', $data);
    }

    // parent side code

    public function ParentMyExamTimetable($student_id)
    {
        $getStudent = User::getSingle($student_id);

        $class_id = $getStudent->class_id;
        $getExam = ExamScheduleModel::getExam($class_id);
        $result = array();
        foreach ($getExam as $value) {
            $dataE = array();
            $dataE['name'] = $value->exam_name;
            $getExamTimetable = ExamScheduleModel::getExamTimetable($value->exam_id, $class_id);
            $results = array();
            foreach ($getExamTimetable as $valueS) {
                $dataS = array();
                $dataS['subject_name'] = $valueS->subject_name;
                $dataS['exam_date'] = $valueS->exam_date;
                $dataS['start_time'] = $valueS->start_time;
                $dataS['end_time'] = $valueS->end_time;
                $dataS['class_room'] = $valueS->class_room;
                $dataS['full_mark'] = $valueS->full_mark;
                $dataS['passing_mark'] = $valueS->passing_mark;
                $resultS[] = $dataS;
            }

            $dataE['exam'] = $resultS;
            $result[] = $dataE;
        }

        $data['getRecord'] = $result;
        $data['getStudent'] = $getStudent;
        $data['header_title'] = "Exam Timetable";
        return view('parent.my_exam_timetable', $data);
    }

    public function ParentMyExamResult($student_id)
    {
        $data['getStudent'] = User::getSingle($student_id);

        $result = array();
        $getExam = MarksRegisterModel::getExam($student_id);
        foreach($getExam as $value)
        {
            $dataE = array();
            $dataE['exam_name'] = $value->exam_name;
            $getExamSubject = MarksRegisterModel::getExamSubject($value->exam_id, $student_id);
            $dataSubject = array();
            foreach($getExamSubject as $exam)
            {
                $totalScore = $exam['attendance'] + $exam['cat_one'] + $exam['cat_two'] + $exam['exam'];
                $dataS = array();
                $dataS['subject_name'] = $exam['subject_name'];
                $dataS['attendance'] = $exam['attendance'];
                $dataS['cat_one'] = $exam['cat_one'];
                $dataS['cat_two'] = $exam['cat_two'];
                $dataS['exam'] = $exam['exam'];
                $dataS['totalScore'] = $totalScore;
                $dataS['full_mark'] = $exam['full_mark'];
                $dataS['passing_mark'] = $exam['passing_mark'];
                $dataSubject[] = $dataS;
            }
            $dataE['subject'] = $dataSubject; 
            $result[] = $dataE;

        }
        $data['getRecord'] = $result;
        $data['header_title'] = "My Exam Result";
        return view('parent.my_exam_result', $data);
    }

    // student side code

    public function myExamResult()
    {
        $result = array();
        $getExam = MarksRegisterModel::getExam(Auth::user()->id);
        foreach($getExam as $value)
        {
            $dataE = array();
            $dataE['exam_name'] = $value->exam_name;
            $getExamSubject = MarksRegisterModel::getExamSubject($value->exam_id, Auth::user()->id);
            $dataSubject = array();
            foreach($getExamSubject as $exam)
            {
                $totalScore = $exam['attendance'] + $exam['cat_one'] + $exam['cat_two'] + $exam['exam'];
                $dataS = array();
                $dataS['subject_name'] = $exam['subject_name'];
                $dataS['attendance'] = $exam['attendance'];
                $dataS['cat_one'] = $exam['cat_one'];
                $dataS['cat_two'] = $exam['cat_two'];
                $dataS['exam'] = $exam['exam'];
                $dataS['totalScore'] = $totalScore;
                $dataS['full_mark'] = $exam['full_mark'];
                $dataS['passing_mark'] = $exam['passing_mark'];
                $dataSubject[] = $dataS;
            }
            $dataE['subject'] = $dataSubject; 
            $result[] = $dataE;

        }
        $data['getRecord'] = $result;
        $data['header_title'] = "My Exam Result";
        return view('student.my_exam_result', $data);
    }
}
