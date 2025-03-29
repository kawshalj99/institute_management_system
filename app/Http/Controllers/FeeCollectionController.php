<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\ClassModel;
use App\Models\User;
use App\Models\studentAddFeesModel;


class FeeCollectionController extends Controller
{
    public function collect_fee(Request $request)
    {
        $data['getClass'] = ClassModel::getClass();

        if(!empty($request->all()))
        {
            $data['getRecord'] = User::getCollectFeeStudent();
        }
        $data['header_title'] = "Collect Fees";
        return view('admin.fee_collection.collect_fee', $data);
    }

    public function collect_fee_add($student_id)
    {
        $data['getFees'] = StudentAddFeesModel::getFees($student_id);
        $getStudent = User::getSingleClass($student_id);
        $data['getStudent'] = $getStudent;
        $data['header_title'] = "Add Payment";
        $data['paid_amount'] = StudentAddFeesModel::getPaidAmount($student_id, $getStudent->class_id);
        return view('admin.fee_collection.add_collect_fee', $data);
    }

    public function collect_fee_insert($student_id, Request $request)
    {
        $getStudent = User::getSingleClass($student_id);
        $paid_amount = StudentAddFeesModel::getPaidAmount($student_id, $getStudent->class_id);
        if(!empty($request->amount))
        {
            $RemainingAmount = $getStudent->amount - $paid_amount;
        
            if($RemainingAmount >= $request->amount)
            {
                $remaining_amount_user = $RemainingAmount - $request->amount;
                $payment = new StudentAddFeesModel;
                $payment->student_id = $student_id;
                $payment->class_id = $getStudent->class_id;
                $payment->paid_amount = $request->amount;
                $payment->total_amount = $RemainingAmount;
                $payment->remaining_amount = $remaining_amount_user;
                $payment->payment_type = $request->payment_type;
                $payment->remark = $request->remark;
                $payment->created_by = Auth::user()->id;
                $payment->is_payment = 1;
                $payment->save();
    
                return redirect()->back()->with('success', "Payment Successfully Paid");
            }
            else
            {
                return redirect()->back()->with('error', "Payment Exceed the Due Amount. Please Check");
            }
    
        }
        else
        {
            return redirect()->back()->with('error', "Amount should greater than LKR 0");
        }

       
        
    }

    //student side
    
    public function CollectFeeStudent(Request $request)
    {
        $student_id = Auth::user()->id;

        $data['getFees'] = StudentAddFeesModel::getFees($student_id);

        $getStudent = User::getSingleClass($student_id);
        $data['getStudent'] = $getStudent;

        $data['header_title'] = "Fee Collection";
        $data['paid_amount'] = StudentAddFeesModel::getPaidAmount(Auth::user()->id, Auth::user()->class_id);
        return view('student.my_fee_collection', $data);
    }

    public function CollectFeeStudentPayment(Request $request)
    {
        $getStudent = User::getSingleClass(Auth::user()->id);
        $paid_amount = StudentAddFeesModel::getPaidAmount(Auth::user()->id, Auth::user()->class_id);
        if(!empty($request->amount))
        {
            $RemainingAmount = $getStudent->amount - $paid_amount;
            if($RemainingAmount >= $request->amount)
            {
                $remaining_amount_user = $RemainingAmount - $request->amount;
                $payment = new StudentAddFeesModel;
                $payment->student_id = Auth::user()->id;
                $payment->class_id = Auth::user()->class_id;
                $payment->paid_amount = $request->amount;
                $payment->total_amount = $RemainingAmount;
                $payment->remaining_amount = $remaining_amount_user;
                $payment->payment_type = $request->payment_type;
                $payment->remark = $request->remark;
                $payment->created_by = Auth::user()->id;
               
                $payment->save();
                if($request->payment_type == "Card Payment")
                {

                }
                else if($request->payment_type == "Paypal")
                {

                }

                return redirect()->back()->with('success', "Payment Successfully Paid");
            }
            else
            {
                return redirect()->back()->with('error', "Payment Exceed the Due Amount. Please Check");
            }
        }
        else
        {
            return redirect()->back()->with('error', "Amount should greater than LKR 0");
        }
    }

    // Parent side

    public function CollectFeeParent($student_id, Request $request)
    {
        $getStudent = User::getSingle($student_id);
        $data['getStudent'] = $getStudent;
        $data['getFees'] = StudentAddFeesModel::getFees($student_id);

        $getStudent = User::getSingleClass($student_id);
        $data['getStudent'] = $getStudent;

        $data['header_title'] = "Fee Collection";
        $data['paid_amount'] = StudentAddFeesModel::getPaidAmount($student_id, $getStudent->class_id);
        return view('parent.my_fee_collection', $data);
    }
}
