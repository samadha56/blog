@extends('layouts.admin')
@section('page-title', 'Write Post')
@section('header')
    <link href="{{ asset('css/froala_editor.pkgd.min.css') }}" rel="stylesheet" type="text/css" />
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
            <label for="categories" class="col-sm-2 col-form-label">categories:</label>
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
            <label for="content" class="col-sm-2 col-form-label">Content:</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="content" id="content"
                    placeholder="Just Write ...">{{ old('content') }}</textarea>
            </div>
        </div>

    </form>
@endsection
@section('footer')
    <script type="text/javascript" src="{{ asset('js/froala_editor.pkgd.min.js') }}"></script>
    <script>
        new FroalaEditor('#content');
        $('#saveForm').click(function() {
            $('#newPost').submit();
        });
    </script>
@endsection
