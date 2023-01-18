@extends('layouts.app')
@section('content')
    @foreach ($posts as $post)
        <div class="col-12 border rounded p-5">
            <h1 class="text-center" style="font-size: 22px;"><a href="{{ route('site.post.show', $post->slug) }}">{{ $post->title }}</a></h1>
            <h6 class="text-center"><small>{{ date('Y-m-d', strtotime($post->created_at)) }}</small></h6>
            <p>{!! $post->content !!}</p>
            <h6 class="text-center"> <a href="{{ route('site.post.show', $post->slug) }}"> Read More ... مطالعه بیشتر </a></h6>
            <hr>
        </div>
    @endforeach
@endsection
