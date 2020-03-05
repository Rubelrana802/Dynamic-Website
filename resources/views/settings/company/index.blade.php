@extends('layouts.master')

@section('title', 'Company')

@push('style')
@endpush

@section('main-content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Company</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.settings.index') }}">Settings</a></li>
                        <li class="breadcrumb-item active">Company</li>
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
                            <h3 class="card-title mb-0"> Manage Company </h3>

                            <div class="card-tools">
                                <div class="input-group mt-0">
                                        <div class="input-group-append">
                                            <!-- <button class="btn btn-success ml-5" type="button" onclick="printDiv('printable_area')"><i class="fa fa-print"></i> Print</button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                        <div id="printable_area">
                            <table class="table table-hover">
				           		<thead>
									<tr>
										<th>SL.</th>
										<th>Company Title</th>
										<th>Company Name</th>
										<th>Address</th>
										<th>Company Mobile</th>
										<th>Factory Mobile</th>
										<th>Website</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($company as $row)							
									<tr>
										<td>1</td>
										<td>{{ $row->title }}</td>
										<td>{{ $row->company_name }}</td>
										<td>{{ $row->address }}</td>
										<td>{{ $row->mobile }}</td>
										<td>{{ $row->phone }}</td>
										<td style="text-align:right !Important">{{ $row->website }}</td>
										<td class="text-center">
										<a href="{{ route('admin.settings.company.show', $row->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('admin.settings.company.edit', $row->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
										</td>
									</tr>
                                    @endforeach
								</tbody>
								</table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

@endsection
