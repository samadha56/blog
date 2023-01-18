<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\SiteController;
use Illuminate\Http\Request;
use App\Models\Post;

class IndexController extends SiteController
{
    public function index()
    {
        $posts = Post::orderByDesc('id')->get();
        return view('site.index', compact('posts'));
    }
}
