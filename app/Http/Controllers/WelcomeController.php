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
        $search = request()->query('search');
        if ($search) {
            $posts = Post::where('title', 'like', "%{$search}%")->simplePaginate(1);
        }else{
            $posts = Post::simplePaginate(1);
        }
        return view('welcome', [
            'posts' => $posts,
            'categories' => Category::all(),
            'tags' => Tag::all()
        ]);
    }
}
