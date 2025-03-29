<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SettingsModel;
use Auth;
use Hash;

class UserController extends Controller
{
    public function Settings()
    {
       $data['header_title'] = "Settings";
        return view('admin.settings', $data);
    }
    
    public function UpdateSettings(Request $request)
    {
        $settings = SettingsModel::getSingle();
        $settings->paypal_email = trim($request->paypal_email);
        $settings->save();

        return redirect()->back()->with('success', "Settings Successfully Updated");
    }
    
    public function MyAccount()
    {
        $data['getRecord'] = User::getSingle(Auth::user()->id);
        $data['header_title'] = "My Account";
        if(Auth::user()->user_type == 1)
        {
            return view('admin.my_account', $data);
        }
        else if(Auth::user()->user_type == 2)
        {
            return view('teacher.my_account', $data);
        }
        else if(Auth::user()->user_type == 3)
        {
            return view('student.my_account', $data);
        }
        else if(Auth::user()->user_type == 4) 
        {
            return view('parent.my_account', $data);
        }
        
    }

    public function UpdateMyAccountAdmin(Request $request)
    {
        $id = Auth::user()->id;
        request()->validate([
            
        ]);

        $admin = User::getSingle($id);
        $admin->name = trim($request->name);
        $admin->save();

        return redirect()->back()->with('success',"Account Successfully Updated");
    }

    public function UpdateMyAccountParent(Request $request)
    {
        $id = Auth::user()->id;
        request()->validate([
            'address' => 'max:255',
            'occupation' => 'max:255',
            'mobile_number' => 'max:10|min:10'
        ]);
        
        
        $parent = User::getSingle($id);
        $parent->name = trim($request->name);
        $parent->last_name = trim($request->last_name);
        $parent->gender = trim($request->gender);
        $parent->occupation = trim($request->occupation);
        $parent->address = trim($request->address);
        $parent->mobile_number = trim($request->mobile_number);
        if(!empty($request->file('profile_pic')))
        {
            if(!empty($parent->getProfile()))
            {
                unlink('upload/profile/'.$parent->profile_pic);
            }
            
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);
            $parent->profile_pic = $filename;
        }  
        
        
        $parent->save();

        return redirect()->back()->with('success',"Account Successfully Updated");
    }

    public function UpdateMyAccountTeacher(Request $request)
    {
        $id = Auth::user()->id;
        request()->validate([
            
            'mobile_number' => 'max:10|min:10',
            'marital_status' => 'max:50',

        ]);

        $teacher = User::getSingle($id);
        $teacher->name = trim($request->name);
        $teacher->last_name = trim($request->last_name);
        $teacher->gender = trim($request->gender);
        if(!empty($request->date_of_birth))
        {
            $teacher->date_of_birth = trim($request->date_of_birth);
        }
        
        $teacher->mobile_number = trim($request->mobile_number);
        $teacher->marital_status = trim($request->marital_status);
        if(!empty($request->file('profile_pic')))
        {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);
            $teacher->profile_pic = $filename;
        }  

        $teacher->address = trim($request->address);
        $teacher->permanent_address = trim($request->permanent_address);
        $teacher->qualification = trim($request->qualification);
        $teacher->work_experience = trim($request->work_experience);

        $teacher->save();

        return redirect()->back()->with('success',"Account Successfully Updated");
    }
    
    public function UpdateMyAccountStudent(Request $request)
    {
        $id = Auth::user()->id;
        request()->validate([
            'admission_number' => 'max:15',
            'roll_number' => 'max:15',
            'mobile_number' => 'max:10|min:10'
        ]);
        
        
        $student = User::getSingle($id);
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->gender = trim($request->gender);
        if(!empty($request->date_of_birth))
        {
            $student->date_of_birth = trim($request->date_of_birth);
        }
        
        $student->mobile_number = trim($request->mobile_number);
        if(!empty($request->file('profile_pic')))
        {
            if(!empty($student->getProfile()))
            {
                unlink('upload/profile/'.$student->profile_pic);
            }
            
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);
            $student->profile_pic = $filename;
        }  
        
        
        $student->save();

        return redirect()->back()->with('success',"Account Successfully Updated");
    }

    public function change_password()
    {
        $data['header_title'] = "Change Password";
        return view('profile.change_password', $data);
    }

    public function update_change_password(Request $request)
    {
        $user = User::getSingle(Auth::user()->id);
        if(Hash::check($request->old_password, $user->password))
        {
            if($request->new_password == $request->c_password)
            {
                $user->password = Hash::make($request->new_password);
                $user->save();

                return redirect()->back()->with('success', "Password Successfully Updated");
            }
            else
            {
                return redirect()->back()->with('error', "Password and Confirm Password not matched");
            }
        }
        else
        {
            return redirect()->back()->with('error', "Current Password is wrong. Please try again");
        }
    }
}
