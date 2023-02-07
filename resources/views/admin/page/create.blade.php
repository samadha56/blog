@extends('layouts.admin')
@section('page-title', 'Create page')
@section('header')
@endsection
@section('content-title', 'Create page')
@section('content-header-tools')
    <a href="{{ route('page.index') }}" class="btn btn-primary"><i class="fas fa-chevron-left"></i> Back</a>
    <a id="saveForm" class="btn btn-primary"><i class="fas fa-save"></i> Save</a>
@endsection
@section('content')
    <form action="{{ route('page.store') }}" method="POST" id="newPage">
        @csrf

        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="title" placeholder="Enter page Title ..."
                    value="{{ old('title') }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="slug" class="col-sm-2 col-form-label">Slug:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="slug" placeholder="Enter page Slug ..."
                    value="{{ old('slug') }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="content" class="col-sm-2 col-form-label">Content:</label>
            <div class="col-sm-10">
                <textarea name="content" id="content" placeholder="Enter page Content ...">{{ old('content') }}</textarea>
            </div>
        </div>

    </form>
@endsection
@section('footer')
    <script src="https://cdn.tiny.cloud/1/p1y941xnhle62iwxs1v46b63zqwx5ebddljicggtc503mo5b/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            image_class_list: [{
                title: 'Responsive',
                value: 'img-fluid'
            }, ],
            image_title: true,
            automatic_uploads: true,
            file_picker_types: 'image',
            plugins: 'wordcount link image code directionality',
            toolbar: 'wordcount | image | ltr rtl undo redo | bold italic | alignleft aligncenter alignright | code',
            images_upload_url: '{{ route('admin.upload.image') }}',
        });
    </script>
    <script>
        $('#saveForm').click(function() {
            $('#newPage').submit();
        });
    </script>
@endsection
