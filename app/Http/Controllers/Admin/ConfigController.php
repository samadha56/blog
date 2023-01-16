<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Config\UpdateRequest;
use App\Models\Config;

class ConfigController extends Controller
{
    public function index()
    {
        $configs = Config::all();
        return view('admin.config.index', compact('configs'));
    }

    public function update(UpdateRequest $request)
    {
        $validatedDatas = $request->validated();
        foreach ($validatedDatas['config'] as $key => $value) {
            Config::where('slug', $key)->update(['content' => $value]);
        }
        return redirect()->route('admin.config.index')->with('success', __('message.success.store'));
    }
}
