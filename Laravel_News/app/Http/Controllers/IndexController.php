<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('order_no')->get();
        $user = 
        $news = News::orderBy('id', 'DESC')->limit(10)->get();

        return view('index', compact('categories', 'news'));
    }
}
