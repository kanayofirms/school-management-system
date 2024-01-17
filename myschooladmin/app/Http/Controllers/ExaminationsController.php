<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExamModel;
use Auth;

class ExaminationsController extends Controller
{
    public function exam_list()
    {
        $data['getRecord'] = ExamModel::getRecord();
        $data['header_title'] = "Exam List";
        return view('admin.examinations.exam.list', $data);
    }

    // public function exam_add()
    // {
    //     $data['header_title'] = "Add New Exam";
    //     return view('admin.examinations.exam.add', $data);
    // }

    // public function exam_insert(Request $request)
    // {
    //     $exam = new ExamModel;
    //     $exam->name = trim($request->name);
    //     $exam->note = trim($request->note);
    //     $exam->created_by = Auth::user()->id;
    //     $exam->save();

    //     return redirect()->back()->with('success', "Exam successfully created");
    // }
}
