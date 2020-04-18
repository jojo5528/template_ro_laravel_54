<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Char;

class RankController extends Controller
{
    public function level(Request $request, $job = 0)
    {
        $limit = 100;

        $data['char'] = Char::Select('name','class','base_level')->Where('class', $job)->OrderBy('base_level', 'desc')->take($limit)->get();

        if(view()->exists('article_pages.level')){
            return view('article_pages.level')->with($data);
        }
        return abort(404);
    }

    public function zeny(Request $request)
    {
        $limit = 50;

        $data['char'] = Char::Select('name','zeny')->OrderBy('zeny','desc')->take($limit)->get();

        if(view()->exists('article_pages.zeny')){
            return view('article_pages.zeny')->with($data);
        }
        return abort(404);
    }
}
