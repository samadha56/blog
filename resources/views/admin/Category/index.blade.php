@extends('layouts.admin')
@section('page-title', 'All Category')
@section('content-title', 'All Categories')
@section('content')
    <div class="m-content">
        <!--Begin::Section-->
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-tools">
                    <a href="{{ route('category.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus-square"></i> Create New Category
                    </a>
                </div>
            </div>
            <hr>
            <div class="m-portlet__body">
                <table class="table table-bordered table-hover table-in-simple text-center" id="dataTables">
                    <thead>
                        <tr>
                            <th class="table-row-count">Row</th>
                            <th>Slug</th>
                            <th>Name</th>
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
                url: '{{ route('category.datatable') }}',
                "type": "POST",
                "data": function(d) {
                    d._token = '{{ csrf_token() }}';
                }
            },
            columns: [{
                    data: 'indexColumn'
                },
                {
                    data: 'slug'
                },
                {
                    data: 'name'
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
