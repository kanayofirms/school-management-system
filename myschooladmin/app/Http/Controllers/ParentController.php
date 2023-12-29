<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;
use Str;

class ParentController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getParent();
        $data['header_title'] = "Parent List";
        return view('admin.parent.list', $data);
    }
}
