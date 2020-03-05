@extends('layouts.master')

@section('title', 'Categories')

@push('style')

@endpush

@section('main-content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Categories</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('admin/settings') }}">settings</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.settings.category.index') }}">Categories</a></li>
                        <li class="breadcrumb-item active">Add Category</li>
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
                            <h3 class="card-title mb-0">Add Category</h3>

                            <div class="card-tools">
                                <a href="{{ route('admin.settings.category.index') }}" class="btn btn-primary btn-sm"> <i class="fas fa-table"></i> Manage Categories </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <form role="form" action="{{ route('admin.settings.category.store') }}" method="post" autocomplete="off">
                                        @csrf
                                        <div class="form-group">
                                            <label for="status">Category Type <span class="text-danger">*</span></label>
                                            <select name="category_type" class="form-control @error('category_type') is-invalid @enderror" id="status">
                                                <option value="" disabled selected>Select One</option>
                                                <option value="1">Products</option>
                                                <option value="2">Services</option>
                                                <option value="3">Blog</option>
                                            </select>
                                            @error('category_type')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="category_name">Category Name <span class="text-danger">*</span></label>
                                            <input type="text" name="category_name" class="form-control @error('category_name') is-invalid @enderror" id="category_name" value="{{ old('category_name') }}" placeholder="Enter category name">
                                            @error('category_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="details">Details <span class="text-danger"></span></label>
                                            <textarea name="details" rows="4" class="form-control @error('details') is-invalid @enderror" id="details" placeholder="Enter details">{{ old('details') }}</textarea>
                                            @error('details')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="text-center">
                                            <a href="{{ route('admin.settings.category.index') }}" class="btn btn-danger"><i class="fas fa-times"></i> Cancel </a>
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


