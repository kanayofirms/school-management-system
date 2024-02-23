<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommunicateController extends Controller
{
    public function notice_board()
    {
        $data['header_title'] = "Notice Board";
        return view('admin.communicate.noticeboard.list', $data);
    }

    public function notice_board_add()
    {
        $data['header_title'] = "Add New Notice Board";
        return view('admin.communicate.noticeboard.add', $data);
    }
}
