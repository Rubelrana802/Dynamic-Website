@extends('website.index')


@section('content')

    
<!-- Sub banner start -->
<div class="sub-banner">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>Services</h1>
            <ul class="breadcrumbs">
                <li><a href="{{ route('homePage') }}">Home</a></li>
                <li class="active">Services</li>
            </ul>
        </div>
    </div>
</div>
<!-- Sub Banner end -->

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


@endsection