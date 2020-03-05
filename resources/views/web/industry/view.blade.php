@extends('layouts.master')
 
@section('title', 'Industrys')

@push('style')
@endpush
   
@section('main-content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Industrys</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.web.industry.index') }}">Website</a></li>
                        <li class="breadcrumb-item active">Industrys</li>
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
                            <h3 class="card-title mb-0"> Manage Industrys </h3>

                            <div class="card-tools">
                            <div class="input-group mt-0">
                                    <input type="text" class="form-control" placeholder="Seach Here..." id="search" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary btn-sm" type="button"><i class="fa fa-search"></i></button>
                                           <!--  <a href="{{ route('admin.web.industry.create') }}" class="btn btn-primary ml-5"> <i class="fas fa-user-plus"></i> Add Industrys </a> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-6 table-responsive p-0">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <th>SL</th>
                                            <td>{{ $industry->id }}</td>
                                        </tr>
                                        <tr>
                                            <th>Title</th>
                                            <td>{{ $industry->title }}</td>
                                        </tr>
                                        <tr> 
                                            <th>Phone</th>
                                             <td>{{ $industry->phone }}</td>
                                        </tr>   
                                        <tr>
                                            <th>Another Phone</th>
                                            <td>{{ $industry->phone1 }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                           <td>{{ $industry->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Address</th>
                                            <td>{{ $industry->address}} {{ $industry->address1}}</td>
                                        </tr>
                                        <tr>
                                            <th>Created By</th>
                                            <td>{{ $industry->user->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Created At</th>
                                            <td>{{ $industry->created_at }}</td>
                                        </tr>
                                        <tr>
                                            <th>Updated At</th>
                                            <td>{{ $industry->updated_at }}</td>
                                        </tr>
                                        <tr>
                                            <th>Actions</th>
                                            <td>
                                                <a href="{{ route('admin.web.industry.edit', $industry->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
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
