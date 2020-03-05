@extends('website.index')


@section('content')

    
<!-- Sub banner start -->
<div class="sub-banner">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>Contact us</h1>
            <ul class="breadcrumbs">
                <li><a href="{{ route('homePage') }}">Home</a></li>
                <li class="active">Contact us</li>
            </ul>
        </div>
    </div>
</div>
<!-- Sub Banner end -->

<!-- Contact 2 start -->
<div class="contact-2 content-area-5">
    <div class="container">
        <!-- Main title -->
        <div class="main-title text-center">
            <h1>Contact Us</h1>
            <p>We waited until we could do it right. Then we did! Instead of creating a carbon copy.</p>
        </div>

        @if(Session::has('message'))
            <div class="alert alert-success alert-dismissible fade show col-md-7" role="alert">
                <strong>{{ Session::get('message') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        
        <form action="{{ route('contact.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group name">
                                <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group email">
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group subject">
                                <input type="text" name="subject" class="form-control" placeholder="Enter Subject" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group number">
                                <input type="text" name="phone" class="form-control" placeholder="Enter Mobile Number" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group message">
                                <textarea class="form-control" name="details" placeholder="Write message" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="send-btn text-center">
                                <button type="submit" class="btn btn-md button-theme">Send Message</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="col-lg-5">
                <div class="contact-info">
                    <div class="media">
                        <i class="flaticon-phone"></i>
                        <div class="media-body">
                            <h5>Phone:</h5>
                            <p><a href="tel:+{{ $contact->phone }}">+{{ $contact->phone }}</a></p>
                        </div>
                    </div>
                    <div class="media">
                        <i class="flaticon-mail"></i>
                        <div class="media-body">
                            <h5>Email:</h5>
                            <p><a href="#">{{ $contact->email }}</a></p>
                        </div>
                    </div>
                    <div class="media">
                        <i class="flaticon-internet"></i>
                        <div class="media-body">
                            <h5>Web:</h5>
                            <p><a href="#">{{ $contact->website }}</a></p>
                        </div>
                    </div>
                    <div class="media mb-0">
                        <i class="flaticon-fax"></i>
                        <div class="media-body">
                            <h5>Fax:</h5>
                            <p><a href="#">+{{ $contact->fax }}</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact 2 end -->

<!-- Google map start -->
<div class="section">
    <div class="map">
        <div id="map" class="contact-map">
            <iframe src="{{ $contact->googlemap }}" width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </div>
    </div>
</div>
<!-- Google map end -->

@endsection