<form method="post" action="{{ route('category.destroy', $slug) }}">
    @csrf
    @method('delete')
    <a class="btn btn-sm btn-primary" href="{{ route('category.show', $slug) }}"><span class="fa fa-eye"></span></a> &nbsp;
    <button class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure Delete This Category?');" class="text-danger"><span class='fa fa-trash'></span></button>
</form>
