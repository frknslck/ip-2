<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    { 
        $users = User::all();
        $categories = Category::orderBy('order_no')->get();

        return view('users', compact('users', 'categories'));
    }
}
