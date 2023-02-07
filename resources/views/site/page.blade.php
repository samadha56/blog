@extends('layouts.app')
@section('content')
<div class="col-12 border rounded p-5">
    <h1 class="text-center" style="font-size: 22px;">{{ $page->title }}</h1>
    <hr>
    <div>{!! $page->content !!}</div>
</div>
@endsection
