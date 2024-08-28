@extends('layouts.admin')
@section('page-title', 'Show Category ' . $category->name)
@section('content-title', 'Category: ' . $category->name)
@section('content-header-tools')
    <form method="post" action="{{ route('category.destroy', $category->slug) }}">
        @csrf
        @method('delete')
        <a href="{{ route('category.index') }}" class="btn btn-primary"><i class="fas fa-chevron-left"></i> Back</a>
        <a href="{{ route('category.edit', $category->slug) }}" class="btn btn-warning"><i class="fas fa-edit"></i>
            Edit</a>
        <button onclick="return confirm('Are You Sure Delete This Category?');" class="btn btn-danger"><i
                class="fas fa-trash"></i>
            Delete</a>
    </form>
@endsection
@section('content')
    <p><i class="far fa-check-square"></i> ID: <strong>{{ $category->id }}</strong></p>
    <p><i class="far fa-check-square"></i> Slug: <strong>{{ $category->slug }}</strong></p>
    <p><i class="far fa-check-square"></i> Name: <strong>{{ $category->name }}</strong></p>
    <p><i class="far fa-check-square"></i> Created at: <strong>{{ $category->created_at }}</strong></p>
    <p><i class="far fa-check-square"></i> Updated at: <strong>{{ $category->updated_at }}</strong></p>
@endsection
