@extends('layouts.master')
@section('title', 'Products')

@push('style')

@endpush
 
@section('main-content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Products</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.web.wProduct.index') }}">Website</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.web.wProduct.index') }}">Products</a></li>
                        <li class="breadcrumb-item active">Add New Products</li>
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
                            <h3 class="card-title mb-0">Products Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-5">
                                    <form role="form" action="{{ route('admin.web.wProduct.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                                        @csrf
                                        <div class="form-group">
                                            <label for="status">Product Category <span class="text-danger">*</span></label>
                                            <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" id="status">                                                
                                                <option value="" disabled selected>Select One</option>
                                                @foreach($category as $cat)
                                                    <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Product Title <span class="text-danger">*</span></label>
                                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" id="title" placeholder="Enter title">
                                            <span><small class="text-info text-right">0 / 50 max.</small></span>
                                                @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div> 
                                        <div class="form-group">
                                            <label for="image"> Product Image <span class="text-danger">*</span></label>
                                            <div class="custom-file">                                                          
                                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                                                <span><small class="text-info">Product image size 467x600 pixel.</small></span>
                                                @error('image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group pad">
                                            <label for="details">Short details <span class="text-danger">*</span></label>
                                            <textarea rows="2" name="details" class="form-control" placeholder="Write here...">{{ old('details') }}</textarea>
                                            <span><small class="text-info text-right">0 / 150 max.</small></span>
                                                @error('details')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group pad">
                                            <label for="details2">Long Details</label>
                                            <textarea rows="8" name="details2" class="form-control" placeholder="Write here...">{{ old('details2') }}</textarea>
                                                @error('details2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="text-center">
                                            <a href="{{ route('admin.web.wProduct.index') }}" class="btn btn-danger"><i class="fas fa-times"></i> Cancel </a>
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
