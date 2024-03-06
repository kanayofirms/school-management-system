<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;

class HomeworkController extends Controller
{
    public function homework()
    {
        $data['header_title'] = "Homework";
        return view('admin.homework.list', $data);
    }

    public function homework_add()
    {
        $data['getClass'] = ClassModel::getClass();
        $data['header_title'] = "Add New Homework";
        return view('admin.homework.add', $data);
    }
}
