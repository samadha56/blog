@extends('layouts.app')
@section('content')
    <h1 class="mb-3"><i class="fa-solid fa-bookmark"></i> Category: {{ $category->name }}</h1>
    @forelse ($posts as $key => $post)
        <div class="col-12 border rounded p-5 {{ $key > 0 ? 'mt-3' : '' }}">
            <h1 class="text-center" style="font-size: 22px;"><a
                    href="{{ route('site.post.show', $post->slug) }}">{{ $post->title }}</a></h1>
            <h6 class="text-center"><small>{{ date('Y-m-d', strtotime($post->created_at)) }}</small></h6>
            <div>{!! $post->short_content !!}</div>
            <hr>
            <div class="text-center"><a href="{{ route('site.post.show', $post->slug) }}">continues ...</a></div>
        </div>
    @empty
        <strong>Unfortunately, I don't have any items to show :(</strong>
    @endforelse
    <div class="col-12 mt-3">
        {{ $posts->links('pagination::bootstrap-4') }}
    </div>
@endsection
