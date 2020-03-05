@extends('layouts.master')
@section('title', 'Gallerys')
@push('style')
@endpush
 
@section('main-content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Gallerys</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.web.gallery.create') }}">Website</a></li>
                        <li class="breadcrumb-item active">Edit Gallerys</li>
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
                            <h3 class="card-title mb-0">Gallerys Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-5">
                                    <form role="form" action="{{ route('admin.web.gallery.update', $gallery->id) }}" method="post" enctype="multipart/form-data" autocomplete="off">
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-group">
                                            <label for="status">Category Type <span class="text-danger">*</span></label>
                                            <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" id="status">                                                
                                                <option value="" disabled selected>Select One</option>
                                                @foreach($category as $cat)
                                                    <option value="{{ $cat->id }}" {{ $gallery->category_id == $cat->id ? 'selected' : ''}}>{{ $cat->category_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Title <span class="text-danger">*</span></label>
                                            <input type="text" name="title" value="{{ $gallery->title }}" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter title">
                                            <span><small class="text-info text-right">0 / 50 max.</small></span>
                                                @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div> 
                                        <div class="form-group">
                                            <label for="image"> Photo</label>
                                            <div class="custom-file">                                                          
                                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"> 
                                                <span><small class="text-info">Gallery Image size 750x500 pixel.</small></span><br>
                                                <img style="width: 100px; height: 80px;" src="{{ asset('web/image/gallery/' . $gallery->image) }}" alt="{{ $gallery->title }}" class="img-fluid hover-shadow">
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror                                                      
                                            </div>
                                        </div>
                                                
                                        <div class="text-center">
                                            <a href="{{ route('admin.web.gallery.index') }}" class="btn btn-danger"><i class="fas fa-times"></i> Cancel </a>
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
