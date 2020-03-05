@extends('layouts.master')
 
@section('title', 'Blogs')

@push('style')
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
                        <li class="breadcrumb-item"><a href="{{ route('admin.web.blog.create') }}">Website</a></li>
                        <li class="breadcrumb-item active">Blogs</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

      <section class="content">
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mb-0"> Manage Blogs </h3>

                            <div class="card-tools">
                                <form class="form-inline">
                                    <div class="input-group mr-sm-2 input-group-sm">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Search</div>
                                        </div>
                                        <input name="from_date" id="search" type="text" class="form-control" placeholder="Search here" autocomplete="off">
                                    </div>
                                    <a class="btn btn-primary btn-sm mr-2" href="{{ route('admin.web.blog.create') }}"><i class="fa fa-plus"></i> Add Blogs</a>
                                </form>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                        <div id="printable_area">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Date</th>
                                    <th>Blog View</th>
                                    <th>Image</th>
                                    <th>Title</th>                                    
                                    <th>Details</th>
                                    <th>Created By</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>  
                                <tbody id="tbody">
                                @foreach($blogs as $index => $blog)
                                <tr>
                                    <td>{{ ++$index}}</td>
                                    <td>{{ $blog->date }}</td>
                                    <td>{{ $blog->view }}</td>
                                    <td><img style="width: 100px; heigh: 120px;" src="{{ asset('web/image/blog/'.$blog->image) }}" alt="{{ $blog->title }}"></td>
                                    <td>{{ $blog->title }}</td>
                                    <td>{!! str_limit($blog->details, '400') !!}</td>
                                    <td>{{ $blog->user->name}}</td>                                   
                                     
                                    <td>
                                        <a href="{{ route('admin.web.blog.edit' , $blog->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>                            
                        </div>
                    </div>

                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                {{ $blogs->links() }}
                            </ul>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tbody tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
@endpush
