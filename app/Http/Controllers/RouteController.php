<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index()
    {
        //return view('home', compact('count', 'news', 'ranking','woe'));
        return view('home');
    }

    public function download()
    {
        return view('home');
    }

    public function info()
    {
        return view('home');
    }

    public function donate()
    {
        return view('home');
    }

    public function vote()
    {
        return view('home');
    }

    public function share()
    {
        return view('home');
    }
}
