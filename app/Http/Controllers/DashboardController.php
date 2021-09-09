<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $posts = auth()->user()->posts;
        $categories = Category::all();

        return view('dashboard', compact('posts', 'categories'));
    }
}
