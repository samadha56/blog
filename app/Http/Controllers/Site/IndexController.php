<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\SiteController;
use App\Models\Post;

class IndexController extends SiteController
{
    public function index()
    {
        $posts = Post::orderByDesc('id')->paginate(5);
        return view('site.index', compact('posts'));
    }
}
