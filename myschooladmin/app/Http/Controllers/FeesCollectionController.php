<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\ClassModel;

class FeesCollectionController extends Controller
{
    public function collect_fees()
    {
        $data['getClass'] = ClassModel::getClass();
        $data['header_title'] = "Collect Fees";
        return view('admin.fees_collection.collect_fees', $data);
    }
}
