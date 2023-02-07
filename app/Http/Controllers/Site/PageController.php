<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\SiteController;
use App\Models\Page;

class PageController extends SiteController
{
    public function show(Page $page) {
        return view('site.page', compact('page'));
    }
}
