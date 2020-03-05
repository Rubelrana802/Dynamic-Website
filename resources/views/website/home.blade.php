@extends('website.index')


@section('content')
<!-- Banner start -->
<div class="banner banner" id="banner">
    <div id="bannerCarousole" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach($sliders as $index => $slider)
                <div class="carousel-item banner-max-height item-bg {{ $loop->first ? 'active' : '' }}">
                    <img class="d-block w-100" src="{{ asset('web/image/slider/'.$slider->image)}}" alt="{{ $slider->title }}">
                    <div class="carousel-caption banner-slider-inner d-flex h-100 text-center">
                        <div class="carousel-content container">
                            <div class="text-center">
                                <h1> {{ $slider->title }} </h1>
                                <p>{{ $slider->details }}</p>
                                <a href="{{ route('contactPage') }}" class="btn btn-lg btn-white-lg-outline"><i class="fa fa-envelope"></i> Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#bannerCarousole" role="button" data-slide="prev">
            <span class="slider-mover-left clip-home" aria-hidden="true">
                <i class="fa fa-angle-left"></i>
            </span>
        </a>
        <a class="carousel-control-next" href="#bannerCarousole" role="button" data-slide="next">
            <span class="slider-mover-right clip-home" aria-hidden="true">
                <i class="fa fa-angle-right"></i>
            </span>
        </a>
    </div>
</div>
<!-- Banner end -->

<!-- About city estate start -->
<div class="about-real-estate content-area-5">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <div class="about-info">
                    <img class="d-block w-100" src="{{ asset('web/image/'. $abouts->image ) }}" alt="{{ $abouts->title }}">
                    <!-- <div class="Properties-info">
                        <ul>
                            <li>
                                <i class="flaticon-bed"></i>
                                <h4>Bed 3</h4>
                            </li>
                            <li>
                                <i class="flaticon-bathroom"></i>
                                <h4>Beds 2</h4>
                            </li>
                            <li>
                                <i class="flaticon-area"></i>
                                <h4>SQ.FT 3500</h4>
                            </li>
                            <li>
                                <i class="flaticon-car"></i>
                                <h4>Garage 1</h4>
                            </li>
                            <li>
                                <i class="flaticon-window"></i>
                                <h4>Balcony 1</h4>
                            </li>
                        </ul>
                    </div> -->
                </div>
            </div>
            <div class="col-xl-7 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <div class="about-text">
                    <h3>{{ $abouts->title }}</h3>
                    <p>{!! $abouts->short_about !!}</p>
                    <a href="{{ route('aboutPage') }}" class="btn btn-md button-theme">Read More</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About city estate end -->

<!-- Services start -->
<div class="services services-4 py-5 bg-light">
    <div class="container">
        <!-- Main title -->
        <div class="main-title text-center">
            <h1>Our Services</h1>
            <p>Who you work with matters</p>
        </div>
        <div class="row">
            
            @foreach($services as $index => $service)
            <div class="col-lg-4 col-md-6">
                <div class="media service-info-2">
                    <div class="icon">
                        <i class="fab {{ $service->icon }}"></i>
                    </div>
                    <div class="media-body align-self-center">
                        <h2>{{ $service->title }}</h2>
                        <p>{{ str_limit($service->details, '85')}}</p>
                        <a class="rm-btn" href="{{ url('services/'.$service->id ) }}">Read more...</a>
                        <h4>0{{ ++$index }}</h4>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Services end -->

<!-- Products start -->
<div class="blog py-5">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Our Products</h1>
            <p>Check out some recent news posts.</p>
        </div>
        <!-- Slick slider area start -->
        <div class="slick-slider-area">
            <div class="row slick-carousel" data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                
                @foreach($products as $product)
                <div class="slick-slide-item">
                    <div class="property-box-4">
                        <div class="property-photo clip-home">
                            <img style="width: 467; height: 600px;" class="img-fluid" src="{{ asset('web/image/product/'. $product->image) }}" alt="{{ $product->title }}">
                            <div class="tag">{{ $product->category->category_name }}</div>
                        </div>
                        <div class="detail">
                            <div class="heading">
                                <h3>
                                    <a href="{{ route('productDetailsPage', $product->id ) }}">{{ $product->title }}</a>
                                </h3>
                                <div class="location">
                                    <p>{{ $product->details }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- Products end -->

<!-- Counters 4 strat -->
<div class="counters counters-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="counter-box">
                    <div class="icon clip-home">
                        <i class="flaticon-sale"></i>
                    </div>
                    <h1 class="counter Starting">967</h1>
                    <p class="text-light">Listings For Sale</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="counter-box">
                    <div class="icon clip-home">
                        <i class="flaticon-rent"></i>
                    </div>
                    <h1 class="counter Starting">1276</h1>
                    <p class="text-light">Listings For Rent</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="counter-box">
                    <div class="icon clip-home">
                        <i class="flaticon-user"></i>
                    </div>
                    <h1 class="counter Starting">396</h1>
                    <p class="text-light">Agents</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="counter-box">
                    <div class="icon clip-home">
                        <i class="flaticon-broker"></i>
                    </div>
                    <h1 class="counter Starting">177</h1>
                    <p class="text-light">Brokers</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Counters 4 end -->

<!-- News start -->
<div class="blog py-5">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Our Latest News</h1>
            <p>Check out some recent news posts.</p>
        </div>
        <!-- Slick slider area start -->
        <div class="slick-slider-area">
            <div class="row slick-carousel" data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                
                @foreach($blogs as $blog)
                <div class="slick-slide-item">
                    <div class="blog-2">
                        <div class="blog-photo clip-home">
                            <img src="{{ asset('web/image/blog/'. $blog->image ) }}" alt="{{ $blog->title }}" class="img-fluid bp">
                            <div class="date-box">
                                <span>{{ date("d", strtotime($blog->date)) }}</span>{{ date("M", strtotime($blog->date)) }}
                            </div>
                            <div class="profile-user">
                                <img src="{{ asset('img/user-avatar.png') }}" alt="user">
                            </div>
                        </div>
                        <div class="detail">
                            <div class="post-meta clearfix">
                                <ul>
                                    <li>
                                        <strong><a href="#">{{ $blog->user->name }}</a></strong>
                                    </li>
                                    <li class="float-right mr-0"><i class="fas fa-eye"></i>{{ $blog->view }}</li>
                                </ul>
                            </div>
                            <h4>
                                <a href="{{ route('blogDetailsPage', $blog->id ) }}">{{ $blog->title }}</a>
                            </h4>
                            <p>{{ str_limit($blog->details, '272') }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- News end -->

<!-- Partners strat -->
<div class="partners">
    <div class="container">
        <div class="slick-slider-area">
            <div class="row slick-carousel" data-slick='{"slidesToShow": 5, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 3}}, {"breakpoint": 768,"settings":{"slidesToShow": 2}}]}'>
                @foreach($logos as $logo)
                <div class="slick-slide-item"><img src="{{ asset('web/image/clientlogo/'. $logo->image ) }}" alt="brand" class="img-fluid"></div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- Partners end -->

@endsection