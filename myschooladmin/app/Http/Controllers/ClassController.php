<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ClassController extends Controller
{
    public function list()
    {
        $data['header_title'] = "Class List";
        return view('admin.class.list', $data);
    }
}
