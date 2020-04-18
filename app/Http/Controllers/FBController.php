<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\User;
use App\Char;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class FBController extends Controller
{
    //===== SETTING =====
    //ตาราง log ที่เก็บประวัติการแชร์
    protected $share_log_table = 'fb_share_log';
    //ตารางค่า point ของผู้เล่น
    protected $user_share_table = 'kafra_share';
    //ฟิลด์ point ของผู้เล่นในตาราง
    protected $user_share_field = 'point';

    //จำนวนเพื่อนขั้นต่ำ (ค่าเริ่มต้น = 50)
    protected $min_friend = 50;
    //คูลดาวน์เป็นนาที (ค่าเริ่มต้น = 120 นาที / 2 ชั่วโมง)
    protected $cooldown = 120;
    //จำนวนพ้อยที่ต้องการให้ต่อการแชร์ 1 ครั้ง (ค่าเริ่มต้น = 1)
    protected $point_share = 1;

    /** โหมดบายพาส
     * ไม่ตรวจสอบจำนวนเพื่อน และ ข้อความโพสต์
     * true=เปิด, false=ปิด
     * แนะนำให้เปิด ถ้าแอพฯของเฟส ยังไม่รองรับการตรวจสอบโปรไฟล์หรือข้อมูลอื่นๆ
    */
    protected $bypass_mode = true;//TRUE หรือ FALSE

    public function check_profile(Request $request)
    {
        $this->check_table();

        //DATA
        $fb_uid = $request->input('id');
        $fb_friends = (int)$request->input('friend_count');
        $cooldown = (int)$request->input('cooldown');
        $game_uid = $request->input('game_uid');
        
        $user = User::where('account_id', $game_uid)->first();

        $data['uid'] = $fb_uid;
        $data['success'] = true;

        //ERROR CATCH
        if(empty($fb_uid)){
            $data['success'] = false;
            $data['msg'] = "กรุณาตรวจสอบการเข้าสู่ระบบเฟซบุ๊ก !";
            return response()->json($data);
        }else if(empty($user)){
            $data['success'] = false;
            $data['msg'] = "ไม่พบข้อมูลสมาชิก หรือ ไม่ได้เข้าสู่ระบบเว็บไซต์ กรุณาติดต่อผู้ดูแลระบบ !";
            return response()->json($data);
        }

        //CHECK COOLDOWN
        $fb_lastshare = DB::table($this->share_log_table)->where('fb_uid', $fb_uid)->first();
        $user_lastshare = DB::table($this->share_log_table)->where('account_id', $user->account_id)->first();

        if(!empty($fb_lastshare)){
            //data exist
            $from = Carbon::createFromFormat('Y-m-d H:i:s', Carbon::now()->toDateTimeString());
            $to = Carbon::createFromFormat('Y-m-d H:i:s', $fb_lastshare->ts);
            $diffInMinutes = $to->diffInMinutes($from);
            $cooldown = $this->cooldown;

            if($diffInMinutes < $cooldown){
                $timeout = (int)$cooldown - ((int)$diffInMinutes);
                $data['success'] = false;
                $data['msg'] = "คูลดาวน์การแชร์ของ FB:". $fb_uid . " คงเหลือ ". $timeout ." นาที";
            }
        }else if(!empty($user_lastshare)){
            //data exist
            $from = Carbon::createFromFormat('Y-m-d H:i:s', Carbon::now()->toDateTimeString());
            $to = Carbon::createFromFormat('Y-m-d H:i:s', $user_lastshare->ts);
            $diffInMinutes = $to->diffInMinutes($from);
            $cooldown = $this->cooldown;

            if($diffInMinutes < $cooldown){
                $timeout = (int)$cooldown - ((int)$diffInMinutes);
                $data['success'] = false;
                $data['msg'] = "คูลดาวน์การแชร์ของ ID:". $user->userid . " คงเหลือ ". $timeout ." นาที";
            }
        }
        //CHECK FRIENDS
        else if($fb_friends < $this->min_friend && !$this->bypass_mode){
            $data['success'] = false;
            $data['msg'] = "จำนวนเพื่อนน้อยกว่า ". $this->min_friend ." คน";
        }

        return response()->json($data);
    }

    public function share(Request $request)
    {
        $this->check_table();

        //DATA
        $fb_uid = $request->input('fb_uid');
        $post = $request->input('post');
        $game_uid = $request->input('game_uid');
        
        $user = User::where('account_id', $game_uid)->first();

        if($user){
            $char_online = Char::where('account_id', $user->account_id)->where('online', 1)->count();
        }else{
            $char_online = null;
        }

        $data['success'] = true;
        $post_check = false;

        //ERROR CATCH
        if(empty($user)){
            $data['success'] = false;
            $data['msg'] = "กรุณาเข้าสู่ระบบก่อนใช้งาน !";
            return response()->json($data);
        }else if($char_online > 0){
            $data['success'] = false;
            $data['msg'] = "กรุณาออกจากเกมก่อนใช้งาน !";
            return response()->json($data);
        }

        //POST CHECK
        if(!empty($post)){
            foreach($post as $i){
                $num = (int)$i['message'];
                if($num == $user->account_id){
                    $post_check = true;
                }
            }
        }
        //BYPASS การตรวจสอบโพสต์
        else if($this->bypass_mode){
            $post_check = true;
        }


        if(!$post_check){
            $data['success'] = false;
            $data['msg'] = "ไม่สามารถตรวจสอบโพสต์ได้ กรุณาลองใหม่อีกครั้ง!";
            return response()->json($data);
        }

        //INSERT POST LOG
        if(Schema::hasTable($this->share_log_table)){
            $data_array = [
                'fb_uid' => $fb_uid,
                'account_id' => $user->account_id
            ];
            DB::table($this->share_log_table)->insert($data_array);
        }else{
            $data['success'] = false;
            $data['msg'] = "ไม่พบตาราง ". $this->share_log_table ." กรุณาติดต่อผู้ดูแลระบบ!";
            return response()->json($data);
        }

        //UPDATE USER POINT
        //additional field
        $field2 = 'total_point';

        if(Schema::hasTable($this->user_share_table)){
            $old_data = DB::table($this->user_share_table)->where('account_id', $user->account_id)->first();

            if(!empty($old_data)){
                //UPDATE
                $data_array = [
                    $this->user_share_field => (int)(($old_data->point)+($this->point_share)),
                    $field2 => (int)(($old_data->total_point)+($this->point_share))
                ];
                DB::table($this->user_share_table)->where('account_id', $user->account_id)->update($data_array);
            }
            //INSERT
            else{
                $data_array = [
                    'account_id' => $user->account_id,
                    $this->user_share_field => $this->point_share,
                    $field2 => $this->point_share
                ];
                DB::table($this->user_share_table)->insert($data_array);
            }

            $data['success'] = true;
            $data['msg'] = "เพิ่มเติมแชร์ ID: ". $user->userid ." จำนวน ". $this->point_share ." แต้ม!";
        }else{
            $data['success'] = false;
            $data['msg'] = "ไม่พบตาราง ". $this->user_share_table ." กรุณาติดต่อผู้ดูแลระบบ!";
        }

        return response()->json($data);
    }

    protected function check_table()
    {
        if(!Schema::hasTable($this->share_log_table)){
            Schema::dropIfExists($this->share_log_table);
            Schema::create($this->share_log_table, function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('fb_uid');
                $table->unsignedBigInteger('account_id');
                $table->timestamp('ts')->useCurrent();
            });
        }
    }
}
