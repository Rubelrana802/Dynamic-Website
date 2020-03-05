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
                        <li class="breadcrumb-item"><a href="{{ route('admin.web.about.index') }}">Website</a></li>
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
                            <div class="card-tools">
                                <form class="form-inline">
                                    
                                    <a class="btn btn-primary btn-sm mr-2" href="{{ route('admin.web.about.index') }}"><i class="fa fa-tasks"></i> Manage About</a>
                                </form>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <form role="form" action="{{ route('admin.web.about.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                                        @csrf
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="title">About <span class="text-danger">*</span></label>
                                                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter about">
                                                         @error('title')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                <label for="paragraph">Details <span class="text-danger">*</span></label>
                                                <textarea rows="15" name="paragraph" class="form-control  @error('paragraph') is-invalid @enderror" placeholder="Enter about details..."></textarea>
                                                 @error('paragraph')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                </div>
                                            </div>
                                        <div class="text-center">
                                            <a href="{{ route('admin.web.about.index') }}" class="btn btn-danger"><i class="fas fa-times"></i> Cancel </a>
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
