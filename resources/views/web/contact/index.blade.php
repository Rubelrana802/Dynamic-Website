@extends('layouts.master')
 
@section('title', 'Contacts')

@push('style')
@endpush
  
@section('main-content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Contacts</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.web.contact.index') }}">Website</a></li>
                        <li class="breadcrumb-item active">Contacts</li>
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
                            <h3 class="card-title mb-0"> Manage Contacts </h3>

                            <div class="card-tools">
                                <form class="form-inline">
                                    <div class="input-group mr-sm-2 input-group-sm">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Search</div>
                                        </div>
                                        <input name="from_date" id="search" type="text" class="form-control" placeholder="Search here" autocomplete="off">
                                    </div>
                                    <!-- <a class="btn btn-primary btn-sm mr-2" href="{{ route('admin.web.contact.create') }}"><i class="fa fa-plus"></i> Add Contacts</a> -->
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
                                    <th>Title</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>  
                                <tbody id="tbody">
                                @foreach($contacts as $index => $contact)
                                <tr>
                                    <td>{{ ++$index}}</td>
                                    <td>{{ $contact->title }}</td>
                                    <td>{{ $contact->phone }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->address }} {{ $contact->address }}</td>
                                    <td>{{ $contact->user->name}}</td>
                                    <td>{{ $contact->created_at}}</td>
                                    <td>{{ $contact->updated_at}}</td>
                                    <td>
                                        <a href="{{ route('admin.web.contact.edit', $contact->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
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
