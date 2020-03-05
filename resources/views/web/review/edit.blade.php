@extends('layouts.master')
@section('title', 'Reviews')
@push('style')
@endpush
 
@section('main-content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Reviews</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.web.review.index') }}">Website</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.web.review.index') }}">Reviews</a></li>
                        <li class="breadcrumb-item active">Add New Reviews</li>
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
                            <h3 class="card-title mb-0">Reviews Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <form role="form" action="{{ route('admin.web.review.update', $review->id) }}" method="post" enctype="multipart/form-data" autocomplete="off">
                                        @csrf
                                        @method('PATCH')
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">Name<span class="text-danger">*</span></label>
                                                        <input type="text" name="name" value="{{ $review->name }}" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter name">
                                                         @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div> 
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="image"> Photo  </label>
                                                        <div class="custom-file">                                                          
                                                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"> 
                                                            <span><small class="text-info">Reviewer image size 300x180 pixel.</small></span>
                                                            @error('image')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror                                                      
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="container">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="star">Review<span class="text-danger">*</span></label>
                                                        <input type="text" name="star" value="{{ $review->star }}" class="form-control @error('star') is-invalid @enderror" id="star" placeholder="">
                                                         @error('star')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div> 
                                                </div>
                                                <div class="col-md-6">
                                                <img width="80px" border-radius="50%" src="{{ asset('web/image/review/'.$review->image)}}" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container">
                                            <div class="form-group">
                                            <label for="details">Details<span class="text-danger">*</span></label>
                                            <textarea rows="8" name="details" class="form-control  @error('details') is-invalid @enderror" placeholder="Write here...">{{ $review->details }}</textarea>
                                             @error('details')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            </div>
                                        </div>
                                        <input type="hidden" name="review_id" value="{{ $review->id }}">
                                        <div class="text-center">
                                            <a href="{{ route('admin.web.review.index') }}" class="btn btn-danger"><i class="fas fa-times"></i> Cancel </a>
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
