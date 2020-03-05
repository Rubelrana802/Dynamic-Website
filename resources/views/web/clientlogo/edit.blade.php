@extends('layouts.master')
@section('title', 'Abouts')
@push('style')
@endpush
  
@section('main-content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Abouts</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.web.client-logo.index') }}">Website</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.web.client-logo.index') }}">Abouts</a></li>
                        <li class="breadcrumb-item active">Add New Abouts</li>
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
                            <h3 class="card-title mb-0">Abouts Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <form role="form" action="{{ route('admin.web.client-logo.update' , $logo->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-group">
                                            <label for="title">Title <span class="text-danger">*</span></label>
                                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ $logo->title }}" placeholder="Enter title">
                                            <span><small class="text-info">0 / 150 max</small></span>
                                                @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div> 
                                               
                                        <div class="form-group">
                                            <label for="image"> Client image <span class="text-danger">*</span> </label>
                                            <div class="custom-file">                                                          
                                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"> 
                                                <span><small class="text-info">Client logo size 172X88 pixel.</small></span><br>
                                                <img src="{{ asset('web/image/clientlogo/'. $logo->image) }}" alt="{{ $logo->title }}">
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror                                                      
                                        </div>
                                        <input type="hidden" name="logo_id" value="{{ $logo->id }}">
                                        <div class="text-center mt-5">
                                            <a href="{{ route('admin.web.client-logo.index') }}" class="btn btn-danger"><i class="fas fa-times"></i> Cancel </a>
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
