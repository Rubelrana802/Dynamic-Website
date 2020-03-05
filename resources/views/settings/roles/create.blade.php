@extends('layouts.master')

@section('title', 'Roles')

@push('style')

@endpush

@section('main-content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Roles</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.settings.index') }}">Settings</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.settings.roles.index') }}">Roles</a></li>
                        <li class="breadcrumb-item active">Role Details</li>
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
                            <h3 class="card-title mb-0">Role Details</h3>

                            <div class="card-tools">
                                <a href="{{ route('admin.settings.roles.index') }}" class="btn btn-primary btn-sm"> <i
                                        class="fas fa-roles"></i> Manage Roles </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <form name="add_book_form" action="{{route('admin.settings.roles.store')}}"
                                          role="form" method="post" autocomplete="off">
                                        {{ csrf_field() }}

                                        <div class="form-group">
                                            <label for="name">Name of Role <span class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" placeholder="Enter role name">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="display_name">Display Name <span class="text-danger">*</span></label>
                                            <input type="text" name="display_name" class="form-control @error('display_name') is-invalid @enderror" id="display_name" value="{{ old('display_name') }}" placeholder="Enter display name">
                                            @error('display_name')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="description">Description <span class="text-danger">*</span></label>
                                            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="description" value="{{ old('description') }}" placeholder="Enter description">
                                            @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <label for="description">Permissions <span class="text-danger">*</span></label>
                                        <div
                                            class="form-group{{ $errors->has('description') ? ' has-error' : '' }} has-feedback">
                                            @foreach($permissions as $permission)
                                                <input type="checkbox" name="permission[]" value="{{$permission->id}}">
                                                <span>{{$permission->display_name}}</span>
                                                <br>
                                            @endforeach
                                        </div>
                                        <!-- /.form-group -->

                                        <div class="text-right">
                                            <a href="{{ route('admin.settings.roles.index') }}" class="btn btn-danger"><i class="fas fa-times"></i> Cancel </a>
                                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Submit </button>
                                        </div>

                                    </form>
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
