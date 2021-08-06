@extends('admin.layout.app')
@section('title','property')
@section('css')
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endsection
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Properties</h1>
            </div>
            {{-- <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Properties</li>
                </ol>
            </div> --}}
        </div>
    </div>
</div>
<!-- /.content-header -->
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Title</th>
                                    <th>Floor area</th>
                                    <th>Bedroom</th>
                                    <th>Price</th>
                                    <th>City</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script src="{{ asset('admin_assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('admin_assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script>
        let table = $("#example1").DataTable({
            processing: true,
            serverSide: true,
            order: [[ 0, "desc" ]],
            ajax: {
                type: "post",
                url: "{{route('admin.property.propertyDT')}}",
                data: {"_token": "{{ csrf_token() }}" }
            },
            columnDefs: [{
                    "orderable": false,
                    "targets": [6]
                },{
                    "visible": false,
                    "targets": [0]
            }],
            columns: [
                { data: 'id', name: 'id' },
                { data: 'title', name:'title' },
                { data: 'floor_area', name:'floor_area' },
                { data: 'bedrom', name:'bedrom' },
                { data: 'price', name:'price' },
                { data: 'city', name:'city' },
                { data: 'action', name: 'action', render: function (data, type, row) {
                        let editUrl = "{{ route('admin.property.edit',':id')}}";
                        editUrl = editUrl.replace(':id',row.id);
                        let deleteUrl = "{{ route('admin.property.destroy',':id')}}";
                        deleteUrl = deleteUrl.replace(':id',row.id);
                        let showUrl = "{{ route('admin.property.show',':id')}}";
                        showUrl = showUrl.replace(':id',row.id);
                        return '<div class="row"><div class="col-md-12"><a href="'+showUrl+'"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;<a href="'+editUrl+'"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;<a href="javascript:void(0)" class="deleteRecord" data-href="'+deleteUrl+'"><i class="fa fa-trash"></i></a></div></div>';
                    }
                }
            ]
        });

        $(document).on('click','.deleteRecord',function(){
            let delUrl = $(this).data('href');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'DELETE',
                        url: delUrl,
                        data: { '_token': "{{ csrf_token() }}" },
                        success: function(resp){
                            if(resp.code == 202){
                                toastr.success(resp.message);
                                table.ajax.reload();
                            }
                        }
                    });
                }
            });
        });
    </script>
@endpush
