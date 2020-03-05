@extends('layouts.master')
@section('title', 'Slider')
@push('style')
@endpush
 
@section('main-content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Slider</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.web.slider.index') }}">Website</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.web.slider.index') }}">Slider</a></li>
                        <li class="breadcrumb-item active">Add New Slider</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mb-0">Slider Details</h3>
                            <div class="input-group-append float-sm-right">
                            <a href="{{ route('admin.web.slider.index') }}" class="btn btn-primary btn-sm"> <i class="fas fa-tasks"></i> Manage Slider </a></div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <form role="form" action="{{ route('admin.web.slider.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                                        @csrf
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="title">Slider Title<span class="text-danger">*</span></label>
                                                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter title">
                                                         @error('title')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div> 
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="image"> Slider Image<span class="text-danger">*</span></label>
                                                        <div class="custom-file">                                                          
                                                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                                                            <span><small class="text-info">Main slider image size 1920x1080 pixel.</small></span>
                                                        @error('image')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror                                                      
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                    <label for="details">Slider Details<span class="text-danger">*</span></label>
                                                    <textarea rows="3" name="details" class="form-control @error('details') is-invalid @enderror" placeholder="Write here..."></textarea>
                                                     @error('details')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <a href="{{ route('admin.web.slider.index') }}" class="btn btn-danger"><i class="fas fa-times"></i> Cancel </a>
                                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Submit </button>
                                        </div> 
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection

@push('script')
  
@endpush
