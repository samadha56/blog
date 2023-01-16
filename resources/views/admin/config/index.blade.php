@extends('layouts.admin')
@section('page-title', 'Config ')
@section('content-title', 'Config List')
@section('content-header-tools')
    <a id="saveForm" class="btn btn-primary"><i class="fas fa-save"></i> Save</a>
@endsection
@section('content')
    <form action="{{ route('admin.config.update') }}" method="post" id="configUpdateForm">
        @csrf
        @foreach ($configs as $config)
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">{{ $config->name }}</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="{{ $config->slug }}" name="config[{{ $config->slug }}]"
                        placeholder="{{ $config->name }}" value="{{ $config->content }}">
                </div>
            </div>
        @endforeach
    </form>
@endsection
@section('footer')
    <script>
        $('#saveForm').click(function() {
            $('#configUpdateForm').submit();
        });
    </script>
@endsection
