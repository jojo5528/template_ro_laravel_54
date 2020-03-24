<?php

namespace App\Http\Controllers;

use App\User;
use App\Char;
use App\WOE;
use Illuminate\Support\Facades\Schema;

class RouteController extends Controller
{
    public function index()
    {
        //=====count=====
        $fake_online = 3;
        $fake_account = 3;

        $online = Char::where('online', 1)->count();
        $account = User::count();

        $count['online'] = $online*$fake_online;
        $count['account'] = $account*$fake_account;
        $count = (object)$count;

        //=====ranking=====
        $col['mvp'] = 'mvp';
        $col['pvp'] = 'kills';
        $col['vote'] = 'point_total';
        $col['share'] = 'cashpoints_share';

        $chk_col['mvp'] = Schema::hasColumn('char', $col['mvp']);
        $chk_col['pvp'] = Schema::hasColumn('char', $col['pvp']);
        $chk_col['vote'] = Schema::hasColumn('login', $col['vote']);
        $chk_col['share'] = Schema::hasColumn('login', $col['share']);

        //mvp
        $mvp_data = [];
        if($chk_col['mvp']){
            $mvp = Char::select('name', $col['mvp'])->orderby($col['mvp'], 'desc')->take(10)->get();
            if(!empty($mvp)){
                foreach($mvp as $idx=>$i){
                    $mvp_data[$idx]['name'] = $i['name'];
                    $mvp_data[$idx]['point'] = $i[$col['mvp']];
                }
            }
        }

        //pvp
        $pvp_data = [];
        if($chk_col['pvp']){
            $pvp = Char::select('name', $col['pvp'])->orderby($col['pvp'], 'desc')->take(10)->get();
            if(!empty($pvp)){
                $pvp_data = [];
                foreach($pvp as $idx=>$i){
                    $pvp_data[$idx]['name'] = $i['name'];
                    $pvp_data[$idx]['point'] = $i[$col['pvp']];
                }
            }
        }

        //vote
        $vote_data = [];
        if($chk_col['vote']){
            $vote = User::select('userid', $col['vote'])->orderby($col['vote'], 'desc')->take(10)->get();
            if(!empty($vote)){
                foreach($vote as $idx=>$i){
                    $vote_data[$idx]['name'] = $i['userid'];
                    $vote_data[$idx]['point'] = $i[$col['vote']];
                }
            }
        }

        //share
        $share_data = [];
        if($chk_col['share']){
            $share = User::select('userid', $col['share'])->orderby($col['share'], 'desc')->take(10)->get();
            if(!empty($vote)){
                foreach($share as $idx=>$i){
                    $share_data[$idx]['name'] = $i['userid'];
                    $share_data[$idx]['point'] = $i[$col['share']];
                }
            }
        }

        $ranking = [
            'mvp' => $mvp_data,
            'pvp' => $pvp_data,
            'vote' => $vote_data,
            'share' => $share_data,
        ];
        $ranking = (object)$ranking;

        //=====woe report=====
        $woe_report = WOE::orderby('castle_id','asc')->get();

        foreach($woe_report as $idx=>$i){
            $woe_report[$idx]['castle_name'] = $i->Castle->name;
            $woe_report[$idx]['guild_name'] = $i->Guild->name;
            $woe_report[$idx]['guild_master'] = $i->Guild->master;
            $woe_report[$idx]['guild_emblem'] = route('guild.emblem', $i->Guild->guild_id);
        }
        if(!empty($woe_report)){
            $woe = (object)$woe_report;
        }else{
            $woe = null;
        }

        $data = [
            'count'=>$count,
            'ranking'=>$ranking,
            'woe'=>$woe,
        ];
        return view('home')->with($data);
    }
}
