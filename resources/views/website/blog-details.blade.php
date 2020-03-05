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

<!-- News start -->
<div class="blog-body content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <!-- News 1 start -->
                <div class="blog-1 blog-big">
                    <div class="blog-photo">
                        <img src="{{ asset('web/image/blog/'.$blog->image ) }}" alt="blog-img" class="img-fluid">
                    </div>
                    <div class="detail">
                        <h3>
                            {{ $blog->title }}
                        </h3>
                        <p>{!! $blog->details !!}</p>
                        <br>
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <!-- <div class="blog-tags">
                                    <span>Tags</span>
                                    <a href="#">Features</a>
                                    <a href="#">Gallery</a>
                                    <a href="#">Slideshow</a>
                                </div> -->
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
                                    <a href="#" class="google-bg">
                                        <i class="fa fa-google"></i>
                                    </a>
                                    <a href="#" class="linkedin-bg">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                    <a href="#" class="pinterest-bg">
                                        <i class="fa fa-pinterest"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
               </div>
                <!--  Heading 2 -->
                <!-- <h3 class="heading-2">Comments Section</h3> -->
                <!-- Comments start -->
                <!--  
                <ul class="comments">
                    <li>
                        <div class="comment">
                            <div class="comment-author">
                                <a href="#">
                                    <img src="{{ asset('web/img/avatar/avatar-1.jpg') }}" alt="comments-user">
                                </a>
                            </div>
                            <div class="comment-content">
                                <div class="comment-meta">
                                    <h3>
                                        Maikel Alisa
                                    </h3>
                                    <div class="comment-meta">
                                        8:42 PM 1/28/2017<a href="#">Reply</a>
                                    </div>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tincidunt aliquam. Aliquam gravida massa at sem vulputate interdum et vel eros. Maecenas eros enim, tincidunt vel turpis vel, dapibus tempus nulla. Donec vel nulla dui. Pellentesque sed ante.</p>
                            </div>
                        </div>
                        <ul>
                            <li>
                                <div class="comment">
                                    <div class="comment-author">
                                        <a href="#">
                                            <img src="{{ asset('web/img/avatar/avatar-2.jpg') }}" alt="comments-user">
                                        </a>
                                    </div>
                                    <div class="comment-content">
                                        <div class="comment-meta">
                                            <h3>
                                                Brady Anne
                                            </h3>
                                            <div class="comment-meta">
                                                8:42 PM 1/28/2017<a href="#">Reply</a>
                                            </div>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tincidunt aliquam. Aliquam gravida massa at sem vulputate interdum et vel eros.</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div class="comment">
                            <div class="comment-author">
                                <a href="#">
                                    <img src="{{ asset('web/img/avatar/avatar-3.jpg') }}" alt="comments-user">
                                </a>
                            </div>
                            <div class="comment-content">
                                <div class="comment-meta">
                                    <h3>
                                        Anne Brady
                                    </h3>
                                    <div class="comment-meta">
                                        8:42 PM 1/28/2017<a href="#">Reply</a>
                                    </div>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tincidunt aliquam. Aliquam gravida massa at sem vulputate interdum et vel eros. Maecenas eros enim, tincidunt vel turpis vel, dapibus tempus nulla.</p>
                            </div>
                        </div>
                        <ul>
                            <li>
                                <div class="comment">
                                    <div class="comment-author">
                                        <a href="#">
                                            <img src="{{ asset('web/img/avatar/avatar-4.jpg') }}" alt="comments-user">
                                        </a>
                                    </div>
                                    <div class="comment-content mrg-bdr">
                                        <div class="comment-meta">
                                            <h3>
                                                Jane Doe
                                            </h3>
                                            <div class="comment-meta">
                                                8:42 PM 1/28/2017<a href="#">Reply</a>
                                            </div>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tincidunt aliquam. Aliquam gravida massa at sem vulputate interdum et vel eros. Maecenas eros enim, tincidunt vel turpis vel, dapibus tempus nulla.</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul> -->
                <!-- Contact 2 start -->
                <div class="contact-2 mb-30">
                    <h3 class="heading-2">Contact Form</h3>
                    <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group name">
                                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group email">
                                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group subject">
                                    <input type="text" name="subject" class="form-control" placeholder="Subject" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group number">
                                    <input type="text" name="phone" class="form-control" placeholder="Number" required>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group message">
                                    <textarea class="form-control" name="details" placeholder="Write message" required></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="send-btn">
                                    <button type="submit" class="btn btn-md button-theme">Send Message</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="sidebar-right">
                    <!-- Search box -->
                    <!-- <div class="widget search-box">
                        <h3 class="sidebar-title">Search</h3>
                        <div class="s-border"></div>
                        <form class="form-inline form-search" method="GET">
                            <div class="form-group">
                                <label class="sr-only" for="textsearch2">Looking for something</label>
                                <input type="text" class="form-control" id="textsearch2" placeholder="Looking for something">
                            </div>
                            <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                        </form>
                    </div> -->
                    <!-- Recent properties start -->
                    <div class="widget recent-properties">
                        <h3 class="sidebar-title">Recent News</h3>
                        <div class="s-border"></div>
                        @foreach($blogs as $blog)
                        <div class="media mb-4">
                            <a class="pr-3" href="{{ url('blog-details', $blog->id) }}">
                                <img class="media-object" src="{{ asset('web/image/blog/'. $blog->image ) }}" alt="{{ $blog->title }}">
                            </a>
                            <div class="media-body align-self-center">
                                <h5>
                                    <a href="{{ url('blog-details', $blog->id) }}">{{ $blog->title }}</a>
                                </h5>
                                <div class="listing-post-meta">
                                    <i class="fa fa-calendar"></i> Feb 14, 2018
                                </div>
                            </div>
                        </div>
                        @endforeach                        
                    </div>
                    <!-- Posts By Category Start -->
                    <div class="posts-by-category widget">
                        <h3 class="sidebar-title">Category</h3>
                        <div class="s-border"></div>
                        <ul class="list-unstyled list-cat">
                            @foreach($blog_categories as $category)
                                <li><a href="#">{{ $category->category_name }} <span>({{ DB::table('blogs')->where('category_id', $category->id)->count() }})</span></a></li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Social links Start -->
                    <div class="widget social-links">
                        <h3 class="sidebar-title">Social Links</h3>
                        <div class="s-border"></div>
                        <ul class="social-list clearfix">
                            <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#" class="pinterest-bg"><i class="fa fa-pinterest"></i></a></li>
                        </ul>
                    </div>
                    <!-- Tags box Start -->
                    <!-- <div class="widget tags-box">
                        <h3 class="sidebar-title">Tags</h3>
                        <div class="s-border"></div>
                        <ul class="tags">
                            <li><a href="#">img</a></li>
                            <li><a href="#">Features</a></li>
                            <li><a href="#">Gallery</a></li>
                            <li><a href="#">Slideshow</a></li>
                            <li><a href="#">Post Formats</a></li>
                            <li><a href="#">Typography</a></li>
                            <li><a href="#">Best Sellers</a></li>
                            <li><a href="#">WooCommerce</a></li>
                            <li><a href="#">Shortcodes</a></li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!--  News start -->

@endsection