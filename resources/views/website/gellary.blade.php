@extends('website.index')


@section('content')

    
<!-- Sub banner start -->
<div class="sub-banner">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>Gallery</h1>
            <ul class="breadcrumbs">
                <li><a href="{{ route('homePage') }}">Home</a></li>
                <li class="active">Gallery</li>
            </ul>
        </div>
    </div>
</div>
<!-- Sub Banner end -->

<!-- Gallery start -->
<div class="photo-gallery content-area">
    <div class="container">
        <div class="main-title text-center">
            <h1 class="mb-30">Properties Gallery</h1>
            <ul class="list-inline-listing filters filteriz-navigation">
                <li class="active btn filtr-button filtr" data-filter="all">All</li>
                @foreach($category as $cat)
                <li data-filter="{{ $cat->id }}" class="btn btn-inline filtr-button filtr">{{ $cat->category_name }}</li>
                @endforeach
            </ul>
        </div>
        <div class="row filter-portfolio" style="padding: 0px; position: relative; height: 1052px;">
            <div class="cars">

                @foreach($gallerys as $gallery)
                    <div class="col-lg-4 col-md-6 col-sm-6 filtr-item" data-category="{{ $gallery->category_id }}" style="opacity: 1; transform: scale(1) translate3d(380px, 0px, 0px); backface-visibility: hidden; perspective: 1000px; transform-style: preserve-3d; position: absolute; transition: all 0.5s ease-out 0ms; pointer-events: auto;">
                        <div class="portfolio-item mt-2">
                            <a href="{{ asset('web/image/gallery/'. $gallery->image ) }}" title="{{ $gallery->title }}">
                                <img src="{{ asset('web/image/gallery/'. $gallery->image ) }}" alt="{{ $gallery->title }}" class="img-fluid">
                            </a>
                            <div class="portfolio-content">
                                <div class="portfolio-content-inner">
                                    <p>{{ $gallery->title }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach                
            </div>
        </div>
    </div>
</div>
<!-- Gallery end -->

@endsection