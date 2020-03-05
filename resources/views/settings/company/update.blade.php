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
                        <li class="breadcrumb-item active">Edit Company Info</li>
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
                            <h3 class="card-title mb-0">Edit Company Info</h3>

                            <div class="card-tools">
                                <a href="{{ route('admin.settings.company.index') }}" class="btn btn-primary btn-sm"> <i class="fas fa-units"></i> Manage Company </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <form action="{{ route('admin.settings.company.update', $company->id) }}" class="form-vertical" id="insert_customer" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                        @csrf
                                        @method('PATCH')
                                    <div class="panel-body">
                                        <div class="form-group row">
                                            <label for="bank_name" class="col-sm-3 col-form-label">Comapny Title <i class="text-danger">*</i></label>
                                            <div class="col-sm-6">
                                                <input type="text" tabindex="2" class="form-control" name="title" value="{{ $company->title }}" placeholder="Comapny title" required tabindex="1"/>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="bank_name" class="col-sm-3 col-form-label">Comapny Name <i class="text-danger">*</i></label>
                                            <div class="col-sm-6">
                                                <input type="text" tabindex="2" class="form-control" name="company_name" value="{{ $company->company_name }}" required placeholder="Comapny Name" tabindex="1"/>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="bank_name" class="col-sm-3 col-form-label">Comapny Mobile <i class="text-danger">*</i></label>
                                            <div class="col-sm-6">
                                                <input type="text" tabindex="3" class="form-control" name="mobile" name="mobile" value="{{ $company->mobile }}"  placeholder="Comapny Mobile" required tabindex="2"/>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="bank_name" class="col-sm-3 col-form-label">Factory Mobile <i class="text-danger">*</i></label>
                                            <div class="col-sm-6">
                                                <input type="text" tabindex="3" class="form-control" name="phone" name="phone" value="{{ $company->phone }}"  placeholder="Factory Mobile" required tabindex="2"/>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="bank_name" class="col-sm-3 col-form-label">Comapny Email <i class="text-danger">*</i></label>
                                            <div class="col-sm-6">
                                                <input type="email" tabindex="3" class="form-control" value="{{ $company->email }}" name="email" placeholder="Comapny Email" required tabindex="4"/>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="bank_name" class="col-sm-3 col-form-label">Comapny Logo <i class="text-danger"></i></label>
                                            <div class="col-sm-6">
                                                <input type="file" tabindex="3" class="form-control" name="logo"/> 
                                                <img style="height=50px;" class="profile-user-img img-fluid mt-2" src="{{ asset('img/'.$company->logo ) }}" alt="User profile picture">

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="bank_name" class="col-sm-3 col-form-label">Comapny Website <i class="text-danger">*</i></label>
                                            <div class="col-sm-6">
                                                <input type="url" tabindex="3" class="form-control" value="{{ $company->website }}" name="website" placeholder="Website" required tabindex="5"/>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="bank_name" class="col-sm-3 col-form-label">Comapny Address <i class="text-danger">*</i></label>
                                            <div class="col-sm-6">
                                                <textarea class="form-control" rows="3" name="address" placeholder="Enter Company Address">{{ $company->address }}</textarea>
                                            </div>
                                        </div>

                                        <input type="hidden" name="company_id" value="{{ $company->id }}" />

                                        <div class="form-group row">
                                        <label for="bank_name" class="col-sm-5 col-form-label"><i class="text-danger"></i></label>
                                            <div class="col-sm-4">
                                                <a href="{{ route('admin.settings.company.index') }}" class="btn btn-danger"><i class="fas fa-times"></i> Cancel </a>
                                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update </button>
                                            </div>
                                        </div>
                                    </div>
                                    </form></div>
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
