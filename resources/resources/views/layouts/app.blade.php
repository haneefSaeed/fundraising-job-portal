<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <script src="{{asset("ad/assets/vendor/js/bootstrap.js")}}"></script>
    <link rel="stylesheet" href="{{asset("ad/assets/vendor/css/core.css")}}" class="template-customizer-core-css" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/popper.min.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
    </style>

    <!-- Bootstap Dependancy -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>


    <!--Flipbox Css Dependancy -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/flipbox.css') }}">

    <!-- Owl Carousel -->
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">

    <!-- Menu Bar Dependancies -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/reset.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset ('css/ionicon.min.cs')}}s">
    <script defer src="{{asset('js/script.js')}}"></script>

    <!--Data Tables -->
    <script src="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    @yield('header')

    <style>
        body {
            font-family: "Barlow", "Barlow Black", "Barlow Light", "Barlow ExtraLight", "Barlow Medium", "Barlow SemiBold",
            "Barlow B", sans-serif;
            font-size:11pt;
        }
        .nounderline {
            text-decoration: none;
        }
        .text-align-left{
            text-align: left;
        }
        .text-align-center{
            text-align: center;
        }
        .text-align-right{
            text-align: right;
        }
    </style>
</head>


<body>
<header class="header " style="position: sticky;" >
    <div class="container">
        <section class="wrapper">
            <div class="header-item-left">
                <a href="#" class="brand nounderline"><span style="color: black;">TAGHEER</span></a>
            </div>
            <!-- Navbar Section -->
            <div class="header-item-center">
                <div class="overlay"></div>
                <nav class="menu" id="menu">

                    <div class="menu-mobile-header">
                        <button type="button" class="menu-mobile-arrow"><i class="ion ion-ios-arrow-back"></i></button>
                            <div class="menu-mobile-title"></div>
                            <button type="button" class="menu-mobile-close"><i class="ion ion-ios-close"></i></button>
                        </div>
<style>
    .mi-font
    {
        font-family: "Barlow Medium", sans-serif;
        font-size: 14pt;
        text-transform: uppercase;

    }
</style>
                        <ul class="menu-section pt-3">
                            <li class="menu-item mi-font" ><a href="{{URL::route('homepage')}}" class="nounderline">HOME</a></li>

                            <li class="menu-item mi-font"><a href="{{URL::route('causes')}}" class="nounderline">CAUSES</a></li>
                            <li class="menu-item mi-font"><a href="{{URL::route('jobs')}}" class="nounderline">JOBS</a></li>
                            <li class="menu-item mi-font"><a href="{{URL::route('Blog')}}" class="nounderline">BLOG</a></li>
                            <li class="menu-item-has-children mi-font">
                                <a href="{{URL::route('causes')}}" class="nounderline">ABOUT US
                                    <i class="ion ion-ios-arrow-down"></i></a>
                                <div class="menu-subs menu-column-1">
                                    <ul>
                                        <li><a href="{{URL::route('jobs.show_job', [1])}}" class="nounderline">Single Job</a></li>
                                        <li><a href="{{URL::route('jobs.show_cat', [1])}}" class="nounderline">Job Category</a></li>
                                        <li><a href="{{URL::route('causes.show', [1])}}" class="nounderline">Single Cause</a></li>
                                        <li><a href="{{URL::route('profile.show', [1])}}" class="nounderline">User Profile</a></li>
                                    </ul>
                                </div>
                            </li>
                        <li class="menu-item mi-font"><a href="#" class="nounderline">CONTACT US</a></li>
                    </ul>
                </nav>
            </div>

            <div class="header-item-right">
                @auth
                    <ul class="navbar-nav flex-row align-items-center ms-auto mr-2">
                        <!-- Place this tag where you want the button to render. -->

                        <!-- User -->
                        <li class="nav-item navbar-dropdown dropdown-user dropdown" style="list-style: none;">
                            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                <div class="avatar avatar-online">
                                    <img src="{{asset("ad/assets/img/avatars/1.png")}}" alt class="w-px-40 h-auto rounded-circle" />
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar avatar-online">
                                                    <img src="{{asset(Auth()->user()->avatar)}}" alt class="w-px-40 h-auto rounded-circle" />
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <span class="fw-semibold d-block">{{Auth()->user()->email}}</span>
                                                <small class="text-muted">{{Auth()->user()->name}}</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{URL::route('profile.show', Auth()->user()->id)}}">
                                        <i class="bx bx-user me-2"></i>
                                        <span class="align-middle">My Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="bx bx-cog me-2"></i>
                                        <span class="align-middle">Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                        <span class="d-flex align-items-center align-middle">
                          <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                          <span class="flex-grow-1 align-middle">Billing</span>
                          <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{url('/logout')}}">
                                        <i class="bx bx-power-off me-2"></i>
                                        <span class="align-middle">Log Out</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!--/ User -->
                    </ul>
                @else
                    <button class="btn btn-outline-white" >
                        <a href="{{Url::route("login")}}" class="menu-icon nounderline" >
                    <span  style="font-family:'Barlow SemiBold', sans-serif; font-size: 12pt; color: #444;">
                                <i class="fa fa-sign-in" style="margin-right: 10px;"></i>LOGIN</span>
                        </a>
                    </button>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @endauth

                <button class="btn" style="background-color: darkolivegreen">
                    <a href="#" class="menu-icon nounderline" >
                        <span  style="font-family:'Barlow SemiBold', sans-serif; font-size: 12pt; color: white;"><i class="fa fa-plus-circle" style="margin-right: 10px;"></i>POST</span>
                    </a>
                </button>
                <button type="button" class="menu-mobile-toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </section>
    </div>
