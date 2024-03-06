<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeworkController extends Controller
{
    public function homework()
    {
        $data['header_title'] = "Homework";
        return view('admin.homework.list', $data);
    }

    public function homework_add()
    {
        $data['header_title'] = "Add New Homework";
        return view('admin.homework.add', $data);
    }
}
