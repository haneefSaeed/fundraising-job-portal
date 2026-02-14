@extends('layouts.app')
@section('header')
    <title>RaiseBridge Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    
@endsection


@section('content')

  <section id="slider" class="my-6">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            @foreach($slides as $slide)
                @if($slide->sdr_isPublished)
                <div class="swiper-slide relative">
                    <img src="{{ $slide->sdr_imageURL }}" class="w-full h-96 object-cover" alt="Slide">
                    <div class="absolute inset-0 flex flex-col items-center justify-center text-center text-white bg-black/40">
                        <h1 class="text-4xl font-bold drop-shadow-lg">{{ $slide->sdr_title }}</h1>
                        <h3 class="text-xl mt-2 drop-shadow">{{ $slide->sdr_description }}</h3>
                    </div>
                </div>
                @endif
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="swiper-pagination"></div>

        <!-- Navigation -->
        <div class="swiper-button-next text-white"></div>
        <div class="swiper-button-prev text-white"></div>
    </div>
</section>

    <section id="services">
        <div class="row p-5" style="background-color: #eee">

            <div class="col-lg-12">
                <h1 class="text-center">Services</h1>
            </div>

        <div class="row justify-center pt-5">
            @foreach($services as $service)
                <div class="ea-flip-card-item">
                    <div class="ea-flip-card-inner">
                        <div class="front">
                            <div class="p-3 ua-flip-card-content text-center position-absolute d-flex align-items-center justify-content-center flex-wrap flex-column">
                             <i class="fa fa-{{$service->svc_ficon}} mb-3 fmc"  style="font-size: 40pt"></i>
                                <h3>{{$service->svc_ftitle}}</h3>
                                <p>{{$service->svc_fdescription}}</p>
                            </div>
                        </div>

                        <div class="back">
                            <div class="ua-flip-card-content text-center position-absolute d-flex align-items-center justify-content-center flex-wrap flex-column">
                                <h3>{{$service->svc_btitle}}</h3>
                                <p>{{$service->svc_bdescription}}</p>
                                <a class="btn btn-light" href="{{$service->svc_bbtnLink}}">{{$service->svc_bbtncaption}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
                <div class="ea-flip-card-item">
                    <div class="ea-flip-card-inner">
                        <div class="front">
                            <div class="p-3 ua-flip-card-content text-center position-absolute d-flex align-items-center justify-content-center flex-wrap flex-column">
                                <i class="fa fa-black-tie mb-3" style="color:darkolivegreen; font-size: 40pt"></i>
                                <h3>Finding Job</h3>
                                <p>This is just for helping theis just for helping the poor people</p>
                            </div>
                        </div>

                        <div class="back">
                            <div class="ua-flip-card-content text-center position-absolute d-flex align-items-center justify-content-center flex-wrap flex-column">
                                <h3>Finding Job</h3>
                                <p>It is enjoyable to find the proper settings, go to donations now and contribute</p>
                                <button class="btn btn-light">Find Now</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ea-flip-card-item">
                    <div class="ea-flip-card-inner">
                        <div class="front">
                            <div class="p-3 ua-flip-card-content text-center position-absolute d-flex align-items-center justify-content-center flex-wrap flex-column">
                                <i class="fa fa-comment mb-3" style="color:darkolivegreen; font-size: 40pt"></i>
                                <h3>Join Community</h3>
                                <p>This is just for hesdf da a jdme al for helping the poor people</p>
                            </div>
                        </div>

                        <div class="back">
                            <div class="ua-flip-card-content text-center position-absolute d-flex align-items-center justify-content-center flex-wrap flex-column">
                                <h3>Join Now</h3>
                                <p>It is enjoyable to find the proper settings, go to donations now and contribute</p>
                                <button class="btn btn-light">Find Now</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ea-flip-card-item">
                <div class="ea-flip-card-inner">
                    <div class="front">
                        <div class="p-3 ua-flip-card-content text-center position-absolute d-flex align-items-center justify-content-center flex-wrap flex-column">
                            <i class="fa fa-handshake-o mb-3" style="color:darkolivegreen; font-size: 40pt"></i>
                            <h3>Become Member</h3>
                            <p>This is just for helping theis just for helping the poor people</p>
                        </div>
                    </div>

                    <div class="back">
                        <div class="ua-flip-card-content text-center position-absolute d-flex align-items-center justify-content-center flex-wrap flex-column">
                            <h3>Finding Job</h3>
                            <p>It is enjoyable to find the proper settings, go to donations now and contribute</p>
                            <button class="btn btn-light">Join Now</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
            </div>
    </section>

    <section id="Causes">

        <div class="row p-5" style="background-color: hsla(0,0%,0%,0.8)" >

            <div class="col-lg-12 pb-4">
                <h1 class="text-center dark:text-white">Causes</h1>
            </div>

            <div class="row p-6 mx-auto " style="max-width: 85rem;">
                <div class="wrapper">
                    <div class="ocarousel owl-carousel" style="max-width: 90rem">
                        @foreach($causes as $cause)
                            <div class="cause w-100" style="max-width: 25rem;">
                                <img src="{{$cause->cause_img}}"   class="card-img-top" alt="..." >
                                <div class="card-body bg-white">
                                    <h5 class="card-title">{{$cause->cause_title}}</h5>
                                    <div class="row p-3">

                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated "  style="width: {{100*$donations->where('cause_id' , '=', $cause->id)->sum('amount')/$cause->cause_goal}}%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="col-4">
                                            Raised: {{number_format($donations->where('cause_id' , '=', $cause->id)->sum('amount'))}}
                                        </div>
                                        <div class="col-4">
                                            {{number_format($donations->where('cause_id' , '=', $cause->id)->count())}} Donors
                                        </div>
                                        <div class="col-4">
                                            Goal: {{number_format($cause->cause_goal)}}
                                        </div>
                                    </div>
                                    <p class="card-text">{{$cause->cause_description}}</p>
                                    <div class="row justify-center ps-lg-5 pe-lg-5">
                                        <a href="c/{{$cause->id}}" class="btn btn-dark justify-center ">Donate</a>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section id="jobcats">
        <div class="row p-5 justify-center" style="background-color: #eee">

            <div class="col-lg-12">
                <h1 class="text-center">Job Categories</h1>
            </div>
            <div class="row pt-4 justify-center">
                    <?php $c =1; ?>
                @foreach ($cats as $cat)
                    @if ($cat->cat_cat == "JOB" && $cat->cat_is_featured == 1)
                    <div class="fpjobcat m-2 p-1" style="max-width: 285px;">
                        <div class="row g-0">
                            <div class="col-md-4 p-4">
                                <i class="fa fa-{{$cat->cat_icon}}" style="color: #aaa;font-size: 45pt;"></i>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{$cat->cat_name}}</h5>
                                    <p class="card-text">@php
                                            $count = \App\Models\categories::where('cat_root' , '=',$cat->id)->count();
                                        echo $count;
                                            @endphp
                                            </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $c= $c+1 ?>
                    @if($c==5)
                        </div>
                        <div class="row  justify-center ">
                    @endif
                    @endif
                @endforeach




            </div>


        </div>

    </section>

    <section id="subscribe">
        <div class="row p-3" style="background-color:hsla(0, 0%, 0%, 0.8)">
            <div class="col-lg-12 p-5" style="color: white;">
                <h1 class="text-center  font-semibold">Join us now</h1>
                <h3 class="text-center  "> to find more about everything you wish to know</h3>
            </div>
        </div>
    </section>

    <section id="blogposts">

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
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
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
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
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
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        </div>

    </section>

    <section id="sponsers">
        <div class="row justify-center p-5" style="background-color: hsla(202,64%,13%,0.9)">
            <h1 class="text-center pb-3 font-semibold" style="color: white;">Sponsers</h1>

            <div class="sponserItem" >
                <div class="card-body">
                    <img src="images/sponser_01.png" alt="" >
                </div>
            </div>

            <div class="sponserItem" >
                <div class="card-body">
                    <img src="images/sponser_02.png" alt="" >
                </div>
            </div>

            <div class="sponserItem" >
                <div class="card-body">
                    <img src="images/sponser_03.png" alt="" >
                </div>
            </div>

            <div class="sponserItem" >
                <div class="card-body">
                    <img src="images/sponser_04.png" alt="" >
                </div>
            </div>


        </div>



    </section>

@endsection


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