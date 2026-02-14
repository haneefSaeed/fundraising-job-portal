@extends('layouts.app')
@section('header')
    <title>RaiseBridge Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />


@endsection


@section('content')

    <section id="landing" style="">

        <div class="w-full h-[90vh] bg-gradient-to-tr from-gray-100 to-white flex justify-center items-center flex-col"
            style="background-color: #ffffff;
                                                                                background-image: radial-gradient(#000000 0.5px, #ffffff 0.5px);
                                                                                background-size: 10px 10px;">
            <div class="w-2/4 text-center">
                <h1 class="text-5xl font-montserrat font-[500] text-black">Find Causes or Jobs,<br /> Now in a Single
                    Platform!</h1>
                <p class="text-xl font-worksans font-[400] text-black mt-10 ">One stop slution to finding job, funding your
                    cuase, learning and much more...we care about you and try our best to deliver the best.. </p>

                <button class="mt-10 bg-black rounded-full px-5 py-2 text-white">Get started</button>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none">
            <svg viewBox="0 0 1440 150" class="w-full h-[100px]" preserveAspectRatio="none">
                <path fill="#e5e7eb"
                    d="M0,64L60,69.3C120,75,240,85,360,101.3C480,117,600,139,720,138.7C840,139,960,117,1080,101.3C1200,85,1320,75,1380,69.3L1440,64V150H0Z">
                </path>
            </svg>
        </div>
        </div>

    </section>

    <section id="services">
        <div class="bg-gray-200 pt-10 pb-16 flex items-center justify-center flex-col">


            <div class="flex gap-5 justify-between flex-col lg:flex-row">
                @foreach($services as $service)
                    <div
                        class=" bg-white rounded p-10 hover:scale-[1.05] transition-all hover:shadow-lg flex justify-center items-center flex-wrap flex-col cursoer-pointer">

                        <i class="fa fa-{{$service->svc_ficon}} mb-3 fmc" style="font-size: 40pt"></i>
                        <h3>{{$service->svc_ftitle}}</h3>
                        <p>{{$service->svc_fdescription}}</p>

                    </div>
                @endforeach
                <div
                    class=" bg-white rounded p-10 hover:scale-[1.05] transition-all hover:shadow-lg flex justify-center items-center flex-wrap flex-col cursoer-pointer">

                    <i class="fa fa-{{$service->svc_ficon}} mb-3 fmc" style="font-size: 40pt"></i>
                    <h3>{{$service->svc_ftitle}}</h3>
                    <p>{{$service->svc_fdescription}}</p>

                </div>
                <div
                    class=" bg-white rounded p-10 hover:scale-[1.05] transition-all hover:shadow-lg flex justify-center items-center flex-wrap flex-col cursoer-pointer">

                    <i class="fa fa-{{$service->svc_ficon}} mb-3 fmc" style="font-size: 40pt"></i>
                    <h3>{{$service->svc_ftitle}}</h3>
                    <p>{{$service->svc_fdescription}}</p>

                </div>
                <div
                    class=" bg-white rounded p-10 hover:scale-[1.05] transition-all hover:shadow-lg flex justify-center items-center flex-wrap flex-col cursoer-pointer">

                    <i class="fa fa-{{$service->svc_ficon}} mb-3 fmc" style="font-size: 40pt"></i>
                    <h3>{{$service->svc_ftitle}}</h3>
                    <p>{{$service->svc_fdescription}}</p>

                </div>

            </div>

        </div>
        </div>
    </section>

    <section id="Causes">

        <div class="bg-white flex justify-center items-center flex-col pt-16 md:pt-36 pb-16 ">
            <h1 class="font-worksans text-4xl font-[500] indent-32 mb-16 md:mb-36 text-justify  text-gray-500 w-2/3 "><span
                    class="text-gray-200 ">Treding Causes: </span>the real challenges are here, find out your cause now and
                save real peopl hero to save peoples life. god bless</h1>

            <div class="flex justify-center items-start mx-w-[800] flex-wrap gap-5 mt-16 ">
                @foreach($causes as $cause)
                    <div class="w-[400px] mx-w-[400px] ">
                        <img src="{{$cause->cause_img}}" class="card-img-top h-[200px] w-full object-cover rounded-lg"
                            alt="Cause Image">
                        <div class=" min-h-[180px]">
                            <h5 class="text-lg pt-2 font-semibold font-montserrat py-2 "><a href="c/{{$cause->id}}">
                                    {{$cause->cause_title}}
                                </a></h5>
                            <div class="">

                                <div class="w-full h-2 bg-gray-200 rounded-sm overflow-hidden ">
                                    <div class="progress-bar h-8 bg-gradient-to-r from-gray-500 to-black rounded-sm"
                                        data-percent="{{ round(100 * $donations->where('cause_id', '=', $cause->id)->sum('amount') / $cause->cause_goal) }}"
                                        style="width: 0%">
                                    </div>
                                </div>

                                <p class="text-sm text-gray-600 mt-1">
                                    Raised: {{ number_format($donations->where('cause_id', '=', $cause->id)->sum('amount')) }} /
                                    Goal: {{ number_format($cause->cause_goal) }}
                                    from {{number_format($donations->where('cause_id', '=', $cause->id)->count())}} Doners
                                </p>

                            </div>
                            <p class="font-montserrat line-clamp-2">{{$cause->cause_description}}</p>
                            <div class="mt-2">
                                <a href="c/{{$cause->id}}" class="bg-black p-2 text-white ">Donate</a>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        </div>
        </div>
        </div>


    </section>

    <section id="jobcats">

        <div class="bg-gray-600 flex justify-center items-center flex-col pt-16 md:pt-36 pb-16 ">
            <h1 class="font-worksans text-4xl font-[500] indent-32 mb-16 md:mb-36 text-justify  text-gray-400 w-2/3 "><span
                    class="text-gray-200 ">Treding Jobs: </span>the real challenges are here, find out your cause now and
                save real peopl hero to save peoples life. god bless</h1>

            <div class="flex flex-wrap gap-5  ">
                @foreach ($cats as $cat)
                    <a href="j/cat/{{$cat->id}}">
                        <div
                            class="flex p-5 gap-4 text-white border-2 border-white hover:scale-[1.01] cursor-pointer hover:bg-white/10">
                            <h5 class="text-2xl ">
                                {{$cat->cat_name}}
                            </h5>
                            <p class=" text-6xl card-text"> {{ $cat->all_jobs_count }}</p>
                        </div>
                    </a>

                @endforeach




            </div>


        </div>

    </section>

    <section id="subscribe">
        <div class="flex justify-center flex-col items-center bg-black md:min-h-[400px] text-gray-200">
            <h1 class="text-center  font-semibold text-5xl font-montserrat">Follow us now</h1>
            <h3 class="text-center  mt-5"> to find more about everything you wish to know</h3>
            <div class="flex justify-center gap-6 mt-4">
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

        </div>
    </section>

    <!-- <section id="blogposts">

                    <div class="row p-5" style="background-color: #eee">
                        <h1 class="text-center font-semibold">Latest Blog Posts</h1>
                        <div class="row mx-auto p-6" style="max-width: 80rem">
                            <div class="wrapper ">
                                <div class="ocarousel owl-carousel">
                                    <div class="eventcard card-1 w-100" style="max-width: 28rem;">
                                        <img src="images/cause_02.jpg" class="card-img-top" alt="...">
                                        <div class="card-body bg-white">
                                            <div class="row pb-3" style="font-size: 10pt;">
                                                <div class="col-4"><i class="ion ion-ios-person"></i> James</div>
                                                <div class="col-4"><i class="ion ion-ios-calendar"></i> 11/2/2022</div>
                                                <div class="col-4"><i class="ion ion-ios-eye"></i> 750</div>
                                            </div>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                                of the card's content.</p>
                                        </div>
                                    </div>
                                    <div class="eventcard card-2 w-100" style="max-width: 28rem;">
                                        <img src="images/cause_01.jpg" class="card-img-top" alt="...">
                                        <div class="card-body bg-white">
                                            <div class="row pb-3" style="font-size: 10pt;">
                                                <div class="col-4"><i class="ion ion-ios-person"></i> James</div>
                                                <div class="col-4"><i class="ion ion-ios-calendar"></i> 11/2/2022</div>
                                                <div class="col-4"><i class="ion ion-ios-eye"></i> 750</div>
                                            </div>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                                of the card's content.</p>
                                        </div>
                                    </div>
                                    <div class="eventcard card-3 w-100" style="max-width: 28rem;">
                                        <img src="images/cause_03.jpg" class="card-img-top" alt="...">
                                        <div class="card-body bg-white">
                                            <div class="row pb-3" style="font-size: 10pt;">
                                                <div class="col-4"><i class="ion ion-ios-person"></i> James</div>
                                                <div class="col-4"><i class="ion ion-ios-calendar"></i> 11/2/2022</div>
                                                <div class="col-4"><i class="ion ion-ios-eye"></i> 750</div>
                                            </div>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                                of the card's content.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>

                </section> -->

    <section id="sponsers">
        <div class="flex flex-col items-center justify-center p-5 bg-gray-800">
            <h1
                class="font-worksans text-4xl font-[500] indent-32 mt-16 md:mt-36 mb-16 md:mb-24 text-justify  text-gray-400 w-2/3 ">
                <span class="text-gray-200 ">Sponsers: </span>We have the audacity to be proud partners with and
                save real peopl hero to save peoples life. god bless</h1>

            <div class="flex justify-between items-center">
                <img src="images/sponser_01.png" alt="" class="w-[180px]">
                <img src="images/sponser_02.png" alt="" class="w-[180px]">
                <img src="images/sponser_03.png" alt="" class="w-[180px]">
                <img src="images/sponser_04.png" alt="" class="w-[180px]">

            </div>
        </div>



    </section>



    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper-container', {
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const bars = document.querySelectorAll('.progress-bar');

            bars.forEach(bar => {
                const percent = bar.getAttribute('data-percent');

                setTimeout(() => {
                    bar.style.transition = "width 2s ease-out";
                    bar.style.width = percent + "%";
                }, 200);
            });
        });
    </script>





@endsection