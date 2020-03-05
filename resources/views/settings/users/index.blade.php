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
                        <li class="breadcrumb-item active">Users</li>
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
                            <h3 class="card-title mb-0"> Manage Users </h3>

                            @permission('create-user')
                            <div class="card-tools">
                                <a href="{{ route('admin.settings.users.create') }}" class="btn btn-primary btn-sm"> <i class="fas fa-user-plus"></i> Add User </a>
                            </div>
                            @endpermission
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $index => $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name  }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @foreach($user->roles as $role)
                                            <span class="badge bg-success">{{ $role->display_name }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary">{{ ucfirst($user->type) }}</span>
                                    </td>
                                    <td>
                                        @if($user->activation_status == 1)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Block</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ date("d F Y", strtotime($user->created_at)) }}
                                    </td>
                                    <td>
                                        @permission('read-user')
                                        <a href="{{ route('admin.settings.users.show', $user->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                                        @endpermission

                                        @permission('update-user')
                                        <a href="{{ route('admin.settings.users.edit', $user->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                        @endpermission
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                {{ $users->links() }}
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
@endpush
