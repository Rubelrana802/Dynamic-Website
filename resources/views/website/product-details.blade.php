@extends('website.index')


@section('content')

    
<!-- Sub banner start -->
<div class="sub-banner">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>Product Details</h1>
            <ul class="breadcrumbs">
                <li><a href="{{ route('homePage') }}">Home</a></li>
                <li class="active">Product Details</li>
            </ul>
        </div>
    </div>
</div>
<!-- Sub Banner end -->

<!-- Product Details start -->
<div class="blog-body content-area-5">
    <div class="container">
        <div class="main-title text-center">
            <h1>{{ $products->category->category_name }}</h1>
            <p>{{ $products->title }}</p>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- News 1 start -->
                <div class="blog-1 blog-big">
                    <div class="blog-photo">
                        <img style="height: 690px;" src="{{ asset('web/image/product/'. $products->image) }}" alt="{{ $products->title }}" class="img-fluid">
                    </div>
                    <div class="detail">
                        <p>
                            {{ $products->details2 }}
                        </p>
                        <br>
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="blog-tags">
                                    <!--<span>Tags</span>
                                    <a href="#">Features</a>
                                    <a href="#">Gallery</a>
                                    <a href="#">Slideshow</a>-->
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="blog-social-list">
                                    <span>Share</span>
                                    <a href="#" class="facebook-bg">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                    <a href="#" class="twitter-bg">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                    <a href="#" class="linkedin-bg">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  Product Details start -->

@endsection