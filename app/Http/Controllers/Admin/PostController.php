<?php

namespace App\Http\Controllers\Admin;

use App\Components\DataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\PostStoreRequest;
use App\Http\Requests\Admin\Post\PostUpdateRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
                return view('admin.post.options', ['slug' => $row->slug])->render();
            }],
        ];

        $dataTable = new DataTable($request);
        return $dataTable->setEloquent($query)->setColumns($columns)->eloquentResult();
    }

    public function index()
    {
        return view('admin.post.index');
    }

    public function create()
    {
        $categories = Category::all(['id', 'name']);
        return view('admin.post.create', compact('categories'));
    }

    public function store(PostStoreRequest $request)
    {
        $validated_data = $request->validated();
        try {
            DB::beginTransaction();
            $post = Post::create($validated_data);
            $post->categories()->sync($validated_data['categories'] ?? []);
            DB::commit();
            return redirect()->route('post.index')->with('success', __('message.success.store'));
        } catch (\Throwable$th) {
            DB::rollBack();
            Log::error('PostController | Store Function', ['message' => $th->getMessage()]);
            return redirect()->route('post.index')->with('fail', __('message.fail'));
        }
    }

    public function edit(Post $post)
    {
        $categories = Category::all(['id', 'name']);
        $postCategories = $post->categories->pluck('id')->toArray();
        return view('admin.post.edit', compact('post', 'categories', 'postCategories'));
    }

    public function update(PostUpdateRequest $request, Post $post)
    {
        $validated_data = $request->validated();
        try {
            DB::beginTransaction();
            $post->update($validated_data);
            $post->categories()->sync($validated_data['categories'] ?? []);
            DB::commit();
            return redirect()->route('post.index')->with('success', __('message.success.update'));
        } catch (\Throwable$th) {
            DB::rollBack();
            Log::error('PostController | Update Function', ['message' => $th->getMessage()]);
            return redirect()->route('post.index')->with('fail', __('message.fail'));
        }
    }

    public function destroy(Post $post)
    {
        try {
            DB::beginTransaction();
            $post->categories()->detach();
            $post->delete();
            DB::commit();
            return redirect()->route('post.index')->with('success', __('message.success.delete'));
        } catch (\Throwable$th) {
            DB::rollBack();
            Log::error('PostController | Destroy Function', ['message' => $th->getMessage()]);
            return redirect()->route('post.index')->with('fail', __('message.fail'));
        }
    }
}
