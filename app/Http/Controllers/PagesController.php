<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function read(Request $request, $page)
    {
        if(view()->exists('article_pages.'.$page)){
            return view('article_pages.'.$page);
        }
        return abort(404);
    }
}
