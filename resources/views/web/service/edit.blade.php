@extends('layouts.master')
@section('title', 'Service')
@push('style')
@endpush
 
@section('main-content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Service</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.web.service.index') }}">Website</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.web.service.index') }}">Service</a></li>
                        <li class="breadcrumb-item active">Add New Service</li>
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
                            <h3 class="card-title mb-0">Service Details</h3>
                            <div class="input-group-append float-sm-right">
                            <a href="{{ route('admin.web.service.index') }}" class="btn btn-primary btn-sm"> <i class="fas fa-tasks"></i> Manage Service </a></div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <form role="form" action="{{ route('admin.web.service.update', $service->id) }}" method="post" enctype="multipart/form-data" autocomplete="off">
                                        @csrf
                                        @method('PATCH')
                                        
                                            <div class="form-group">
                                                <label for="title">Service Title <span class="text-danger">*</span></label>
                                                <input type="text" name="title" value="{{ $service->title }}" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter title">
                                                    @error('title')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="icon">Service Icon<span class="text-danger">*</span></label>
                                                <input type="text" name="icon" class="form-control @error('icon') is-invalid @enderror" value="{{ $service->icon }}" id="icon" placeholder="fa-home">
                                                    @error('icon')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div> 

                                            <div class="form-group ">
                                                <label for="inputEmail3">Status <i class="text-danger"></i> </label>                                                 
                                                    <select class="form-control @error('status') is-invalid @enderror" name="status">
                                                            <option value="1">Active</option>
                                                            <option value="0">Inactive</option>
                                                    </select>
                                                    @error('status')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="image"> Service Image  </label>
                                                <div class="custom-file">                                                          
                                                    <input type="file"  name="image" class="form-control"> 
                                                    <span><small class="text-info">Main Service image size 1920x790 pixel.</small></span>  <br>
                                                    <img style="height: 100px" src="{{ asset('web/image/service/'.$service->image )}}" alt="talukder" class="img-fluid mt-2">
                                                </div>
                                            </div>
                                                
                                            <div class="form-group mt-5">
                                                <label for="details">Service Details <span class="text-danger">*</span></label>
                                                <textarea rows="8" name="details" class="form-control @error('details') is-invalid @enderror" placeholder="Write here...">{{ $service->details }}</textarea>
                                                    @error('details')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                           <input type="hidden" value="{{ $service->id }}" name="service_id">

                                  
                                        <div class="text-center">
                                            <a href="{{ route('admin.web.service.index') }}" class="btn btn-danger"><i class="fas fa-times"></i> Cancel </a>
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
