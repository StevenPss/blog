<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class SidebarStatsController extends Controller
{
    public function index()
    {
        return view('stats.index', [
            'users' => User::all(),
            'posts' => Post::all(),
            'categories' => Category::all(),
            'tags' => Tag::all()
        ]);
    }
}
