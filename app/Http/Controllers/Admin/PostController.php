<?php

namespace App\Http\Controllers\Admin;

use App\Components\DataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\PostStoreRequest;
use App\Http\Requests\Admin\Post\PostUpdateRequest;
use App\Models\Post;
use DateTime;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function datatable(Request $request)
    {
        $query = Post::query();

        $columns = [
            ['db' => 'id', 'dt' => 'id'],
            ['db' => 'title', 'dt' => 'title'],
            ['db' => 'slug', 'dt' => 'slug'],
            ['db' => 'created_at', 'dt' => 'created_at', 'formatter' => function ($data, $row) {
                return Date('Y/m/d H:i:s', strtotime($data));
            }],
            ['db' => null, 'dt' => 'options', 'formatter' => function ($data, $row) {
                return view('admin.post.options', ['id' => $row->id])->render();
            }],
        ];

        $dataTable = new DataTable($request);
        return $dataTable->setEloquent($query)->setColumns($columns)->eloquentResult();
    }

    public function index()
    {
        return view('admin.post.index');
    }

    public function show(Post $post)
    {
        return view('admin.post.show', compact('post'));
    }

    public function create()
    {
        return view('admin.post.create');
    }

    public function store(PostStoreRequest $request)
    {
        $validated_data = $request->validated();
        $post = Post::create($validated_data);
        return redirect()->route('post.index')->with('success', __('message.success.store'));
    }

    public function edit(Post $post)
    {
        return view('admin.post.edit', compact('post'));
    }

    public function update(PostUpdateRequest $request, Post $post)
    {
        $validated_data = $request->validated();
        $post->update($validated_data);
        return redirect()->route('post.index')->with('success', __('message.success.update'));
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index')->with('success', __('message.success.delete'));
    }
}
