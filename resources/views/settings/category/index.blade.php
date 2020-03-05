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
                        <li class="breadcrumb-item"><a href="{{ url('admin/settings') }}">Suppliers</a></li>
                        <li class="breadcrumb-item active">Categories</li>
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
                            <h3 class="card-title mb-0"> Manage Categories </h3>

                            <div class="card-tools">
                            <div class="input-group mt-0">
                                        <div class="input-group-append">
                                            <a href="{{ route('admin.settings.category.create') }}" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i> Add Category </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                        <div id="printable_area">
                            <table class="table table-hover" id="myTable">
                                <thead>
                                <tr>
                                    <th>Sl.</th>
                                    <th>Category Name</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody id="tbody">
                                @foreach($categories as $index => $category)
                                <tr>
                                    <td> {{ ++$index }} </td>
                                    <td>{{ $category->category_name  }}</td>
                                    <td>
                                        @if($category->status == 1)
                                            <span class="badge bg-success">Published</span>
                                        @else
                                            <span class="badge bg-danger">Unpublished</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ date("d F Y", strtotime($category->created_at)) }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.settings.category.show', $category->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('admin.settings.category.edit', $category->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
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
                                {{ $categories->links() }}
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
