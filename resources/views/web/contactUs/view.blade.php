@extends('layouts.master')
 
@section('title', 'User Contact')

@push('style')
@endpush
   
@section('main-content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">User Contact</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.web.contactUs.index') }}">Website</a></li>
                        <li class="breadcrumb-item active">User Contact</li>
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
                            <h3 class="card-title mb-0">User Contact Details</h3>

                            <div class="card-tools">
                                <form class="form-inline">
                                    <div class="input-group mr-sm-2 input-group-sm">
                                        <div class="input-group-prepend">
                                        </div>
                                    </div>
                                    <a class="btn btn-primary btn-sm mr-2" href="{{ route('admin.web.contactUs.index') }}"><i class="fa fa-tasks"></i> Manage Contact Us</a>
                                </form>
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
                                            <td>{{ $contactUs->id }}</td>
                                        </tr>
                                        <tr>
                                            <th>Name</th>
                                            <td>{{ $contactUs->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                           <td>{{ $contactUs->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Subject</th>
                                            <td>{{ $contactUs->subject }}</td>
                                        </tr>
                                        <tr> 
                                            <th>Details</th>
                                             <td>{{ $contactUs->details }}</td>
                                        </tr>
                                        
                                        <tr>
                                            <th>Created At</th>
                                            <td>{{ $contactUs->created_at }}</td>
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
