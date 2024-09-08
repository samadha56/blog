@if ($status == 1)
    <form method="post" action="{{ route('admin.comment.confirm', $id) }}">
        @csrf
        @method('put')
        <button type="submit" class="btn btn-sm btn-warning"
            href="{{ route('admin.comment.confirm', $id) }}">Confirm</span></button>
        &nbsp;
    </form>
@endif
@if ($status == 2)
    <form method="post" action="{{ route('admin.comment.unconfirm', $id) }}">
        @csrf
        @method('put')
        <button type="submit" class="btn btn-sm btn-warning"
            href="{{ route('admin.comment.unconfirm', $id) }}">UnConfirm!</span></button>
        &nbsp;
    </form>
@endif
