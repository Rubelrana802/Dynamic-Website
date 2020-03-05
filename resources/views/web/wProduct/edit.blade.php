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
                                    <form role="form" action="{{ route('admin.web.wProduct.update', $wProduct->id) }}" method="post" enctype="multipart/form-data" autocomplete="off">
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-group">
                                            <label for="status">Product Category <span class="text-danger">*</span></label>
                                            <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" id="status">                                                
                                                <option value="" disabled selected>Select One</option>
                                                @foreach($category as $cat)
                                                    <option value="{{ $cat->id }}" {{ $wProduct->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->category_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Product Title<span class="text-danger">*</span></label>
                                            <input type="text" value="{{ $wProduct->title }}" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter title">
                                            <span><small class="text-info text-right">0 / 50 max.</small></span>
                                                @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="image">Product Image  </label>
                                            <div class="custom-file">                                                          
                                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                                                <span><small class="text-info">Product image size 467x600 pixel.</small></span><br>
                                                <img style="height: 150px;" src="{{ asset('web/image/product/'.$wProduct->image )}}" alt="Product" class="img-fluid mt-2">

                                            </div>
                                        </div>
                                        <div class="form-group mt-5">
                                            <label for="details">Details</label>
                                            <textarea rows="2" name="details" class="form-control" placeholder="Write here...">{!! $wProduct->details !!}</textarea>
                                            <span class="text-right"><small class="text-info">0 / 150 max.</small></span>
                                        </div>

                                        <div class="form-group pad">
                                            <label for="details2">Long Details</label>
                                            <textarea rows="8" name="details2" class="form-control" placeholder="Write here...">{!! $wProduct->details2 !!}</textarea>
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
