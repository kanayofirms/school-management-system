<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\NoticeBoardMessageModel;
use App\Models\NoticeBoardModel;
use Auth;

class CommunicateController extends Controller
{
    public function notice_board()
    {
        $data['getRecord'] = NoticeBoardModel::getRecord();
        $data['header_title'] = "Notice Board";
        return view('admin.communicate.noticeboard.list', $data);
    }

    public function notice_board_add()
    {
        $data['header_title'] = "Add New Notice Board";
        return view('admin.communicate.noticeboard.add', $data);
    }

    public function notice_board_insert(Request $request)
    {
        $save = new NoticeBoardModel;
        $save->title = $request->title;
        $save->notice_date = $request->notice_date;
        $save->publish_on = $request->publish_on;
        $save->message = $request->message;
        $save->created_by  = Auth::user()->id;
        $save->save();

        if(!empty($request->message_to))
        {
            foreach ($request->message_to as $message_to)
            {
                $message = new NoticeBoardMessageModel;
                $message->notice_board_id = $save->id;
                $message->message_to = $message_to;
                $message->save();
            }
        }
        
        return redirect('admin/communicate/notice_board')->with('success', "Notice Board successfully created");
    }

    public function notice_board_edit($id)
    {
        $data['getRecord'] = NoticeBoardModel::getSingle($id);
        $data['header_title'] = "Edit Notice Board";
        return view('admin.communicate.noticeboard.edit', $data);
    }

    public function notice_board_update($id, Request $request)
    {
        $save = NoticeBoardModel::getSingle($id);
        $save->title = $request->title;
        $save->notice_date = $request->notice_date;
        $save->publish_on = $request->publish_on;
        $save->message = $request->message;
        $save->save();

        NoticeBoardMessageModel::DeleteRecord($id);

        if(!empty($request->message_to))
        {
            foreach ($request->message_to as $message_to)
            {
                $message = new NoticeBoardMessageModel;
                $message->notice_board_id = $save->id;
                $message->message_to = $message_to;
                $message->save();
            }
        }
        
        return redirect('admin/communicate/notice_board')->with('success', "Notice Board 
            successfully updated");
    }
}
