<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;

class UCPController extends Controller
{
    //user
    public function user_index()
    {
        //===== SETTING =====
        //ตารางค่า point ของผู้เล่น
        $user_share_table = 'kafra_share';
        //ฟิลด์ point ของผู้เล่นในตาราง
        $user_share_field = 'point';
        //ฟิลด์ point ของผู้เล่นในตาราง
        $user_share_field2 = 'total_point';

        $user = Auth::user();
        $data = null;

        if(Schema::hasTable($user_share_table)){
            $result = DB::table($user_share_table)->where('account_id', $user->account_id)->first();

            if(!empty($result)){
                $data['share_point'] = $result->point;
                $data['share_point_total'] = $result->total_point;
            }else{
                $data['share_point'] = 0;
                $data['share_point_total'] = 0;
            }
        }

        return view('ucp.user_dashboard')->with($data);
    }

    public function user_changepassword()
    {
        return view('ucp.user_changepassword');
    }

    public function user_changemail()
    {
        return view('ucp.user_changemail');
    }

    //gm manage
    public function gm_guide()
    {
        return view('ucp.gm_guide');
    }

    public function gm_index()
    {
        $count['user'] = User::count();
        return view('ucp.gm_dashboard')->with('count', $count);
    }

    public function gm_news()
    {
        return view('ucp.gm_news');
    }

    public function gm_sites()
    {
        return view('ucp.gm_sites');
    }

    public function gm_pages()
    {
        return view('ucp.gm_pages');
    }
}
