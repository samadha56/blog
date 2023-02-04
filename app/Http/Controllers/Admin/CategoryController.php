<?php

namespace App\Http\Controllers\Admin;

use App\Components\DataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\CategoryStoreRequest;
use App\Http\Requests\Admin\Category\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function datatable(Request $request)
    {
        $query = Category::query();

        $columns = [
            ['db' => 'id', 'dt' => 'id'],
            ['db' => 'slug', 'dt' => 'slug'],
            ['db' => 'name', 'dt' => 'name'],
            ['db' => null, 'dt' => 'options', 'formatter' => function ($data, $row) {
                return view('admin.Category.options', ['slug' => $row->slug])->render();
            }],
        ];

        $dataTable = new DataTable($request);
        return $dataTable->setEloquent($query)->setColumns($columns)->eloquentResult();
    }

    public function index()
    {
        return view('admin.Category.index');
    }

    public function show(Category $category)
    {
        return view('admin.Category.show', compact('category'));
    }

    public function create()
    {
        return view('admin.Category.create');
    }

    public function store(CategoryStoreRequest $request)
    {
        $validated_data = $request->validated();
        $category = Category::create($validated_data);
        return redirect()->route('category.show', $category)->with('success', __('message.success.store'));
    }

    public function edit(Category $category)
    {
        return view('admin.Category.edit', compact('category'));
    }

    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $validated_data = $request->validated();
        $category->update($validated_data);
        return redirect()->route('category.show', $category)->with('success', __('message.success.update'));
    }

    public function destroy(Category $category)
    {
        if ($category->posts()->exists()) {
            return redirect()->route('category.index')->with('fail', __('message.fail.delete.category.have.post'));
        }
        $category->delete();
        return redirect()->route('category.index')->with('success', __('message.success.delete'));
    }
}
