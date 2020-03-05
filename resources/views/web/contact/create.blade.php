@extends('layouts.master')
@section('title', 'Contacts')
@push('style')
@endpush
  
@section('main-content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Contacts</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.web.contact.create') }}">Website</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.web.contact.index') }}">Contacts</a></li>
                        <li class="breadcrumb-item active">Add New Contacts</li>
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
                            <h3 class="card-title mb-0">Contacts Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <form role="form" action="{{ route('admin.web.contact.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                                        @csrf
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="title">Title <span class="text-danger">*</span></label>
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
                                                        <label for="title">Logo <span class="text-danger">*</span></label>
                                                        <input type="file" name="image" class="form-control @error('logo') is-invalid @enderror" id="logo" placeholder="Enter title">
                                                        <span><small class="text-info"> Logo size 300x300 pixel</small></span>
                                                        @error('logo')
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
                                                        <label for="phone">Phone <span class="text-danger">*</span></label>
                                                        <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="Enter phone">
                                                         @error('phone')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
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
                                                        <textarea rows="3" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Write here..."></textarea>
                                                         @error('address')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div> 
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="text-center">
                                            <a href="{{ route('admin.web.contact.index') }}" class="btn btn-danger"><i class="fas fa-times"></i> Cancel </a>
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
