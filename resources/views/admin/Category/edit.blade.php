@extends('layouts.admin')
@section('page-title', 'Update Category')
@section('content-title', 'Update Category')
@section('content-header-tools')
    <a href="{{ route('category.show', $category->slug) }}" class="btn btn-primary"><i class="fas fa-chevron-left"></i> Back</a>
    <a id="saveForm" class="btn btn-primary"><i class="fas fa-save"></i> Update</a>
@endsection
@section('content')
    <form action="{{ route('category.update', $category->slug) }}" method="POST" id="updateCategory">
        @csrf
        @method('PUT')
        <div class="form-group row">
            <label for="slug" class="col-sm-2 col-form-label">Slug:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="slug" value="{{ old('slug', $category->slug) }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" value="{{ old('name', $category->name) }}">
            </div>
        </div>
    </form>
@endsection
@section('footer')
    <script>
        $('#saveForm').click(function() {
            $('#updateCategory').submit();
        });
    </script>
@endsection
