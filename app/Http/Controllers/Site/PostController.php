<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Controllers\SiteController;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends SiteController
{
    public function show(Post $post) {
        $comments = $post->comments()->confirmedStatus()->get(['author_name', 'content', 'created_at']);
        return view('site.post', compact('post', 'comments'));
    }
}
