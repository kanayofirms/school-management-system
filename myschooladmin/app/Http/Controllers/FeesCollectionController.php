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
        if(!empty($request->amount))
        {
            $remaingAmount = $getStudent->amount - $paid_amount;
            if($remaingAmount >= $request->amount)
            {
                $remaining_amount_user = $remaingAmount - $request->amount;
    
                $payment = new StudentAddFeesModel;
                $payment->student_id = $student_id;
                $payment->class_id = $getStudent->class_id;
                $payment->paid_amount = $request->amount;
                $payment->total_amount = $remaingAmount;
                $payment->remaining_amount = $remaining_amount_user;
                $payment->payment_type = $request->payment_type;
                $payment->remark = $request->remark;
                $payment->created_by = Auth::user()->id;
                $payment->save();
    
                return redirect()->back()->with('success', "Fees Successfully Added");
            }
            else{
                return redirect()->back()->with('error', "Your amount is greater than remaining amount");
            }
        }
        else
        {
            return redirect()->back()->with('error', "Add at least N1");

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

    // student side code

    public function collect_fees_student(Request $request)
    {
        $student_id = Auth::user()->id;
        
        $data['getFees'] = StudentAddFeesModel::getFees($student_id);

        //dd($data['getFees']);

        $getStudent = User::getSingleClass($student_id);
        $data['getStudent'] = $getStudent;  

        $data['header_title'] = "Fees Collection";
        
        $data['paid_amount'] = StudentAddFeesModel::getPaidAmount($student_id, 
        $getStudent->class_id); // Auth::user()->id, Auth::user()->class_id
        return view('student.my_fees_collection', $data);
    }

    public function collect_fees_student_payment(Request $request)
    {
        $getStudent = User::getSingleClass(Auth::user()-id);
        $paid_amount = StudentAddFeesModel::getPaidAmount(Auth::user()-id, Auth::user()->class_id);
        if(!empty($request->amount))
        {
            $remaingAmount = $getStudent->amount - $paid_amount;
            if($remaingAmount >= $request->amount)
            {
            }
            else{
                return redirect()->back()->with('error', "Your amount is greater than remaining amount");
            }
        }
        else
        {
            return redirect()->back()->with('error', "Add at least N1");
        }
        dd($request->all());
    }
}
