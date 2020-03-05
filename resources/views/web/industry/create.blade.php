@extends('layouts.master')
@section('title', 'Industry')
@push('style')
@endpush
  
@section('main-content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Industrys</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.web.industry.create') }}">Website</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.web.industry.index') }}">Industrys</a></li>
                        <li class="breadcrumb-item active">Add New Industrys</li>
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
                            <h3 class="card-title mb-0">Industrys Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <form role="form" action="{{ route('admin.web.industry.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                                        @csrf
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="title">Location <span class="text-danger">*</span></label>
                                                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter Location Name">
                                                         @error('title')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div> 
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="phone">Phone <span class="text-danger">*</span></label>
                                                        <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="Enter phone">
                                                         @error('phone')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-6">
                                                     <div class="form-group">
                                                        <label for="phone1">Another Phone</label>
                                                        <input type="number" name="phone1" class="form-control" id="phone" placeholder="Enter another phone">
                                                    </div> 
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email">
                                                         @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="address">Address <span class="text-danger">*</span></label>
                                                        <textarea rows="1" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Write here..."></textarea>
                                                         @error('address')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div> 
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="address1"></label>
                                                        <textarea rows="1" name="address1" class="form-control" placeholder="Write here..."></textarea>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="text-right">
                                            <a href="{{ route('admin.web.industry.index') }}" class="btn btn-danger"><i class="fas fa-times"></i> Cancel </a>
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
