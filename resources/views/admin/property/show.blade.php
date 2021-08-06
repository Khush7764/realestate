@extends('admin.layout.app')
@section('title','property deatils')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Property details</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.property.index') }}">Properties</a>
                    </li>
                    <li class="breadcrumb-item active">Property details</li>
                </ol>
            </div>
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
                            <tbody>
                                <tr>
                                    <th>Title</th>
                                    <td>{{ $pro->title }}</td>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <td>{{ $pro->price }}</td>
                                </tr>
                                <tr>
                                    <th>Floor area</th>
                                    <td>{{ $pro->floor_area }}</td>
                                </tr>
                                <tr>
                                    <th>Bedroom</th>
                                    <td>{{ $pro->bedrom }}</td>
                                </tr>
                                <tr>
                                    <th>Bathroom</th>
                                    <td>{{ $pro->batdroom }}</td>
                                </tr>
                                <tr>
                                    <th>City</th>
                                    <td>{{ $pro->city }}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{ $pro->address }}</td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>{{ $pro->description }}</td>
                                </tr>
                                <tr>
                                    <th>Near_by_places</th>
                                    <td>{{ $pro->near_by_places }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
