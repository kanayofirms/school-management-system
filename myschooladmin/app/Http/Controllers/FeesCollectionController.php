<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\ClassModel;
use App\Models\User;


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
        $data['header_title'] = "Add Fees";
        return view('admin.fees_collection.add_fees', $data);
    }
}
