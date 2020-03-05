@extends('layouts.master')
@section('title', 'Abouts')
@push('style')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.css" rel="stylesheet">
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
                        <li class="breadcrumb-item"><a href="{{ route('admin.web.about.index') }}">Abouts</a></li>
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
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <form role="form" action="{{ route('admin.web.about.update' , $about->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                                                               
                                            <div class="form-group">
                                                <label for="title">About <span class="text-danger">*</span></label>
                                                <input type="text" name="title" value="{{ $about->title}}" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter about">
                                                    @error('title')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div> 

                                            <div class="form-group">
                                                <label for="image">About Image <span class="text-danger">*</span></label>
                                                <div class="custom-file">                                                          
                                                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"> 
                                                    <span><small class="text-info">About Image size 750X500 pixel.</small></span><br>
                                                    <img style="width: 150px; height: 100px;" src="{{ asset('web/image/' . $about->image) }}" alt="{{ $about->title }}" class="img-fluid hover-shadow">
                                                @error('image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror                                                      
                                                </div>
                                            </div>

                                            <div class="form-group mt-5">
                                                <label for="short_about">Short About <span class="text-danger">*</span></label>
                                                <textarea rows="5" name="short_about" class="form-control @error('short_about') is-invalid @enderror" placeholder="Write here...">{{ $about->short_about}}</textarea>
                                                <span><small class="text-info">0 / 500 max </small></span>
                                                @error('short_about')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div> 

                                            <div class="form-group">
                                                <label for="paragraph">Details <span class="text-danger">*</span></label>
                                                <textarea id="summernote" name="paragraph" class="form-control @error('paragraph') is-invalid @enderror" placeholder="">{{ $about->paragraph}}</textarea>
                                                    @error('paragraph')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div> 

                                            <div class="container">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="facebook">Facebook <span class="text-danger">*</span></label>
                                                        <input type="text" name="facebook" class="form-control @error('facebook') is-invalid @enderror" id="facebook" value="{{ $about->facebook }}" placeholder="Enter facebook link" >
                                                         @error('facebook')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div> 
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="twitter">Twitter <span class="text-danger">*</span></label>
                                                        <input type="text" name="twitter" class="form-control @error('twitter') is-invalid @enderror" id="twitter" value="{{ $about->twitter }}" placeholder="Enter twitter link">
                                                         @error('twitter')
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
                                                        <label for="youtube">Youtube <span class="text-danger">*</span></label>
                                                        <input type="text" name="youtube" class="form-control @error('youtube') is-invalid @enderror" id="youtube" value="{{ $about->youtube }}" placeholder="Enter youtube link">
                                                         @error('youtube')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div> 
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="phone">Linkedin <span class="text-danger">*</span></label>
                                                        <input type="text" name="linkedin" class="form-control @error('linkedin') is-invalid @enderror" id="linkedin" value="{{ $about->linkedin }}" placeholder="Enter linkedin link">
                                                         @error('linkedin')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div> 
                                                </div>
                                            </div>
                                        </div><br>
                                        
                                        <hr>
                                             
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
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.js"></script>
<script>

      $('#summernote').summernote({
        placeholder: 'Enter about',
        tabsize: 2,
        height: 300
      });


    </script>
@endpush
