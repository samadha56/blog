<?php

namespace App\Http\Controllers\Admin;

use App\Components\DataTable;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function datatable(Request $request)
    {
        $query = Comment::query();

        $columns = [
            ['db' => 'id', 'dt' => 'id'],
            ['db' => 'post_id', 'dt' => 'post_id', 'formatter' => function ($data, $row) {
                return "<a href='" . route('site.post.show', $row->post->slug) . "' target='_blank'>" . $row->post->title . '</a>';
            }],
            ['db' => 'author_name', 'dt' => 'author_name'],
            ['db' => 'content', 'dt' => 'content'],
            ['db' => 'status', 'dt' => 'status', 'formatter' => function ($data, $row) {
                return Comment::STATUS_STRINGS[$row->status];
            }],
            ['db' => 'created_at', 'dt' => 'created_at', 'formatter' => function ($data, $row) {
                return Date('Y/m/d H:i:s', strtotime($data));
            }],
            ['db' => null, 'dt' => 'options', 'formatter' => function ($data, $row) {
                return view('admin.Comment.options', ['id' => $row->id, 'status' => $row->status])->render();
            }],
        ];

        $dataTable = new DataTable($request);
        return $dataTable->setEloquent($query)->setColumns($columns)->eloquentResult();
    }

    public function index()
    {
        return view('admin.comment.index');
    }

    public function confirmComment(Comment $comment)
    {
        $comment->update(['status' => Comment::STATUS_CONFIRMED]);
        return redirect()->back()->with('success', 'Comment Confirmed.');
    }

    public function UnConfirmComment(Comment $comment)
    {
        $comment->update(['status' => Comment::STATUS_NOT_CONFIRMED]);
        return redirect()->back()->with('success', 'Comment UnConfirmed!');
    }
}
