<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="{{asset('sweetalert.min.js')}}"></script>




    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/popper.min.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">





    <!--Flipbox Css Dependancy -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/flipbox.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/toggle-radios.css') }}">

    <!-- Owl Carousel -->
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>

    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">

    <!-- Menu Bar Dependancies -->


    <!--Data Tables -->
    <script src="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    @yield('header')

    @vite('resources/css/app.css', 'resources/js/app.js')

</head>

<body>

    <header class="sticky top-0 bg-white shadow z-50">
        @php
            $user = App\Models\website_details::where('id', 1)->first();
        @endphp
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">

                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="#" class="text-black text-2xl font-bold"> <img src="{{ asset('images/logo.png') }}"
                            alt="{{ $user->web_name }}" class="h-8 w-auto"></a>
                </div>

                <!-- Desktop Menu -->
                <nav class="hidden md:flex space-x-6 items-center font-medium uppercase text-gray-700">
                    <a href="{{ route('homepage') }}" class="hover:text-black">Home</a>
                    <a href="{{ route('causes') }}" class="hover:text-black">Causes</a>
                    <a href="{{ route('jobs') }}" class="hover:text-black">Jobs</a>
                    <a href="{{ route('Blog') }}" class="hover:text-black">Blog</a>

                    <!-- About Us Dropdown -->
                    <div class="relative group">
                        <button class="flex items-center hover:text-black focus:outline-none">
                            About Us
                            <i class="ml-1 ion ion-ios-arrow-down"></i>
                        </button>
                        <div
                            class="absolute left-0 mt-2 w-48 bg-white border rounded shadow-lg opacity-0 group-hover:opacity-100 transition-opacity">
                            <a href="{{ route('j.showcat', [1]) }}" class="block px-4 py-2 hover:bg-gray-100">Job
                                Category</a>
                            <a href="{{ route('c.show', [1]) }}" class="block px-4 py-2 hover:bg-gray-100">Single
                                Cause</a>
                            <a href="{{ route('p.show', [1]) }}" class="block px-4 py-2 hover:bg-gray-100">User
                                Profile</a>
                        </div>
                    </div>

                    <a href="#" class="hover:text-black">Contact Us</a>
                </nav>

                <!-- Right Buttons -->
                <div class="flex items-center space-x-4">

                    <!-- Auth Buttons -->
                    @auth
                        <!-- User Dropdown -->
                        <div class="relative group">
                            <button class="flex items-center space-x-2 focus:outline-none">
                                <img src="{{ asset(Auth()->user()->avatar) }}" class="w-10 h-10 rounded-full" alt="Avatar">
                            </button>
                            <div
                                class="absolute right-0 mt-2 w-56 bg-white border rounded shadow-lg opacity-0 group-hover:opacity-100 transition-opacity z-50">
                                <div class="px-4 py-2 border-b">
                                    <span class="font-semibold block">{{ Auth()->user()->email }}</span>
                                    <small class="text-gray-500">{{ Auth()->user()->name }}</small>
                                </div>
                                <a href="{{ route('p.show', Crypt::encrypt(Auth()->user()->id)) }}"
                                    class="block px-4 py-2 hover:bg-gray-100">My Profile</a>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Settings</a>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 flex justify-between items-center">
                                    Billing
                                    <span
                                        class="bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs">4</span>
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="w-full text-left px-4 py-2 hover:bg-gray-100 flex items-center">
                                        <i class="bx bx-power-off mr-2"></i> Log Out
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Post Dropdown -->
                        <div class="relative group">
                            <button
                                class="bg-indigo-600 text-white px-4 py-2 rounded flex items-center space-x-2 focus:outline-none">
                                <i class="fa fa-plus-circle"></i>
                                <span>Post</span>
                            </button>
                            <div
                                class="absolute right-0 mt-2 w-48 bg-white border rounded shadow-lg opacity-0 group-hover:opacity-100 transition-opacity z-50">
                                <a href="{{ route('c.create') }}" class="block px-4 py-2 hover:bg-gray-100">Start
                                    Fundraising</a>
                                <a href="{{ route('j.create') }}" class="block px-4 py-2 hover:bg-gray-100">Post a Job</a>
                            </div>
                        </div>
                    @else
                        <a href="{{ url('/login') }}"
                            class="text-gray-700 hover:text-black border border-gray-300 px-4 py-2 rounded flex items-center space-x-2">
                            <i class="fa fa-sign-in"></i>
                            <span>Get Started! </span>
                        </a>
                    @endauth

                    <!-- Mobile Menu Button -->
                    <button id="mobile-menu-button" class="md:hidden focus:outline-none">
                        <span class="block w-6 h-0.5 bg-gray-700 mb-1"></span>
                        <span class="block w-6 h-0.5 bg-gray-700 mb-1"></span>
                        <span class="block w-6 h-0.5 bg-gray-700"></span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden hidden bg-white border-t border-gray-200">
            <nav class="px-4 py-4 space-y-2 font-medium uppercase">
                <a href="{{ route('homepage') }}" class="block hover:text-indigo-600">Home</a>
                <a href="{{ route('causes') }}" class="block hover:text-indigo-600">Causes</a>
                <a href="{{ route('jobs') }}" class="block hover:text-indigo-600">Jobs</a>
                <a href="{{ route('Blog') }}" class="block hover:text-indigo-600">Blog</a>

                <!-- Mobile About Us Dropdown -->
                <div x-data="{ open: false }" class="block">
                    <button @click="open = !open"
                        class="w-full text-left flex justify-between items-center hover:text-indigo-600">
                        About Us
                        <i class="ion ion-ios-arrow-down"></i>
                    </button>
                    <div x-show="open" class="mt-2 pl-4 space-y-1">
                        <a href="{{ route('j.showcat', [1]) }}" class="block hover:text-indigo-600">Job Category</a>
                        <a href="{{ route('c.show', [1]) }}" class="block hover:text-indigo-600">Single Cause</a>
                        <a href="{{ route('p.show', [1]) }}" class="block hover:text-indigo-600">User Profile</a>
                    </div>
                </div>

                <a href="#" class="block hover:text-indigo-600">Contact Us</a>
            </nav>
        </div>
    </header>

    <!-- Mobile Menu Toggle Script -->
    <script>
        const btn = document.getElementById('mobile-menu-button');
        const menu = document.getElementById('mobile-menu');

        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>


    @yield('content')

    <section id="Footer">
        <div class="row justify-center p-5" style="background-color: #222222; color: white;">
            <div class="row w-75" style="max-width: 80rem; ">
                <div class="col-lg-4">
                    <p class="brand nounderline " style="color:white; margin: 5px;">{{$user->web_name}}</p>
                    <p style="font-size: 10pt;">{{$user->web_description}}</p>
                    <div class="row">
                        <div class="col-2"><i class="fa fa-location-arrow"
                                style="color:darkorange;font-size: 18pt;"></i></div>
                        <div class="col-10">
                            <h5 class="font-semibold" style="color: white">Address</h5>
                            <p style="font-size: 10pt; color: #aaa">{{$user->web_address}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2 p-3"><i class="fa fa-mobile" style="color:darkorange;font-size: 22pt;"></i>
                        </div>
                        <div class="col-10">
                            <h5 class="font-semibold" style="color: white">Contact</h5>
                            <p style="font-size: 10pt; color: #aaa">{{$user->web_contact}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2 p-3"><i class="fa fa-envelope" style="color:darkorange;font-size: 16pt;"></i>
                        </div>
                        <div class="col-10">
                            <h5 class="font-semibold" style="color: white">E-Mail</h5>
                            <p style="font-size: 10pt; color: #aaa">{{$user->web_email}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 offset-sm-1">
                    <h4 class="font-semibold pb-3" style="color: white">Quick Links</h4>
                    <p style="font-size: 10pt; color: #aaa">Causes</p>
                    <p style="font-size: 10pt; color: #aaa">Blogs</p>
                    <p style="font-size: 10pt; color: #aaa">Contact</p>
                    <p style="font-size: 10pt; color: #aaa">Post a Job</p>
                    <p style="font-size: 10pt; color: #aaa">Vacancies</p>
                    <p style="font-size: 10pt; color: #aaa">Events</p>
                    <p style="font-size: 10pt; color: #aaa">Workshops</p>
                </div>
                <div class="col-lg-2 offset-sm-1">
                    <div class="col-lg-2">
                        <h4 class="font-semibold pb-3" style="color: white">Social Media</h4>
                        <p style="font-size: 10pt; color: #aaa">Facebook</p>
                        <p style="font-size: 10pt; color: #aaa">Instagram</p>
                        <p style="font-size: 10pt; color: #aaa">LinkIn</p>
                        <p style="font-size: 10pt; color: #aaa">WhatsApp</p>

                    </div>
                </div>
            </div>


        </div>
    </section>
</body>



<!--owl carousel script -->
<script>
    $(".ocarousel").owlCarousel({
        margin: 10,
        loop: true,
        autoplay: false,
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            600: {
                items: 2,
                nav: false
            },
            1000: {
                items: 3,
                nav: false
            },

        }
    });




</script>

<script>
    tinymce.init({
        selector: '.initTMC',
        plugins: 'advlist autolink lists link image  preview anchor ',
        toolbar: 'numlist bullist undo redo',
        toolbar_mode: 'floating',
        setup: function (editor) {
            editor.on('init', function () {
                tinymce.activeEditor.getContent();
            })
        }
    });
</script>

@yield('footer_script')

<!-- endbuild -->

<!-- Vendors JS -->

<!-- Main JS -->

<!-- Page JS -->

</html>