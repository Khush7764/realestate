@extends('admin.layout.app')
@section('title','property')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit property</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.property.index') }}">Properties</a>
                    </li>
                    <li class="breadcrumb-item active">Edit property</li>
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
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Quick Example</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{ route('admin.property.update',$property->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ $property->title }}" placeholder="Enter title">
                                @error('title')
                                    <small class="text-danger">{{ $errors->first('title') }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" id="price" name="price" value="{{ $property->price }}" placeholder="Enter price">
                                @error('price')
                                    <small class="text-danger">{{ $errors->first('price') }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="floor_area">Floor area</label>
                                <input type="text" class="form-control" id="floor_area" name="floor_area" value="{{ $property->floor_area }}" placeholder="Enter floor area">
                                @error('floor_area')
                                    <small class="text-danger">{{ $errors->first('floor_area') }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="bedrom">Bedroom</label>
                                <input type="number" class="form-control" id="bedrom" name="bedrom" value="{{ $property->bedrom }}" placeholder="Enter bedroom">
                                @error('bedrom')
                                    <small class="text-danger">{{ $errors->first('bedrom') }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="bathroom">Bathroom</label>
                                <input type="number" class="form-control" id="bathroom" name="bathroom" value="{{ $property->bathroom }}" placeholder="Enter bathroom">
                                @error('bathroom')
                                    <small class="text-danger">{{ $errors->first('bathroom') }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="city">city</label>
                                <input type="text" class="form-control" id="city" name="city" value="{{ $property->city }}" placeholder="Enter city">
                                @error('city')
                                    <small class="text-danger">{{ $errors->first('city') }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ $property->address }}" placeholder="Enter Bedroom">
                                @error('address')
                                    <small class="text-danger">{{ $errors->first('address') }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" id="description" name="description" value="{{ $property->description }}" placeholder="Enter description">
                                @error('description')
                                    <small class="text-danger">{{ $errors->first('description') }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="near_by_places">Near by places</label>
                                <input type="text" class="form-control" id="near_by_places" name="near_by_places" value="{{ $property->near_by_places }}" placeholder="Enter near by places">
                                @error('near_by_places')
                                    <small class="text-danger">{{ $errors->first('near_by_places') }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="featured_image">Featured image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="featured_image" name="featured_image">
                                        <label class="custom-file-label" for="featured_image">Choose file</label>
                                    </div>
                                </div>
                                @error('featured_image')
                                    <small class="text-danger">{{ $errors->first('featured_image') }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="gallery_images">Gallery image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="gallery_images" name="gallery_images[]" multiple>
                                        <label class="custom-file-label" for="gallery_images">Choose file</label>
                                    </div>
                                </div>
                                @error('gallery_images')
                                    <small class="text-danger">{{ $errors->first('gallery_images') }}</small>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer float-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('admin.property.index') }}" role="button" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.main-content -->
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('admin_assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script type="text/javascript">
        $(function () {
          bsCustomFileInput.init();
        });
    </script>
@endpush
