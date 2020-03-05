@extends('website.index')


@section('content')

    
- Sub banner start -->
<div class="sub-banner">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>Product</h1>
            <ul class="breadcrumbs">
                <li><a href="{{ route('homePage') }}">Home</a></li>
                <li class="active">Product</li>
            </ul>
        </div>
    </div>
</div>
<!-- Sub Banner end -->

<!-- Product start -->
<div class="featured-properties content-area">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>All Products</h1>
            <p>Find your properties in your city</p>
        </div>
        <div class="row">            
            @foreach($products as $product)
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="property-box-4">
                    <div class="property-photo clip-home">
                        <img class="img-fluid" src="{{ asset('web/image/product/'. $product->image) }}" alt="{{ $product->title }}">
                        <div class="tag">{{ $product->category->category_name }}</div>
                    </div>
                    <div class="detail">
                        <div class="heading">
                            <h3>
                                <a href="{{ route('productDetailsPage', $product->id ) }}">{{ $product->title }}</a>
                            </h3>
                            <div class="location">
                                <p>{{ str_limit($product->details, '150')}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
                {{ $products->links() }}
            </ul>
        </div>
    </div>
</div>
<!--  Product start -->


@endsection