@extends('layouts.admin')
@section('page-title', 'Write Post')
@section('header')
@endsection
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
                <input type="text" class="form-control" name="title" placeholder="Enter Post Title ..."
                    value="{{ old('title') }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="slug" class="col-sm-2 col-form-label">Slug:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="slug" placeholder="Enter Post Slug ..."
                    value="{{ old('slug') }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="categories" class="col-sm-2 col-form-label">Categories:</label>
            <div class="col-sm-10">
                <select name="categories[]" id="categories" class="form-control" multiple>
                    @foreach ($categories as $category)
                        <option
                            {{ !empty(old('categories')) && in_array($category->id, old('categories')) ? 'selected' : '' }}
                            value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="slug" class="col-sm-2 col-form-label">Short content:</label>
            <div class="col-sm-10">
                <textarea name="short_content" id="short_content" class="form-control" placeholder="Enter Post Short Content ...">{{ old('short_content') }}</textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="content" class="col-sm-2 col-form-label">Content:</label>
            <div class="col-sm-10">
                <textarea name="content" id="content" placeholder="Enter Post Content ...">{{ old('content') }}</textarea>
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
            $('#newPost').submit();
        });
    </script>
@endsection
