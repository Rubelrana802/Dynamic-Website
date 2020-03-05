@extends('layouts.master')

@section('title', 'Profile')

@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Profile</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- Profile Image -->
                    <div class="card card-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header text-white"
                             style="background: url({{ asset('img/cover.png') }}) center center;">
                            <h3 class="widget-user-username">{{ Auth::user()->name }}</h3>
                        </div>
                        <div class="widget-user-image">
                            <img class="img-circle" src="{{ asset('img/user-avatar.png') }}"
                                 alt="{{ Auth::user()->name }}">
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-4 border-right">
                                    <strong><i class="fas fa-user mr-1"></i> Name</strong>
                                    <p class="text-muted">
                                        {{ Auth::user()->name }}
                                    </p>
                                </div>
                                <div class="col-sm-4 border-right">
                                    <strong><i class="fas fa-envelope mr-1"></i> Email</strong>
                                    <p class="text-muted">
                                        {{ Auth::user()->email }}
                                    </p>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4">
                                    @if(Auth::user()->activation_status == 1)
                                        <strong><i class="fas fa-unlock mr-1"></i> Status</strong>
                                        <p class="text-muted">
                                            <span class="badge bg-success">Active</span>
                                        </p>
                                    @else
                                        <strong><i class="fas fa-lock mr-1"></i> Status</strong>
                                        <p class="text-muted">
                                            <span class="badge bg-danger">Inactive</span>
                                        </p>
                                    @endif
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#update-profile" data-toggle="tab">Update Profile</a></li>
                                <li class="nav-item"><a class="nav-link" href="#change-password" data-toggle="tab">Change Password</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="tab-content">
                                        <div class="active tab-pane" id="update-profile">
                                            <update-profile :user_id="'{{ Auth::user()->id }}'" :name="'{{ Auth::user()->name }}'" :email="'{{ Auth::user()->email }}'"></update-profile>
                                        </div>
                                        <!-- /.tab-pane -->
                                        <div class="tab-pane" id="change-password">
                                            <change-password></change-password>
                                        </div>
                                        <!-- /.tab-pane -->
                                    </div>
                                    <!-- /.tab-content -->
                                </div>
                            </div>
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection

@push('style')
@endpush

@push('script')
@endpush
