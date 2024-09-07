@extends('layouts.app')
@section('content')
    <div class="col-12 border rounded p-5">
        <h1 class="text-center" style="font-size: 22px;" dir="rtl">{{ $post->title }}</h1>
        <h6 class="text-center"><small>{{ date('Y-m-d', strtotime($post->created_at)) }}</small></h6>
        <hr>
        <div>{!! $post->short_content !!}</div>
        <div>{!! $post->content !!}</div>
    </div>
    <hr>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('site.comments.store') }}" method="POST">
        @csrf
        <input type="hidden" name="post_id" value="{{ $post->id }}">

        <div class="mb-3">
            <label for="author_name" class="form-label">Name:</label>
            <input type="text" name="author_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Comment:</label>
            <textarea name="content" class="form-control" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit Comment</button>
    </form>

    <hr>
    @foreach ($comments as $comment)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $comment->author_name }}</h5>
                <p class="card-text">{{ $comment->content }}</p>
                <p class="card-text"><small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small></p>
            </div>
        </div>
    @endforeach
@endsection
