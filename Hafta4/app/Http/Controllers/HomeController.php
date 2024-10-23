<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function contact()
    {
        return view('iletisim');
    }
    public function about()
    {
        return view('hakkimizda');
    }
    public function form()
    {
        return view('form');
    }
}