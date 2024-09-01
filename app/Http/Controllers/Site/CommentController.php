<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\CommentStoreRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CommentStoreRequest $request)
    {
        $data = $request->validated();
        Comment::create($data);
        return redirect()->back()->with('success', 'Comment added successfully!');
    }
}
