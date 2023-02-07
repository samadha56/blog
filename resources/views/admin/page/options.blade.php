<form method="post" action="{{ route('page.destroy', $slug) }}">
    @csrf
    @method('delete')
    <a class="btn btn-sm btn-warning" href="{{ route('page.edit', $slug) }}"><span class="fa fa-pen"></span></a> &nbsp;
    <button class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure Delete This page?');" class="text-danger"><span class='fa fa-trash'></span></button>
</form>
