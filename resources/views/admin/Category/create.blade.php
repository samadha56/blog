@extends('layouts.admin')
@section('page-title', 'Create Category')
@section('content-title', 'Create Category')
@section('content-header-tools')
    <a href="{{ route('category.index') }}" class="btn btn-primary"><i class="fas fa-chevron-left"></i> Back</a>
    <a id="saveForm" class="btn btn-primary"><i class="fas fa-save"></i> Save</a>
@endsection
@section('content')
    <form action="{{ route('category.store') }}" method="POST" id="newCategory">
        @csrf
        <div class="form-group row">
            <label for="slug" class="col-sm-2 col-form-label">Slug:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="slug" placeholder="Enter Category Slug ...">
            </div>
        </div>

        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" placeholder="Enter Category Name ...">
            </div>
        </div>
    </form>
@endsection
@section('footer')
    <script>
        $('#saveForm').click(function() {
            $('#newCategory').submit();
        });
    </script>
@endsection
