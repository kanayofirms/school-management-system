<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\NoticeBoardMessageModel;
use App\Models\NoticeBoardModel;
use App\Mail\SendEmailUserMail;
use Auth;

class CommunicateController extends Controller
{

    public function send_email()
    {
        $data['header_title'] = "Send Email";
        return view('admin.communicate.send_email', $data);
    }

    public function search_user(Request $request)
    {
        $json = array();
        if(!empty($request->search))
        {
            $getUser = User::SearchUser($request->search);
            foreach ($getUser as $value) {
                $type = '';
                if($value->user_type == 1)
                {
                    $type = 'Admin';
                }
                elseif($value->user_type == 2)
                {
                    $type = 'Teacher';
                }
                elseif($value->user_type == 3)
                {
                    $type = 'Student';
                }
                elseif($value->user_type == 4)
                {
                    $type = 'Parent';
                }

                $name = $value->name.' '.$value->middle_name.' '.$value->last_name.' - '. $type;
                $json[] = ['id'=> $value->id, 'text'=> $name];
            }

        }

        echo json_encode($json);
    }

    public function send_email_user(Request $request)
    {
        dd($request->all());
    }

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

    public function notice_board_delete($id)
    {
        $save = NoticeBoardModel::getSingle($id);
        $save->delete();

        NoticeBoardMessageModel::DeleteRecord($id);

        return redirect()->back()->with('success', "Notice Board successfully deleted");
    }

    // student side code

    public function my_notice_board_student()
    {
        $data['getRecord'] = NoticeBoardModel::getRecordUser(Auth::user()->user_type);
        $data['header_title'] = "My Notice Board";
        return view('student.my_notice_board', $data);
    }

    // teacher side code

    public function my_notice_board_teacher()
    {
        $data['getRecord'] = NoticeBoardModel::getRecordUser(Auth::user()->user_type);
        $data['header_title'] = "My Notice Board";
        return view('teacher.my_notice_board', $data);
    }

    // parent side code 

    public function my_notice_board_parent()
    {
        $data['getRecord'] = NoticeBoardModel::getRecordUser(Auth::user()->user_type);
        $data['header_title'] = "My Notice Board";
        return view('parent.my_notice_board', $data);
    }

    public function my_student_notice_board_parent()
    {
        $data['getRecord'] = NoticeBoardModel::getRecordUser(3);
        $data['header_title'] = "My Notice Board";
        return view('parent.my_student_notice_board', $data);
    }
}
