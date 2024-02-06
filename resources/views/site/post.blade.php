@extends('layouts.app')
@section('content')
<div class="col-12 border rounded p-5">
    <h1 class="text-center" style="font-size: 22px;" dir="rtl">{{ $post->title }}</h1>
    <h6 class="text-center"><small>{{ date('Y-m-d', strtotime($post->created_at)) }}</small></h6>
    <hr>
    <div>{!! $post->short_content !!}</div>
    <div>{!! $post->content !!}</div>
</div>
@endsection
