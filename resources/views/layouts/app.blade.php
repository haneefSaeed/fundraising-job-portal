<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fonts -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <script src="{{asset('sweetalert.min.js')}}"></script>
    <script src="https://kit.fontawesome.com/bc2fe822df.js" crossorigin="anonymous"></script>




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

    <header class="sticky top-0 bg-white z-50">
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
                <nav class="hidden md:flex space-x-6 items-center font-worksans font-[500] uppercase text-gray-700">
                    <a href="{{ route('homepage') }}"
                        class="p-2 hover:text-black hover:border-b-2 hover:border-b-black ">Home</a>
                    <a href="{{ route('causes') }}"
                        class="p-2 hover:text-black hover:border-b-2 hover:border-b-black">Causes</a>
                    <a href="{{ route('jobs') }}"
                        class="p-2 hover:text-black hover:border-b-2 hover:border-b-black">Jobs</a>
                    <a href="{{ route('Blog') }}"
                        class="p-2 hover:text-black hover:border-b-2 hover:border-b-black">Blog</a>

                    <!-- About Us Dropdown -->
                    <div class="relative group">
                        <button
                            class="flex items-center p-2 hover:text-black hover:border-b-2 hover:border-b-black focus:outline-none">
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

                    <a href="#" class="p-2 hover:text-black hover:border-b-2 hover:border-b-black">Contact Us</a>
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
        <div class="flex w-full justify-center bg-[#222] ">
            <div class="flex justify-between p-16 w-full h-[350px] max-h-[350px] text-white">
                <div class="max-w-[250px]">
                    <a href="#" class="text-black  text-2xl font-bold "> <img src="{{ asset('images/logo.png') }}"
                            alt="{{ $user->web_name }}" class="h-8 w-auto invert"></a>
                    <p class="text-justify pt-3">Raise Bridge help you fundraise, search for job, learn new things...all
                        in one platform. </p>
                    <div class="flex flex-col mt-3 gap-2">
                        <div class="flex gap-2 "> <i class="fa-solid fa-phone inline"></i> +34 5225 2522 </div>
                        <div class="flex gap-2 "> <i class="fa-solid fa-location-arrow inline"></i> Mansfield Tx </div>
                        <div class="flex gap-2 "> <i class="fa-solid fa-at inline"></i> hello@raisebridge.com </div>
                    </div>
                </div>
                <div class="flex flex-col ">
                    <h1 class="font-[500] font-montserrat mb-2 ">Quick Links</h1>
                    <a href="#">Causes</a>
                    <a href="#">Jobs</a>
                    <a href="#">About Us</a>
                    <a href="#">Blog</a>
                    <a href="#">Contact us</a>
                </div>
                <div>
                    Follow us on social media
                    <div class="flex justify-center gap-6 mt-4 mb-4">
                        <a href="https://facebook.com/yourpage" target="_blank"
                            class="text-gray-600 hover:text-blue-400 transition text-3xl">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="https://twitter.com/yourpage" target="_blank"
                            class="text-gray-500 hover:text-sky-300 transition text-3xl">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://instagram.com/yourpage" target="_blank"
                            class="text-gray-500 hover:text-pink-300 transition text-3xl">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://linkedin.com/yourpage" target="_blank"
                            class="text-gray-800 hover:text-blue-600 transition text-3xl">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </div>


                    <p>Terms & Conditions</p>
                    <p>Privacy Policy</p>



                    <p class="text-gray-300 mt-5">©️ #2026</p>
                </div>
            </div>

        </div>
    </section>
</body>




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