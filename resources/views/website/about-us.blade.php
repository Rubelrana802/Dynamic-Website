@extends('website.index')


@section('content')

   <!-- Sub banner start -->
<div class="sub-banner">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>About Us</h1>
            <ul class="breadcrumbs">
                <li><a href="{{ route('homePage') }}">Home</a></li>
                <li class="active">About Us</li>
            </ul>
        </div>
    </div>
</div>
<!-- Sub Banner end -->

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
                    <p>{!! str_limit($abouts->short_about, '500') !!}</p>
                </div>
            </div>
        </div>
        <div class="row py-5">
            <div class="col-md-12 about-text">
                <p class="text-justify">{!! $abouts->paragraph !!}</p>
            </div>
        </div>
    </div>
</div>
<!-- About city estate end -->

@endsection