<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\SiteController;
use Illuminate\Http\Request;

class IndexController extends SiteController
{
    public function index()
    {
        return view('site.index');
    }
}
