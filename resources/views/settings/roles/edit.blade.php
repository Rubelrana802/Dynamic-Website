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
                                    <form name="add_book_form"
                                          action="{{route('admin.settings.roles.update', $role->id)}}" role="form"
                                          method="post">
                                        {{method_field('PATCH')}}
                                        {{csrf_field()}}

                                        <label for="name">Name of Role <span class="text-danger">*</span></label>
                                        <div
                                            class="form-group{{ $errors->has('name') ? ' has-error' : '' }} has-feedback">
                                            <input type="text" name="name" id="name" class="form-control"
                                                   value="{{ $role->name }}" placeholder="Enter role name..">
                                            @if ($errors->has('name'))
                                                <span class="help-block">
								<strong>{{ $errors->first('name') }}</strong>
							</span>
                                            @endif
                                        </div>
                                        <!-- /.form-group -->
                                        <label for="display_name">Display Name <span
                                                class="text-danger">*</span></label>
                                        <div
                                            class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }} has-feedback">
                                            <input type="text" name="display_name" id="display_name"
                                                   class="form-control" value="{{ $role->display_name }}"
                                                   placeholder="Enter display name..">
                                            @if ($errors->has('display_name'))
                                                <span class="help-block">
								<strong>{{ $errors->first('display_name') }}</strong>
							</span>
                                            @endif
                                        </div>
                                        <!-- /.form-group -->
                                        <label for="description">Description <span class="text-danger">*</span></label>
                                        <div
                                            class="form-group{{ $errors->has('description') ? ' has-error' : '' }} has-feedback">
                                            <input type="text" name="description" id="description" class="form-control"
                                                   value="{{ $role->description }}" placeholder="Enter display name..">
                                            @if ($errors->has('description'))
                                                <span class="help-block">
								<strong>{{ $errors->first('description') }}</strong>
							</span>
                                            @endif
                                        </div>
                                        <!-- /.form-group -->

                                        <label for="description">Permissions <span class="text-danger">*</span></label>
                                        <div
                                            class="form-group{{ $errors->has('permission[]') ? ' has-error' : '' }} has-feedback">
                                            @foreach($permissions as $permission)
                                                <input type="checkbox"
                                                       {{in_array($permission->id,$role_permissions)?"checked":""}} name="permission[]"
                                                       value="{{$permission->id}}" style="margin-bottom: 8px;"> <span
                                                    style="font-size: 14px; font-weight: 400;">{{$permission->display_name}}</span>
                                                <br>
                                            @endforeach
                                        </div>
                                        <!-- /.form-group -->

                                        <div class="form-group pull-right">
                                            <a href="{{ route('admin.settings.roles.index') }}"
                                               class="btn btn-danger btn-flat" data-dismiss="modal"><i
                                                    class="fa fa-close"></i> Close</a>
                                            <button type="submit" class="btn btn-info btn-flat"><i
                                                    class="fa fa-save"></i> Update
                                            </button>
                                        </div>
                                        <!-- /.form-group -->

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
