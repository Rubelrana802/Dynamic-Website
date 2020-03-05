@extends('website.index')


@section('content')

    
<!-- Sub banner start -->
<div class="sub-banner">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>News</h1>
            <ul class="breadcrumbs">
                <li><a href="{{ route('homePage') }}">Home</a></li>
                <li class="active">News</li>
            </ul>
        </div>
    </div>
</div>
<!-- Sub Banner end -->

<!-- Blog start -->
<div class="featured-properties content-area">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>News</h1>
            <p>Find your properties in your city</p>
        </div>
        <div class="row">
            @foreach($blogs as $blog)
            <div class="col-lg-4 col-md-6 col-sm-6">
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
                        <!-- <p>{{ str_limit($blog->details, '50') }}</p> -->
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!--  blog end -->

@endsection