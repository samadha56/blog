<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\SiteController;
use App\Models\Category;

class CategoryController extends SiteController
{
    public function show(Category $category)
    {
        $posts = $category->posts()->orderByDesc('id')->paginate(5);
        return view('site.catogory', compact('category', 'posts'));
    }
}
