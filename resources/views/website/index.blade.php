
<!DOCTYPE html>
<html lang="zxx">
<head>
    <!-- End Google Tag Manager -->
    <title>Sparrow</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">

    <!-- External CSS libraries -->
    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/bootstrap-submenu.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/leaflet.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('web/css/map.css') }}" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('web/fonts/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('web/fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('web/fonts/linearicons/style.css') }}">
    <link rel="stylesheet" type="text/css"  href="{{ asset('web/css/jquery.mCustomScrollbar.css') }}">
    <link rel="stylesheet" type="text/css"  href="{{ asset('web/css/dropzone.css') }}">
    <link rel="stylesheet" type="text/css"  href="{{ asset('web/css/slick.css') }}">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/style.css') }}">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="{{ asset('web/css/skins/default.css') }}">
    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{ asset('web/img/favicon.ico') }}" type="image/x-icon" >
    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,300,700">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/ie10-viewport-bug-workaround.css') }}">

    <!-- js warning -->
    <script  src="{{ asset('web/js/ie-emulation-modes-warning.js') }}"></script>

</head>
<body>
<!-- Main header start -->
<header class="main-header header-transparent sticky-header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" style="padding: 20px 0; float: left" href="{{ route('homePage') }}">
                <img src="{{ asset('web/img/logos/black-logo.png') }}" alt="logo" height="50">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="{{ route('homePage') }}" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="{{ route('aboutPage') }}" class="nav-link">About Us</a></li>
                    <li class="nav-item"><a href="{{ route('servicePage') }}" class="nav-link">Services</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{ route('allProductPage') }}" id="navbarDropdownMenuLink6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Products
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            @foreach($product_categories as $key => $product_category)
                            <li><a class="dropdown-item" href="{{ route('productPage', $product_category->id) }}">{{ $product_category->category_name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item"><a href="{{ route('gellaryPage') }}" class="nav-link">Gallery</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdownMenuLink7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            News
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            @foreach($blog_categories as $key => $blog_category)
                                <li><a class="dropdown-item" href="{{ route('newsPage', $blog_category->id ) }}">{{ $blog_category->category_name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item active"><a href="{{ route('contactPage') }}" class="nav-link">Contact Us</a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<!-- Main header end -->

    @yield('content')

<!-- Footer start -->
<footer class="footer">
    <div class="container footer-inner">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                <div class="footer-item clearfix">
                    <img src="{{ asset('web/image/logos/'. $contact->logo ) }}" alt="{{ $contact->title }}" class="f-logo">
                    <div class="text">
                        <p>{{ str_limit($about->short_about, '190')}} <span><a style="color: #eee" href="{{ route('aboutPage') }}">Read More</a></span> </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="footer-item">
                    <h4>Contact Us</h4>
                    <div class="f-border"></div>
                    <ul class="contact-info">
                        <li>
                            <i class="flaticon-pin"></i>{{ $contact->address }}
                        </li>
                        <li>
                            <i class="flaticon-mail"></i><a href="mailto:sales@usitsolution.net">{{ $contact->email }}</a>
                        </li>
                        <li>
                            <i class="flaticon-phone"></i><a href="tel:{{ $contact->phone }}"> {{ $contact->phone }} </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                <div class="footer-item">
                    <h4>
                        Useful Links
                    </h4>
                    <div class="f-border"></div>
                    <ul class="links">
                        <li>
                            <a href="{{ route('homePage') }}">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('aboutPage') }}">About Us</a>
                        </li>
                        <li>
                            <a href="{{ route('servicePage') }}">Services</a>
                        </li>
                        <li>
                            <a href="{{ route('contactPage') }}">Contact Us</a>
                        </li>                        
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="footer-item clearfix">
                    <h4>Subscribe</h4>
                    <div class="f-border"></div>
                    <div class="Subscribe-box">
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit.</p>
                        <form class="form-inline" action="{{ route('admin.web.subscribe.store') }}" method="post">
                            @csrf
                            <input type="email" name="email" class="form-control mb-sm-0 @error('email') is-invalid @enderror" id="inlineFormInputName3" placeholder="Email Address">
                            <button type="submit" class="btn"><i class="fa fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <p class="copy">© {{ date('Y') }} <a href="#">US IT Solution LLC.</a> All right reserved.</p>
                </div>
                <div class="col-lg-4 col-md-12">
                <ul class="social-list clearfix ">
                        <li><a href="{{ $about->facebook }}" class="facebook "><i class="fab fa-facebook-f "></i></a></li>
                        <li><a href="{{ $about->twitter }}" class="twitter "><i class="fab fa-twitter"></i></a></li>
                        <li><a href="{{ $about->youtube }}" class="youtube "><i class="fab fa-youtube"></i></a></li>
                        <li><a href="{{ $about->linkedin }}" class="linkedin "><i class="fab fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer end -->

<!-- Full Page Search -->
<div id="full-page-search">
    <button type="button" class="close">×</button>
    <form action="http://storage.googleapis.com/themevessel-products/neer/{{ route('homePage') }}#">
        <input type="search" value="" placeholder="type keyword(s) here" />
        <button type="submit" class="btn btn-sm button-theme">Search</button>
    </form>
</div>

<script src="{{ asset('web/js/jquery-2.2.0.min.js') }}"></script>
<script src="{{ asset('web/js/popper.min.js') }}"></script>
<script src="{{ asset('web/js/bootstrap.min.js') }}"></script>
<script  src="{{ asset('web/js/bootstrap-submenu.js') }}"></script>
<script  src="{{ asset('web/js/rangeslider.js') }}"></script>
<script  src="{{ asset('web/js/jquery.mb.YTPlayer.js') }}"></script>
<script  src="{{ asset('web/js/bootstrap-select.min.js') }}"></script>
<script  src="{{ asset('web/js/jquery.easing.1.3.js') }}"></script>
<script  src="{{ asset('web/js/jquery.scrollUp.js') }}"></script>
<script  src="{{ asset('web/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script  src="{{ asset('web/js/leaflet.js') }}"></script>
<script  src="{{ asset('web/js/leaflet-providers.js') }}"></script>
<script  src="{{ asset('web/js/leaflet.markercluster.js') }}"></script>
<script  src="{{ asset('web/js/dropzone.js') }}"></script>
<script  src="{{ asset('web/js/slick.min.js') }}"></script>
<script  src="{{ asset('web/js/jquery.filterizr.js') }}"></script>
<script  src="{{ asset('web/js/jquery.magnific-popup.min.js') }}"></script>
<script  src="{{ asset('web/js/jquery.countdown.js') }}"></script>
<script  src="{{ asset('web/js/maps.js') }}"></script>
<script  src="{{ asset('web/js/app.js') }}"></script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script  src="{{ asset('web/js/ie10-viewport-bug-workaround.js') }}"></script>
<!-- Custom javascript -->
<script  src="{{ asset('web/js/ie10-viewport-bug-workaround.js') }}"></script>
</body>
</html>
