@extends('admin.layout.app')
@section('title','profile')
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
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="{{ !empty(Auth::user()->image) ? asset('storage/avatar').'/'.Auth::user()->image : asset('admin_assets/dist/img/user4-128x128.jpg') }}" alt="User profile picture">
                        </div>
                        <h3 class="profile-username text-center">{{ Str::title(Auth::user()->name) }}</h3>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#profile" data-toggle="tab">Profile</a></li>
                            <li class="nav-item"><a class="nav-link" href="#changepass" data-toggle="tab">Change password</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="profile">
                                <form class="form-horizontal" method="post" action="{{ route('admin.profile') }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputName" placeholder="Name" name="name" value="{{ Auth::user()->name }}">
                                            @error('name')
                                                <small class="text-danger">{{$errors->first('name')}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email" value="{{ Auth::user()->email }}">
                                            @error('email')
                                                <small class="text-danger">{{$errors->first('email')}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputExperience" class="col-sm-2 col-form-label">Image</label>
                                        <div class="col-sm-10">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="gallery_images" name="image">
                                                    <label class="custom-file-label" for="gallery_images">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row float-right pr-1">
                                        <div class="col-12">
                                            <a href="{{ route('admin.property.index') }}" class="btn btn-secondary" role="button">Cancel</a>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="changepass">
                                <form action="{{ route('admin.changepassword') }}" class="form-horizontal" method="post">
                                    @csrf
                                    @method('PATCH')<div class="form-group row">
                                        <label for="oldpass" class="col-sm-2 col-form-label">Old Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="oldpass" placeholder="Old Password" name="old_password">
                                            @error('old_password')
                                                <small class="text-danger">{{ $errors->first('old_password') }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-sm-2 col-form-label">New password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="password" placeholder="New password" name="password">
                                            @error('password')
                                                <small class="text-danger">{{ $errors->first('password') }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="confirmpass" class="col-sm-2 col-form-label">Confirm password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="confirmpass" placeholder="Confirm password" name="password_confirmation">
                                            @error('password_confirmation')
                                                <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row float-right pr-1">
                                        <div class="col-12">
                                            <a href="{{ route('admin.property.index') }}" class="btn btn-secondary" role="button">Cancel</a>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('admin_assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script type="text/javascript">
        $(function () {
          bsCustomFileInput.init();
        });
    </script>
@endpush
