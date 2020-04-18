<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\User;

class UserController extends Controller
{
    public function update_credential(Request $request, User $user)
    {
        //old password validate
        $old_pwd = $request->input('old_password');

        if(strcmp($old_pwd, $user->user_pass)!=0){
            $msg = "รหัสผ่านเดิมไม่ถูกต้อง !";
            return redirect()->back()->withErrors(['error'=>$msg, 'old_password'=>$msg]);
        }

        //check password change or email change
        if($request->has(['password', 'password_confirmation'])){
            $data['user_pass'] = $request->input('password');

            $validator = Validator::make($request->all(), [
                'old_password' => ['required', 'string', 'min:4', 'max:32'],
                'password' => ['required', 'string', 'min:4', 'max:32', 'confirmed'],
            ]);
        }else if($request->has(['old_email', 'new_email'])){
            $data['email'] = $request->input('new_email');

            $old_email = $request->input('old_email');
            if(strcmp($old_email, $user->email)!=0){
                $msg = "อีเมลล์เดิมไม่ถูกต้อง !";
                return redirect()->back()->withErrors(['error'=>$msg, 'old_password'=>$msg]);
            }

            $validator = Validator::make($request->all(), [
                'old_email' => ['required', 'string', 'email', 'max:39'],
                'new_email' => ['required', 'string', 'email', 'max:39'],
            ]);
        }

        if(isset($validator) && $validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }

        if(!($user->update($data))){
            return redirect()->back()->withErrors(['error'=>'แก้ไขข้อมูลสมาชิก ID:'.$user->userid.' ล้มเหลว! กรุณาติดต่อ GM']);
        }
        return redirect()->back()->withErrors(['success'=>'แก้ไขข้อมูลสมาชิก ID:'.$user->userid.' สำเร็จ!']);
    }
}
