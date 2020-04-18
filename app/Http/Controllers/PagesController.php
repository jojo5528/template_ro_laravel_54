<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function read(Request $request, $page, $job = 0)
    {
        if($page === "level"){
            return app('App\Http\Controllers\RankController')->level($request, $job);
        }else if($page === "zeny"){
            return app('App\Http\Controllers\RankController')->zeny($request);
        }

        if(view()->exists('article_pages.'.$page)){
            return view('article_pages.'.$page);
        }
        return abort(404);
    }
}
