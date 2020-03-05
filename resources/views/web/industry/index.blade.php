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
                                <form class="form-inline">
                                    <div class="input-group mr-sm-2 input-group-sm">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Search</div>
                                        </div>
                                        <input name="from_date" id="search" type="text" class="form-control" placeholder="Search here" autocomplete="off">
                                    </div>
                                    <a class="btn btn-primary btn-sm mr-2" href="{{ route('admin.web.industry.create') }}"><i class="fa fa-plus"></i> Add Industrys</a>
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
                                    <th>Location</th>
                                    <th>Phone</th>
                                    <th>Alt. Phone</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>  
                                <tbody id="tbody">
                                @foreach($industrys as $index => $industry)
                                <tr>
                                    <td>{{ ++$index}}</td>
                                    <td>{{ $industry->title }}</td>
                                    <td>{{ $industry->phone }}</td>
                                    <td>{{ $industry->phone1 }}</td>
                                    <td>{{ $industry->email }}</td>
                                    <td>{{ str_limit($industry->address, '10')}} {{ str_limit($industry->address1, '10')}}</td>
                                    <td>{{ $industry->user->name}}</td>
                                    <td>{{ $industry->created_at}}</td>
                                    <td>{{ $industry->updated_at}}</td>
                                    <td>
                                        <a href="{{ route('admin.web.industry.show' , $industry->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('admin.web.industry.edit', $industry->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
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
