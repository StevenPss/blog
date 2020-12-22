<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'posts' => Post::searched()->simplePaginate(1),
            'categories' => Category::all(),
            'tags' => Tag::all()
        ]);
    }
}
