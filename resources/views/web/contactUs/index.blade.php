@extends('layouts.master')
 
@section('title', 'Usres Contact ')

@push('style')
@endpush
  
@section('main-content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Usres Contact </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.web.contactUs.index') }}">Website</a></li>
                        <li class="breadcrumb-item active"> Usres Contact</li>
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
                            <h3 class="card-title mb-0"> Manage Usres Contact </h3>

                            <div class="card-tools">
                                <form class="form-inline">
                                    <div class="input-group mr-sm-2 input-group-sm">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Search</div>
                                        </div>
                                        <input name="from_date" id="search" type="text" class="form-control" placeholder="Search here" autocomplete="off">
                                    </div>
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Details</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>  
                                <tbody id="tbody">
                                @foreach($contactUs as $index => $contactUs)
                                <tr>
                                    <td>{{ ++$index}}</td>
                                    <td>{{ $contactUs->name}}</td>
                                    <td>{{ $contactUs->email }}</td>
                                    <td>{{ $contactUs->subject }}</td>
                                    <td style="width: 550px;">{{ str_limit($contactUs->details,'300') }}</td>                                    
                                    <td>{{ $contactUs->created_at}}</td>
                                    <td>
                                        <a href="{{ route('admin.web.contactUs.show' , $contactUs->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
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
