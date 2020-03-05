@extends('layouts.master')

@section('title', 'Categories')

@push('style')
@endpush

@section('main-content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Categories</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">settings</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.settings.category.index') }}">Categories</a></li>
                        <li class="breadcrumb-item active">Category Details</li>
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
                            <h3 class="card-title mb-0">Category Details</h3>

                            <div class="card-tools">
                                <a href="{{ route('admin.settings.category.index') }}" class="btn btn-primary btn-sm"> <i class="fas fa-table"></i> Manage Categories </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-6 table-responsive p-0">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <th>Category Id</th>
                                            <td>{{ $category->id }}</td>
                                        </tr>
                                        <tr>
                                            <th>Category Name</th>
                                            <td>{{ $category->category_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Details</th>
                                            <td>{!! $category->details !!}</td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td>
                                                @if($category->status == 1)
                                                    <span class="badge bg-success">Published</span>
                                                @else
                                                    <span class="badge bg-danger">Unpublished</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Created At</th>
                                            <td>{{ date("d F Y : h:ia", strtotime($category->created_at)) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Updated At</th>
                                            <td>{{ date("d F Y : h:ia", strtotime($category->updated_at)) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Actions</th>
                                            <td>
                                                <a href="{{ route('admin.settings.category.edit', $category->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
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
