@extends('layouts.master')

@section('title', 'Users')

@push('style')
@endpush

@section('main-content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.settings.index') }}">Settings</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.settings.users.index') }}">Users</a></li>
                        <li class="breadcrumb-item active">User Details</li>
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
                            <h3 class="card-title mb-0">User Details</h3>

                            @permission('manage-users')
                            <div class="card-tools">
                                <a href="{{ route('admin.settings.users.index') }}" class="btn btn-primary btn-sm"> <i class="fas fa-users"></i> Manage Users </a>
                            </div>
                            @endpermission
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-6 table-responsive p-0">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <th>Name</th>
                                            <td>{{ $user->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>{{ $user->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Type</th>
                                            <td>
                                                <span class="badge bg-secondary">{{ ucfirst($user->type) }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td>
                                                @if($user->activation_status == 1)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger">Block</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Created At</th>
                                            <td>{{ date("d F Y", strtotime($user->created_at)) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Actions</th>
                                            <td>
                                                @permission('update-user')
                                                <a href="{{ route('admin.settings.users.edit', $user->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                                @endpermission
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
