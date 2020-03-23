<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->except('_token');

        $validator = Validator::make($data, [
            'userid' => ['required', 'string', 'min:4', 'max:23', 'unique:login'],
            'password' => ['required', 'string', 'min:4', 'max:32', 'confirmed'],
            'email' => ['required', 'email', 'max:39'],
            'birthdate' => ['required', 'date_format:Y-m-d'],
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withInput($data)->withErrors($validator);
        }

        $data['user_pass'] = $data['password'];
        $user = User::create($data);
        if(!$user){
            return redirect()->back()->withErrors(['error'=>'สมัครสมาชิกล้มเหลว! กรุณาติดต่อ GM']);
        }
        return redirect()->back()->withErrors(['success'=>'สมัครสมาชิก ID:'.$user->userid.' สำเร็จ!']);
    }
}