</header>

@yield('content')

<section id="Footer">
    <div class="row justify-center p-5" style="background-color: #222222; color: white;">
        <div class="row w-75" style="max-width: 80rem; ">
            <div class="col-lg-4">
                <p class="brand nounderline " style="color:white; margin: 5px;">Chartiy</p>
                <p style="font-size: 10pt;">Our organization is to spread the love, kindess and humanity amongs people.</p>
                <div class="row">
                    <div class="col-2"><i class="fa fa-location-arrow" style="color:darkorange;font-size: 18pt;"></i></div>
                    <div class="col-10"><h5 class="font-semibold">Address</h5><p style="font-size: 10pt; color: #aaa">Kabul, Afghanistan</p></div>
                </div>
                <div class="row">
                    <div class="col-2 p-3"><i class="fa fa-mobile" style="color:darkorange;font-size: 22pt;"></i></div>
                    <div class="col-10"><h5 class="font-semibold">Contact</h5><p style="font-size: 10pt; color: #aaa">+93790073000</p></div>
                </div>
                <div class="row">
                    <div class="col-2 p-3"><i class="fa fa-envelope" style="color:darkorange;font-size: 16pt;"></i></div>
                    <div class="col-10"><h5 class="font-semibold">E-Mail</h5><p style="font-size: 10pt; color: #aaa">admin@admin.com</p></div>
                </div>
            </div>
            <div class="col-lg-2">
                <h4 class="font-semibold pb-3">Quick Links</h4>
                <p style="font-size: 10pt; color: #aaa">Causes</p>
                <p style="font-size: 10pt; color: #aaa">Blogs</p>
                <p style="font-size: 10pt; color: #aaa">Contact</p>
                <p style="font-size: 10pt; color: #aaa">Post a Job</p>
                <p style="font-size: 10pt; color: #aaa">Vacancies</p>
                <p style="font-size: 10pt; color: #aaa">Events</p>
                <p style="font-size: 10pt; color: #aaa">Workshops</p>

            </div>
            <div class="col-lg-3">Hello</div>
            <div class="col-lg-3">Hello</div>
        </div>


    </div>
</section>
</body>

@yield('footer_scripts')

<!--owl carousel script -->
<script>
    $(".ocarousel").owlCarousel({
        margin: 10,
        loop: true,
        autoplay: false,
        responsive: {
            0:{
                items:1,
                nav: false
            },
            600:{
                items:2,
                nav: false
            },
            1000:{
                items:3,
                nav: false
            },

        }
    });




</script>




<!-- endbuild -->

<!-- Vendors JS -->

<!-- Main JS -->

<!-- Page JS -->
</html>
