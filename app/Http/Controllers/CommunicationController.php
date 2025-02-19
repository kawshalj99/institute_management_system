<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\NoticeBoardModel;
use App\Models\NoticeBoardMessageModel;
use App\Mail\SendEmailUserMail;
use Auth;
use Mail;

class CommunicationController extends Controller
{
    public function SendEmail()
    {
       $data['header_title'] = "Send Email";
       return view('admin.communication.send_email', $data); 
    }
    
    public function SearchUser(Request $request)
    {
      $json = array();
      if(!empty($request->search))
      {
         $getUser = User::SearchUser($request->search);
         foreach($getUser as $value){
            $type = '';
            if($value->user_type == 1)
            {
               $type = 'Admin';
            }
            else if($value->user_type == 2)
            {
               $type = 'Teacher';
            }
            else if($value->user_type == 3)
            {
               $type = 'Student';
            }
            else if($value->user_type == 4)
            {
               $type = 'Parent';
            }
            $name = $value->name.' '.$value->last_name.' - '.$type;
            $json[] = ['id'=> $value->id, 'text'=> $name];
         }
      }
      echo json_encode($json);
    }

   public function SendEmailUser(Request $request)
   {
      if(!empty($request->user_id))
      {
         $user = User::getSingle($request->user_id);
         $user->send_message = $request->message;
         $user->send_subject = $request->subject;

         Mail::to($user->email)->send(new SendEmailUserMail($user));

      }

      if(!empty($request->message_to))
      {
         foreach($request->message_to as $user_type)
         {
            $getUser = User::getUser($user_type);
            foreach($getUser as $user)
            {
               $user->send_message = $request->message;
               $user->send_subject = $request->subject;

               Mail::to($user->email)->send(new SendEmailUserMail($user));
            }
         }
      }

      return redirect()->back()->with('success', "Mail Successfully Send");
   }
   
    
   public function NoticeBoard()
    {
       $data['getRecord'] = NoticeBoardModel::getRecord();
       $data['header_title'] = "Notice Board";
       return view('admin.communication.noticeboard.list', $data); 
    }

    public function AddNoticeBoard()
    {
       $data['header_title'] = "Add New Notice";
       return view('admin.communication.noticeboard.add', $data); 
    }

    public function InsertNoticeBoard(Request $request)
    {
       $save = new NoticeBoardModel;
       $save->title = $request->title;
       $save->notice_date = $request->notice_date;
       $save->publish_date = $request->publish_date;
       $save->message = $request->message;
       $save->created_by = Auth::user()->id;
       $save->save();

       if(!empty($request->message_to))
       {
         foreach($request->message_to as $message_to)
         {
            $message = new NoticeBoardMessageModel;
            $message->notice_board_id = $save->id;
            $message->message_to = $message_to;
            $message->save();
         }
       }

       

       return redirect('admin/communication/notice_board')->with('success', "Notice Successfully Created");

    }

    public function EditNoticeBoard($id)
    {
      $data['getRecord'] = NoticeBoardModel::getSingle($id);
      $data['header_title'] = "Edit Notice";
      return view('admin.communication.noticeboard.edit', $data); 
    }

    public function UpdateNoticeBoard(Request $request, $id)
    {
      $save = NoticeBoardModel::getSingle($id);
      $save->title = $request->title;
      $save->notice_date = $request->notice_date;
      $save->publish_date = $request->publish_date;
      $save->message = $request->message;
      $save->save();

      NoticeBoardMessageModel::DeleteRecord($id);

      if(!empty($request->message_to))
      {
        foreach($request->message_to as $message_to)
        {
           $message = new NoticeBoardMessageModel;
           $message->notice_board_id = $save->id;
           $message->message_to = $message_to;
           $message->save();
        }
      }

      

      return redirect('admin/communication/notice_board')->with('success', "Notice Successfully Updated");
    }

    public function DeleteNoticeBoard($id)
    {
      $save = NoticeBoardModel::getSingle($id);
      $save->delete();

      NoticeBoardMessageModel::DeleteRecord($id);
      return redirect()->back()->with('success', "Notice Successfully Deleted");
    }

    //student side

   public function MyNoticeBoardStudent()
   {
      $data['getRecord'] = NoticeBoardModel::getRecordUser(Auth::user()->user_type);
      $data['header_title'] = "My Notice Board";
      return view('student.my_notice_board', $data); 
   } 

   //teacher side

   public function MyNoticeBoardTeacher()
   {
      $data['getRecord'] = NoticeBoardModel::getRecordUser(Auth::user()->user_type);
      $data['header_title'] = "My Notice Board";
      return view('teacher.my_notice_board', $data); 
   }

   //parent side

   public function MyNoticeBoardParent()
   {
      $data['getRecord'] = NoticeBoardModel::getRecordUser(Auth::user()->user_type);
      $data['header_title'] = "My Notice Board";
      return view('parent.my_notice_board', $data); 
   }

   public function MyStudentNoticeBoardParent()
   {
      $data['getRecord'] = NoticeBoardModel::getRecordUser(3);
      $data['header_title'] = "Student Notice Board";
      return view('parent.my_student_notice_board', $data); 
   }
    
}
