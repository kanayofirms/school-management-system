<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MarksRegisterModel extends Model
{
    use HasFactory;

    protected $table = 'marks_register';

    static public function CheckAlreadyMark($student_id, $exam_id, $class_id, $subject_id)
    {
        return MarksRegisterModel::where('student_id', '=', $student_id)
                ->where('exam_id', '=', $exam_id)
                ->where('class_id', '=', $class_id)
                ->where('subject_id', '=', $subject_id)
                ->first();
    }

    static public function getExam($student_id)
    {
        return MarksRegisterModel::select('marks_register.*', 'exam.name as exam_name')
            ->join('exam', 'exam.id', '=', 'marks_register.exam_id')
            ->where('marks_register.student_id', '=', $student_id)
            ->groupBy('marks_register.exam_id')
            ->get();
    }

    static public function getExamSubject($exam_id, $student_id)
    {
        return MarksRegisterModel::select('marks_register.*', 'exam.name as exam_name', 'subject.name as subject_name')
            ->join('exam', 'exam.id', '=', 'marks_register.exam_id')
            ->join('subject', 'subject.id', '=', 'marks_register.subject_id')
            ->where('marks_register.exam_id', '=', $exam_id)
            ->where('marks_register.student_id', '=', $student_id)
            ->get();
    }

    static public function getExamSubjectDetails($exam_id, $class_id, $subject_id) {
        return self::select(
            DB::raw('MAX(resumption_test + assignment + midterm_test + project + exam) as class_highest_score'),
            DB::raw('AVG(resumption_test + assignment + midterm_test + project + exam) as class_average'))
            ->where('exam_id', $exam_id)
            ->where('class_id', $class_id)
            ->where('subject_id', $subject_id)
            ->first(); // Make sure to use first() to fetch a single object
    }

    static public function getPosition($exam_id, $student_id, $subject_id)
    {
        // First, get all scores for the given exam_id and subject_id, ordered by the calculated total score
        $scores = MarksRegisterModel::select(
            'student_id',
            DB::raw('(resumption_test + assignment + midterm_test + project + exam) as total')
        )
            ->where('exam_id', $exam_id)
            ->where('subject_id', $subject_id)
            ->orderBy('total', 'desc')
            ->pluck('student_id')->toArray();

        // Find the position of the given student_id in the sorted list
        $position = array_search($student_id, $scores);

        // Return the position + 1 (since array_search is zero-indexed)
        return $position !== false ? $position + 1 : null; // Return null if student is not found
    }

    static public function getClass($exam_id, $student_id)
    {
        return MarksRegisterModel::select('class.name as class_name')
            ->join('exam', 'exam.id', '=', 'marks_register.exam_id')
            ->join('class', 'class.id', '=', 'marks_register.class_id')
            ->join('subject', 'subject.id', '=', 'marks_register.subject_id')
            ->where('marks_register.exam_id', '=', $exam_id)
            ->where('marks_register.student_id', '=', $student_id)
            ->first();
    }

}