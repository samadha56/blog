@extends('layouts.admin')
@section('page-title', 'All Comments')
@section('content-title', 'All Comments')
@section('content')
    <div class="m-content">
        <!--Begin::Section-->
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__body">
                <table class="table table-bordered table-hover table-in-simple text-center" id="dataTables">
                    <thead>
                        <tr>
                            <th class="table-row-count">Row</th>
                            <th>post_id</th>
                            <th>author_name</th>
                            <th>content</th>
                            <th>status</th>
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
                url: '{{ route('admin.comment.datatable') }}',
                "type": "POST",
                "data": function(d) {
                    d._token = '{{ csrf_token() }}';
                }
            },
            columns: [{
                    data: 'indexColumn'
                },
                {
                    data: 'post_id'
                },
                {
                    data: 'author_name'
                },
                {
                    data: 'content'
                },
                {
                    data: 'status'
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
