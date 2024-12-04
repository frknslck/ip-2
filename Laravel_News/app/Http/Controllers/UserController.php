<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $categories = Category::orderBy('order_no')->get();
        $news = News::orderBy('id', 'desc')->first();

        return view('panel', compact('users', 'categories', 'news'));
    }

    // HABERLER
    public function searchNews(Request $request)
    {
        $newsId = $request->input('news_id');
        $news = News::find($newsId);

        if (!$news) {
            return redirect()->route('panel.index')->with('error', 'Haber bulunamadı!');
        }

        $users = User::all();
        $categories = Category::orderBy('order_no')->get();

        return view('panel', compact('users', 'categories', 'news'));
    }

    public function updateNews(Request $request, $id)
    {
        $news = News::find($id);

        if (!$news) {
            return redirect()->route('panel.index')->with('error', 'Haber bulunamadı!');
        }

        $news->update($request->only(['title', 'description', 'image', 'content', 'is_active']));

        return redirect()->route('panel.index')->with('success', 'Haber başarıyla güncellendi!');
    }

    public function deleteNews($id)
    {
        $news = News::find($id);

        if (!$news) {
            return redirect()->route('panel.index')->with('error', 'Haber bulunamadı!');
        }

        $news->delete();

        return redirect()->route('panel.index')->with('success', 'Haber başarıyla silindi!');
    }

    // KULLANICILAR

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if (Auth::user()->of == 1 && $user->id !== Auth::user()->id && $user->of !== 1) {
            $user->delete();
            return back()->with('success', 'Kullanıcı başarıyla silindi.');
        }

        return back()->with('error', 'Bu işlemi gerçekleştirmek için yetkiniz yok.');
    }

    public function promoteToAdmin($id)
    {
        $user = User::findOrFail($id);
        if (Auth::user()->of == 1 && $user->id !== Auth::user()->id && $user->of !== 1) {
            $user->of = 1;
            $user->save();
            return back()->with('success', 'Kullanıcı başarıyla admin yapıldı.');
        }

        return back()->with('error', 'Bu işlemi gerçekleştirmek için yetkiniz yok.');
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email'
        ]);

        $user = User::findOrFail($id);
    
        // if (Auth::user()->id !== $id && Auth::user()->of !== 1) {
        //     return back()->with('error', 'Yetkiniz yok!');
        // }
    
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);
    
        return back()->with('success', 'Kullanıcı bilgileri güncellendi!');
    }
}
