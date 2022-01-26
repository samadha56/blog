@extends('layouts.admin')
@section('page-title', 'All Posts')
@section('content-title', 'All Posts')
@section('content')
    <div class="m-content">
        <!--Begin::Section-->
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-tools">
                    <a href="{{ route('post.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus-square"></i> Write New Post
                    </a>
                </div>
            </div>
            <hr>
            <div class="m-portlet__body">
                <table class="table table-bordered table-hover table-in-simple text-center" id="dataTables">
                    <thead>
                        <tr>
                            <th class="table-row-count">Row</th>
                            <th>title</th>
                            <th>Slug</th>
                            <th>Create Time</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                    </tbody>
                </table>
            </div>
        </div>

        <!--End::Section-->

    </div>
@endsection

@section('footer')
    <script>
        $('#dataTables').DataTable({
            orderCellsTop: true,
            searchable: true,
            serverSide: true,
            deferRender: true,
            order: [
                [0, 'desc']
            ],
            ajax: {
                url: '{{ route('admin.post.datatable') }}',
                "type": "POST",
                "data": function(d) {
                    d._token = '{{ csrf_token() }}';
                }
            },
            columns: [{
                    data: 'indexColumn'
                },
                {
                    data: 'title'
                },
                {
                    data: 'slug'
                },
                {
                    data: 'created_at'
                },
                {
                    data: 'options',
                    orderable: false,
                    searchable: false
                },
            ]
        });
    </script>
@endsection
