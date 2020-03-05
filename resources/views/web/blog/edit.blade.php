@extends('layouts.master')
@section('title', 'Blogs')
@push('style')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.css" rel="stylesheet">
@endpush
 
@section('main-content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Blogs</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.web.blog.index') }}">Website</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.web.blog.index') }}">Blogs</a></li>
                        <li class="breadcrumb-item active">Add New Blogs</li>
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
                            <h3 class="card-title mb-0">Blogs Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <form role="form" action="{{ route('admin.web.blog.update', $blog->id) }}" method="post" enctype="multipart/form-data" autocomplete="off">
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-group">
                                            <label for="status">Blog Category <span class="text-danger">*</span></label>
                                            <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" id="status">                                                
                                                <option value="" disabled selected>Select One</option>
                                                @foreach($category as $cat)
                                                    <option value="{{ $cat->id }}" {{ $blog->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->category_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Blog Title<span class="text-danger">*</span></label>
                                            <input type="text" value="{{ $blog->title }}" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter title">
                                            <span><small class="text-info text-right">0 / 150 max.</small></span>
                                                @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="image">Blog Image  </label>
                                            <div class="custom-file">                                                          
                                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                                                <span><small class="text-info">Blog image size 800x500 pixel.</small></span><br>
                                                <img style="height: 150px;" src="{{ asset('web/image/blog/'.$blog->image )}}" alt="Blog" class="img-fluid mt-2">

                                            </div>
                                        </div>
                                        <div class="form-group mt-5">
                                            <label for="details">Details</label>
                                            <textarea id="summernote" rows="2" name="details" class="form-control" placeholder="Write here...">{!! $blog->details !!}</textarea>
                                        </div>

                                        <input type="hidden" name="blog_id" value="{{ $blog->id }}">

                                        <div class="text-center">
                                            <a href="{{ route('admin.web.blog.index') }}" class="btn btn-danger"><i class="fas fa-times"></i> Cancel </a>
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
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.js"></script>
<script>
      $('#summernote').summernote({
        placeholder: 'Blog details',
        tabsize: 2,
        height: 300
      });
    </script>
@endpush
