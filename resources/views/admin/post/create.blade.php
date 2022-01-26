@extends('layouts.admin')
@section('page-title', 'Write Post')
@section('content-title', 'Write Post')
@section('content-header-tools')
    <a href="{{ route('post.index') }}" class="btn btn-primary"><i class="fas fa-chevron-left"></i> Back</a>
    <a id="saveForm" class="btn btn-primary"><i class="fas fa-save"></i> Save</a>
@endsection
@section('content')
    <form action="{{ route('post.store') }}" method="POST" id="newPost">
        @csrf

        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="title" placeholder="Enter Post Title ...">
            </div>
        </div>

        <div class="form-group row">
            <label for="slug" class="col-sm-2 col-form-label">Slug:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="slug" placeholder="Enter Post Slug ...">
            </div>
        </div>

        <div class="form-group row">
            <label for="content" class="col-sm-2 col-form-label">Content:</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="content" rows="10" placeholder="Just Write ..."></textarea>
            </div>
        </div>

    </form>
@endsection
@section('footer')
    <script>
        $('#saveForm').click(function() {
            $('#newPost').submit();
        });
    </script>
@endsection
