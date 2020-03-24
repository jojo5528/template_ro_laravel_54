<?php

namespace App\Http\Controllers;

use App\User;

class UCPController extends Controller
{
    //user
    public function user_index()
    {
        return view('ucp.user_dashboard');
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
