<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;

class TMPAYController extends Controller
{
    protected $table = "truemoney";
    protected $merchant_id = "SW20041723";

    public function index(Request $request)
    {
        $user_id = $request->user()->account_id;

        $topup_history = DB::table($this->table)->where('user_id', $user_id)->orderBy('card_id', 'desc')->paginate(10);

        $data['status_data'] = $this->card_status();
        $data['history'] = $topup_history;
        return view('tmpay')->with($data);
    }

    public function index_admin(Request $request)
    {
        $topup_history = DB::table($this->table)->orderBy('card_id', 'desc')->paginate(50);

        $data['status_data'] = $this->card_status();
        $data['history'] = $topup_history;
        return view('tmpay_admin')->with($data);
    }

    public function send_request(Request $request)
    {
        //DATA
        $user_id = $request->user()->account_id;
        $tmt_card = $request->input('truemoney_password');

        $where_wait = [ ['user_id',$user_id], ['status',0] ];
        $where_fail = [ ['user_id',$user_id], ['status','>','2'], ['added_time','>','DATE_SUB(NOW(),INTERVAL 1 DAY)'] ];
        $count_wait = DB::table($this->table)->where($where_wait)->count();
        $count_fail = DB::table($this->table)->where($where_fail)->count();
        $count_used = DB::table($this->table)->where('password', $tmt_card)
            ->where(function ($query){
                $query->orwhere('status', 0); $query->orwhere('status', 1); $query->orwhere('status', 2);
            })->count();

        //VALIDATE TRUEMONEY CARD
        $validator = Validator::make($request->all(), ['truemoney_password' => 'digits:14']);
        if($validator->fails()){
            return redirect()->route('user.tmpay')->withErrors(['error' => 'รูปแบบรหัสบัตรทรูมันนี่ไม่ถูกต้อง! (ตัวเลข 14 หลัก)']);
        }else if($count_used > 0){
            return redirect()->route('user.tmpay')->withErrors(['error' => "รหัสบัตรทรูมันนี่นี้ถูกใช้ไปแล้ว"]);
        }else if($count_wait >= 3){
            return redirect()->route('user.tmpay')->withErrors(['error' => "คุณยังมีรายการรอการตรวจสอบอยู่ $count_wait รายการ"]);
        }else if($count_fail >= 3){
            return redirect()->route('user.tmpay')->withErrors(['error' => "คุณเติมเงินผิด $count_fail รายการ, ถูกระงับการใช้งานชั่วคราว 24 ชั่วโมง"]);
        }
        
        //TOPUP
        if(($tmpay_res = $this->card_send($user_id, $tmt_card)) !== true){
            return redirect()->route('user.tmpay')->withErrors(['error' => "ขออภัย, ขณะนี้ระบบ TMPAY.NET ขัดข้อง กรุณาติดต่อเจ้าหน้าที่ ($tmpay_res)"]);
        }
        
        return redirect()->route('user.tmpay')->withErrors(['success' => "ได้รับข้อมูลบัตรเงินสดเรียบร้อย กรุณารอการตรวจสอบจากระบบ"]);
    }

    private function card_send($user_id, $tmt_card)
    {
        $merchant_id = $this->merchant_id;
        $url_resp = route('tmpay_callback');
        $url_api = "https://www.tmpay.net/TPG/backend.php?merchant_id=".$merchant_id."&password=".$tmt_card."&resp_url=".$url_resp;

        $curl = curl_init($url_api);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);
        curl_setopt($curl, CURLOPT_HEADER, FALSE);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);
        $curl_content = curl_exec($curl);
        if($curl_content === false){
            die(curl_errno($curl) . ':' . curl_error($curl));
        }
        curl_close($curl);
        
        if(strpos($curl_content,'SUCCEED') !== FALSE){
            $insert_data = [
                'password' => $tmt_card,
                'user_id' => $user_id,
                'amount' => 0,
                'status' => 0,
                'added_time' => Carbon::now()->toDateTimeString(),
            ];
            DB::table($this->table)->insert($insert_data);
            return true;
        }
        else return $curl_content;
    }

    public function tmpay_callback(Request $request)
    {
        if($this->check_table()){
            $ip_addr = $_SERVER['REMOTE_ADDR'];
            $trans_id = $request->has('transaction_id') ? $request->input('transaction_id') : null;
            $tmt_pwd = $request->has('password') ? $request->input('password') : null;
            $amt = $request->has('amount') ? $request->input('amount') : 0;
            $amt_real = $request->has('real_amount') ? $request->input('real_amount') : '0.0';
            $status = $request->has('status') ? $request->input('status') : 0;
            $data_insert = [
                'ip_addr' => $ip_addr,
                'transaction_id' => $trans_id,
                'password' => $tmt_pwd,
                'amount' => $amt,
                'real_amount' => $amt_real,
                'status' => $status,
            ];
            DB::table('tmpay_callback')->insert($data_insert);
        }

        $validator = Validator::make($request->all(), [
            'transaction_id' => 'string|min:10|max:10|required',
            'password' => 'digits:14|required',
            'amount' => 'numeric|required',
            'status' => 'digits:1|required',
        ]);
        if($validator->fails()){
            return abort(404);
        }

        //DATA
        $amount = (int)$request->input('amount');
        $status = (int)$request->input('status');
        $tmt_card = $request->input('password');

        $update_data = [
            'amount' => $amount,
            'status' => $status,
        ];
        $where = [
            ['password', $tmt_card],
            ['status', 0]
        ];
        $result = DB::table($this->table)->where($where)->update($update_data);
        
        echo "SUCCEED|AFFECTED=". $result?1:0;
    }

    protected function check_table()
    {
        if(!Schema::hasTable('tmpay_callback')){
            Schema::dropIfExists('tmpay_callback');
            Schema::create('tmpay_callback', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('ip_addr')->nullable();
                $table->string('transaction_id', 10)->nullable();
                $table->string('password', 14)->nullable();
                $table->integer('amount')->default(0);
                $table->double('real_amount')->default(0.0);
                $table->tinyInteger('status')->default(0);
                $table->timestamp('ts')->useCurrent();
            });
        }
        return true;
    }

    private function card_status()
    {
        $data_array = [
            "<b class='badge badge-pill badge-dark'>รอการตรวจสอบ</b>",//0
            "<b class='badge badge-pill badge-primary'>ผ่าน</b>",//1
            "<b class='badge badge-pill badge-success'>ผ่าน (รับ Cash แล้ว)</b>",//2
            "<b class='badge badge-pill badge-warning'>ถูกใช้ไปแล้ว</b>",//3
            "<b class='badge badge-pill badge-danger'>รหัสผิดพลาด</b>",//4
            "<b class='badge badge-pill badge-danger'>บัตรทรูมูฟ</b>"//5
        ];
        return $data_array;
    }
}
