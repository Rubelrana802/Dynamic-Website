<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="shortcut icon" href="http://www.usitsolution.net/site_assets/images/resources/logo.png"
          type="image/x-icon">

    <title>Saffron - @yield('title')</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Base URL -->
    <meta name="base-url" content="{{ url('/') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Alert Toastr Style-->
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet"/>
    <!-- Custom Style -->
    @stack('style')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark navbar-info">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">Home</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fas fa-user"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-header">{{ Auth::user()->name }}</span>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('admin.profile.my-profile') }}" class="dropdown-item">
                        <i class="fas fa-user mr-2"></i> Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('top-bar-logout-form').submit();"
                       class="dropdown-item">
                        <i class="fas fa-lock mr-2"></i> Logout
                    </a>
                    <form id="top-bar-logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </nav>
    <!-- Navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar elevation-4 sidebar-dark-info">
        <!-- Brand Logo -->
        <a href="{{ route('admin.dashboard') }}" class="brand-link">
            <img src="{{ asset('img/logo.png') }}" alt="US IT Solution LLC Logo"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">US IT Solution LLC</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                @php

                $company = DB::table('companies')->first();

                @endphp
                <div class="image">
                    <img src="{{ asset('img/'. $company->logo) }}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="{{ url('/') }}" target="_black" class="d-block">{{ $company->title }}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">

                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}"
                           class="nav-link {{ Request::is('admin/dashboard','admin/dashboard/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p> Dashboard </p>
                        </a>
                    </li>


                    <!-- Web start -->
                    <li class="nav-item has-treeview {{ Request::is('admin/web','admin/web/*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ Request::is('admin/web','admin/web/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-globe-asia"></i>
                            <p>
                                Web
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.web.slider.index') }}" 
                                class="nav-link {{ Request::is('admin/web/slider','admin/web/slider/*') ? 'active' : '' }}">
                                    <i class="fas fa-angle-double-right nav-icon"></i>
                                    <p>Manage Slider</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.web.about.index') }}" class="nav-link {{ Request::is('admin/web/about','admin/web/about/*') ? 'active' : '' }}">
                                    <i class="fas fa-angle-double-right nav-icon"></i>
                                    <p>Manage About</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('admin.web.wProduct.index') }}" class="nav-link {{ Request::is('admin/web/wProduct','admin/web/wProduct/*') ? 'active' : '' }}">
                                    <i class="fas fa-angle-double-right nav-icon"></i>
                                    <p>Manage Product</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.web.review.index') }}" class="nav-link {{ Request::is('admin/web/review','admin/web/review/*') ? 'active' : '' }}">
                                    <i class="fas fa-angle-double-right nav-icon"></i>
                                    <p>Manage Review</p>
                                </a>
                            </li>
                            <!-- <li class="nav-item">
                                <a href="{{ route('admin.web.industry.index') }}" class="nav-link {{ Request::is('admin/web/industry','admin/web/industry/*') ? 'active' : '' }}">
                                    <i class="fas fa-angle-double-right nav-icon"></i>
                                    <p>Manage Industry</p>
                                </a>
                            </li> -->
                            <li class="nav-item">
                                <a href="{{ route('admin.web.gallery.index') }}" class="nav-link {{ Request::is('admin/web/gallery','admin/web/gallery/*') ? 'active' : '' }}">
                                    <i class="fas fa-angle-double-right nav-icon"></i>
                                    <p>Manage Gallery</p>
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="{{ route('admin.web.contactUs.index') }}" class="nav-link {{ Request::is('admin/web/contactUs','admin/web/contactUs/*') ? 'active' : '' }}">
                                    <i class="fas fa-angle-double-right nav-icon"></i>
                                    <p>User Contact Message</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.web.service.index') }}" class="nav-link {{ Request::is('admin/web/service','admin/web/service/*') ? 'active' : '' }}">
                                    <i class="fas fa-angle-double-right nav-icon"></i>
                                    <p>Service</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.web.client-logo.index') }}" class="nav-link {{ Request::is('admin/web/client-logo','admin/web/client-logo/*') ? 'active' : '' }}">
                                    <i class="fas fa-angle-double-right nav-icon"></i>
                                    <p>Client Logo</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.web.blog.index') }}" class="nav-link {{ Request::is('admin/web/blog','admin/web/blog/*') ? 'active' : '' }}">
                                    <i class="fas fa-angle-double-right nav-icon"></i>
                                    <p>Manage Blog</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.web.subscribe.index') }}" class="nav-link {{ Request::is('admin/web/subscribe','admin/web/subscribe/*') ? 'active' : '' }}">
                                    <i class="fas fa-angle-double-right nav-icon"></i>
                                    <p>Subscriber</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.web.contact.index') }}" class="nav-link {{ Request::is('admin/web/contact','admin/web/contact/*') ? 'active' : '' }}">
                                    <i class="fas fa-angle-double-right nav-icon"></i>
                                    <p>Frontend Setting</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- Web end -->


                    <!-- Settings Menu start -->
                    <li class="nav-item has-treeview {{ Request::is('admin/settings','admin/settings/*') ? 'menu-open' : '' }}">
                        <a href="#"
                           class="nav-link {{ Request::is('admin/settings','admin/settings/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>
                                Settings
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.settings.category.index') }}"
                                   class="nav-link {{ Request::is('admin/settings/category','admin/settings/category/*') ? 'active' : '' }}">
                                    <i class="fas fa-angle-double-right nav-icon"></i>
                                    <p>Category</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            @permission('manage-users')
                            <li class="nav-item">
                                <a href="{{ route('admin.settings.users.index') }}"
                                   class="nav-link {{ Request::is('admin/settings/users','admin/settings/users/*') ? 'active' : '' }}">
                                    <i class="fas fa-angle-double-right nav-icon"></i>
                                    <p>Users</p>
                                </a>
                            </li>
                            @endpermission
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.settings.company.index') }}"
                                   class="nav-link {{ Request::is('admin/settings/company','admin/settings/company/*') ? 'active' : '' }}">
                                    <i class="fas fa-angle-double-right nav-icon"></i>
                                    <p>Backend Setting</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.settings.roles.index') }}"
                                   class="nav-link {{ Request::is('admin/settings/roles','admin/settings/roles/*') ? 'active' : '' }}">
                                    <i class="fas fa-angle-double-right nav-icon"></i>
                                    <p>Roles</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- Settings Menu end -->

                    <li class="nav-item">
                        <a href="{{ route('admin.profile.my-profile') }}" class="nav-link {{ Request::is('admin/profile','admin/profile/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user"></i>
                            <p> Profile </p>
                        </a>
                    </li>

                    <!-- Logout Menu start -->
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="nav-icon fas fa-lock"></i>
                            <p> Logout </p>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                    <!-- Logout Menu end -->

                </ul>
            </nav>
        </div>
    </aside>

    <div class="content-wrapper">
        @yield('main-content')
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            V 1.0.0
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; {{ date('Y')}} <a href="http://usitsolution.net/">US IT Solution LLC</a>.</strong> All rights
        reserved.
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- AdminLTE App -->
<script src="{{ asset('js/app.js') }}"></script>
<!-- Alert Toastr -->
<script src="{{ asset('js/toastr.min.js') }}"></script>
<script src="{{ asset('assets/js/select2.full.min.js') }}"></script>

<script>
    <!-- For Div Print -->
    function printDiv(printable_area) {
        var printContents = document.getElementById(printable_area).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
    // select 2 dropdown
    $(".select2.form-control:not(.dont-select-me)").select2({
        placeholder: "Select option",
        allowClear: true
    });
    // for all type of alert
        @if(Session::has('message'))
    var type = "{{ Session::get('alert-type') }}";
    switch (type) {
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>
<!-- Custom JavaScript-->
@stack('script')
</body>
</html>
