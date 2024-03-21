<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\User;
use App\Models\StudentAddFeesModel;
use Auth;



class FeesCollectionController extends Controller
{
    public function collect_fees(Request $request)
    {
        $data['getClass'] = ClassModel::getClass();

        if(!empty($request->all()))
        {
            $data['getRecord'] = User::getCollectFeesStudent();
        }

        $data['header_title'] = "Collect Fees";
        return view('admin.fees_collection.collect_fees', $data);
    }

    public function add_fees($student_id)
    {
        $data['getFees'] = StudentAddFeesModel::getFees($student_id);
        $getStudent = User::getSingleClass($student_id);
        $data['getStudent'] = $getStudent;  
        $data['header_title'] = "Add Fees";
        $data['paid_amount'] = StudentAddFeesModel::getPaidAmount($student_id, 
        $getStudent->class_id);
        return view('admin.fees_collection.add_fees', $data);
    }

    public function add_fees_insert($student_id, Request $request)
    {
        $getStudent = User::getSingleClass($student_id);
        $paid_amount = StudentAddFeesModel::getPaidAmount($student_id, $getStudent->class_id);
        $remaingAmount = $getStudent->amount - $paid_amount;
        if($remaingAmount >= $request->amount)
        {
            $payment = new StudentAddFeesModel;
            $payment->student_id = $student_id;
            $payment->class_id = $getStudent->class_id;
            $payment->paid_amount = $request->amount;
            $payment->payment_type = $request->payment_type;
            $payment->remark = $request->remark;
            $payment->created_by = Auth::user()->id;
            $payment->save();

            return redirect()->back()->with('success', "Fees Successfully Added");
        }
        else{
            return redirect()->back()->with('error', "Your amount is greater than remaining amount");
        }

        $payment = new StudentAddFeesModel;
        $payment->student_id = $student_id;
        $payment->class_id = $getStudent->class_id;
        $payment->paid_amount = $request->amount;
        $payment->payment_type = $request->payment_type;
        $payment->remark = $request->remark;
        $payment->created_by = Auth::user()->id;
        $payment->save();

        return redirect()->back()->with('success', "Fees Successfully Added");

    }
}
