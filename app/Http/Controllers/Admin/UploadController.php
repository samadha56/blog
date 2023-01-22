<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UploadImage;

class UploadController extends Controller
{
    public function uploadImage(UploadImage $request)
    {
        $imgpath = request()->file('file')->store('uploads', 'public');
        return response()->json(['location' => "/storage/$imgpath"]);
    }
}
