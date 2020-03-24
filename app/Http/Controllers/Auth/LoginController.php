<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        $data = $request->except('_token');
        $user = User::where('userid', $data['userid'])->take(1)->first();

        if(!$user){
            return redirect()->back()->withInput($request->all())->withErrors(['userid'=> 'ชื่อผู้ใช้งานไม่ถูกต้อง !']);
        }
        
        if(strcmp($data['password'], $user->user_pass)==0){
            Auth::login($user);
            return redirect()->route('home');
        }else{
            return redirect()->back()->withInput($request->all())->withErrors(['password'=> 'รหัสผ่านไม่ถูกต้อง !']);
        }
    }
}
