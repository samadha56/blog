<?php

namespace App\Http\Controllers\Admin;

use App\Components\DataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Page\PageStoreRequest;
use App\Http\Requests\Admin\Page\PageUpdateRequest;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function datatable(Request $request)
    {
        $query = Page::query();

        $columns = [
            ['db' => 'id', 'dt' => 'id'],
            ['db' => 'title', 'dt' => 'title'],
            ['db' => 'slug', 'dt' => 'slug'],
            ['db' => 'created_at', 'dt' => 'created_at', 'formatter' => function ($data, $row) {
                return Date('Y/m/d H:i:s', strtotime($data));
            }],
            ['db' => null, 'dt' => 'options', 'formatter' => function ($data, $row) {
                return view('admin.page.options', ['slug' => $row->slug])->render();
            }],
        ];

        $dataTable = new DataTable($request);
        return $dataTable->setEloquent($query)->setColumns($columns)->eloquentResult();
    }

    public function index()
    {
        return view('admin.page.index');
    }

    public function create()
    {
        return view('admin.page.create');
    }

    public function store(PageStoreRequest $request)
    {
        $validated_data = $request->validated();
        Page::create($validated_data);
        return redirect()->route('page.index')->with('success', __('message.success.store'));
    }

    public function edit(Page $page)
    {
        return view('admin.page.edit', compact('page'));
    }

    public function update(PageUpdateRequest $request, Page $page)
    {
        $validated_data = $request->validated();
        $page->update($validated_data);
        return redirect()->route('page.index')->with('success', __('message.success.update'));
    }

    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('page.index')->with('success', __('message.success.delete'));
    }
}
