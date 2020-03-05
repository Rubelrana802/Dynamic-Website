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
                        <li class="breadcrumb-item"><a href="{{ route('admin.settings.company.index') }}">Company</a></li>
                        <li class="breadcrumb-item active">Company Details</li>
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
                            <h3 class="card-title mb-0">Company Details</h3>

                            <div class="card-tools">
                                <a href="{{ route('admin.settings.company.index') }}" class="btn btn-primary btn-sm"> <i class="fas fa-table"></i> Manage Company </a>
                            </div>
                        </div>
                        <!-- /.card-header --><br><br>
                        <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="{{ asset('img/'.$company->logo ) }}" alt="User profile picture">
                                </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-6 table-responsive p-0">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <th>Company Title</th>
                                            <td>{{ $company->title }}</td>
                                        </tr>
                                        <tr>
                                            <th>Company Name</th>
                                            <td>{{ $company->company_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Company Mobile</th>
                                            <td>{{ $company->mobile }}</td>
                                        </tr>
                                        <tr>
                                            <th>Factory Mobile</th>
                                            <td>{{ $company->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th> Email</th>
                                            <td>{{ $company->email }}</td>
                                        </tr>
                                        
                                        <tr>
                                            <th> Address</th>
                                            <td>{{ $company->address }}</td>
                                        </tr>
                                        <tr>
                                            <th>Created At</th>
                                            <td>{{ date("d F Y : h:ia", strtotime($company->created_at)) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Updated At</th>
                                            <td>{{ date("d F Y : h:ia", strtotime($company->updated_at)) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Actions</th>
                                            <td>
                                                <a href="{{ route('admin.settings.company.edit', $company->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
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
