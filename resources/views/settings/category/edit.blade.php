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
                        <li class="breadcrumb-item"><a href="#">Productions</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.settings.category.index') }}">Categories</a></li>
                        <li class="breadcrumb-item active">Edit Category Info</li>
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
                            <h3 class="card-title mb-0">Edit Category Info</h3>

                            <div class="card-tools">
                                <a href="{{ route('admin.settings.category.index') }}" class="btn btn-primary btn-sm"> <i class="fas fa-table"></i> Manage Categories </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <form name="category-edit-form" role="form" action="{{ route('admin.settings.category.update', $category->id) }}" method="post" autocomplete="off">
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-group">
                                            <label for="status">Category Type <span class="text-danger">*</span></label>
                                            <select name="category_type" class="form-control @error('category_type') is-invalid @enderror" id="status">
                                                <option value="" disabled selected>Select One</option>
                                                <option value="1">Products</option>
                                                <option value="2">Services</option>
                                            </select>
                                            @error('category_type')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="category_name">Category Name <span class="text-danger">*</span></label>
                                            <input type="text" name="category_name" class="form-control @error('category_name') is-invalid @enderror" id="category_name" value="{{ $category->category_name }}" placeholder="Enter category name">
                                            @error('category_name')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="status">Status <span class="text-danger">*</span></label>
                                            <select name="status" class="form-control @error('status') is-invalid @enderror" id="status">
                                                <option value="" disabled selected>Select One</option>
                                                <option value="1">Published</option>
                                                <option value="0">Unpublished</option>
                                            </select>
                                            @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="details">Details <span class="text-danger"></span></label>
                                            <textarea name="details" rows="4" class="form-control @error('details') is-invalid @enderror" id="details" placeholder="Enter details">{{ $category->details }}</textarea>
                                            @error('details')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="text-right">
                                            <a href="{{ route('admin.settings.category.index') }}" class="btn btn-danger"><i class="fas fa-times"></i> Cancel </a>
                                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update </button>
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
    <script type="text/javascript">
        document.forms['category-edit-form'].elements['status'].value = "{{ $category->status }}";
    </script>
@endpush
