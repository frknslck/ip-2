<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    public function category(Request $request, int $id)
    {
        $categories = Category::orderBy('order_no')->get();

        $category = Category::find($id);

        return view('news.category', compact('categories', 'category'));
    }

    public function getNews(Request $request, int $id)
    {

        if (is_null(Auth::user())) {
            return redirect()->route('login');
        }

        $categories = Category::orderBy('order_no')->get();

        $news = News::find($id);

        $news->read_count = $news->read_count + 1;
        $news->save();

        return view(view: 'news.get', data: compact('categories', 'news'));
    }
}
