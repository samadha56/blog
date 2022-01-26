<form method="post" action="{{ route('post.destroy', $id) }}">
    @csrf
    @method('delete')
    <a class="btn btn-sm btn-warning" href="{{ route('post.edit', $id) }}"><span class="fa fa-pen"></span></a> &nbsp;
    <button class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure Delete This Post?');" class="text-danger"><span class='fa fa-trash'></span></button>
</form>
