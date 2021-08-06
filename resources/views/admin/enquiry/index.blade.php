@extends('admin.layout.app')
@section('title','property')
@section('css')
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Enquiry/Messages</h1>
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
                                    <th>Property details</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Message</th>
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
    <script>
        let table = $("#example1").DataTable({
            processing: true,
            serverSide: true,
            order: [[ 0, "desc" ]],
            ajax: {
                type: "post",
                url: "{{route('admin.enquiry.enquiryDT')}}",
                data: {"_token": "{{ csrf_token() }}" }
            },
            columnDefs: [{
                    "orderable": false,
                    "targets": [1,5]
                },{
                    "visible": false,
                    "targets": [0]
            }],
            columns: [
                { data: 'id', name: 'id', },
                { data: 'property_id', name:'property_id', render: function (data, type, row) {
                    let proDetailUrl = "{{ route('admin.property.show',':id') }}";
                    proDetailUrl = proDetailUrl.replace(':id',row.property_id);
                        return '<div class="row"><div class="col-md-12"><a href="'+proDetailUrl+'"><u>View details</u></a></div></div>';
                    }
                },
                { data: 'name', name:'title' },
                { data: 'email', name:'floor_area' },
                { data: 'contact', name:'bedrom' },
                { data: 'message', name:'price' },
            ]
        });

        /*$(document).on('click','.deleteRecord',function(){
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
        });*/
    </script>
@endpush
