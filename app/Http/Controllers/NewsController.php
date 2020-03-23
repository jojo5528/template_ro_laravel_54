<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function read(Request $request, $news)
    {
        if(view()->exists('article_news.'.$news)){
            return view('article_news.'.$news);
        }
        return abort(404);
    }
}
