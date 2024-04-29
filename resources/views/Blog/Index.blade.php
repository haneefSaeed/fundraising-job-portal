@extends('layouts.app')
@section('header')
    <title>Blogs << Tagheer</title>


    <!-- Styles -->
    <style>
        .font-s{
            font-size: 10pt;
        }
        .font-i {
            font-size:10pt;
            color: #444444;
        }
        .text-justify {
            text-align: justify;
        }

        body {
            background-color: #f9f9f9;

        }

        .nounderline {
            text-decoration: none;
        }
    </style>

    <style>

        .blog-container {
            background: #fff;
            border-radius: 2px;
            box-shadow: rgba(0, 0, 0, 0.2) 0 4px 2px -2px;
            font-weight: 100;
            width: 100%;
        }
        @media screen and (min-width: 480px) {
            .blog-container {
                width: 28rem;
            }
        }
        @media screen and (min-width: 767px) {
            .blog-container {
                width: 40rem;
            }
        }
        @media screen and (min-width: 959px) {
            .blog-container {
                width: 50rem;
            }
        }

        .blog-container a {
            color: #333;
            text-decoration: none;
            transition: 0.25s ease;
        }
        .blog-container a:hover {
            border-color: #777;
            color: #777;
        }

        .blog-cover {
            border-radius: 2px 2px 0 0;
            height: 12rem;
            margin-bottom: 20px;
            box-shadow: inset rgba(0, 0, 0, 0.2) 0 64px 64px 16px;

        }


        .blog-body {
            margin: 0 auto;
            width: 92%;
        }


        .blog-title h2 a {
            color: #222;
        }

        .blog-summary p {
            color: #4d4d4d;
        }

        .blog-tags ul {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            list-style: none;
            padding-left: 0;
        }

        .blog-tags li + li {
            margin-left: 0.5rem;
        }

        .blog-tags a {
            border: 1px solid #999999;
            border-radius: 3px;
            color: #999999;
            height: 1.5rem;
            line-height: 1.5rem;
            letter-spacing: 1px;
            padding: 0 0.5rem;
            text-align: center;
            text-transform: uppercase;
            white-space: nowrap;
            width: 5rem;
        }

    </style>

@endsection


@section('content')
    <section id="breadcrumbs">

        <div class="searchheader row p-5 text-center " style="background-image: url('{{asset('images/bg_job.jpg')}}'); color:white;  background-size: cover; color:#333; ">
            <div class="container searchcontainer">
                <h1>Blogs</h1>
                <div class="row mt-4">
                    <form>
                        <style>

                            .searchheader{
                                height: 250px;

                            }
                            .searchitem{
                                width: 85%;
                                display:inline-block;;
                            }
                            .searchitembtn{
                                width: 10%;
                                display:inline-block;;
                            }
                            @media screen and (max-width: 600px){
                                .searchitem {
                                    width: 100%;
                                    margin-bottom: 10px;
                                }
                                .searchheader{
                                    height: 350px;
                                }

                            }
                        </style>
                        <div class="row mx-auto bg-secondary p-3 w-75 rounded-1 justify-center " >
                            <input type="text" class="form-control searchitem" placeholder="Search Blogs">
                            <button type="submit" class="btn btn-dark rounded-1 searchitembtn ms-2"><i class="fa fa-search" ></i> Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>



    <section id="causeDetail">
        <div class="container">
            <div class="row p-1">
                <!-- cause items section -->

                <style>
                    .cause-card {
                        display: inline-grid;
                        width: 98%;

                    }
                    @media screen and (max-width: 1068px){
                        .cause-card {
                            display: inline-grid;
                            width: 100%;
                        }
                    }
                </style>
                <div class="col-md-8">


                            @foreach($blogs as $blog)
                            <div  class="blog-container cause-card m-3 bg-white" style="">

                                <div class="blog-header">
                                    <div class="blog-cover " style=" background: url('{{asset($blog->img)}}');  background-size: cover ; ">

                                    </div>
                                </div>

                                <div class="blog-body">
                                    <div class="blog-title">

                                        <h4><a href="Blogs/{{$blog->id}}">{{$blog->title}}</a> </h4>
                                    </div>

                                    <div class="blog-summary pt-3 pb-3" >
                                        <div class=" row pb-2 font-i bg-light">
                                            <div class="col-md-3 ">
                                                <img class="rounded-circle" style="background-image: url('{{asset('images/jobs/avatar.jpg')}}'); width: 45px; display: inline;" src="{{asset('images/jobs/avatar.jpg')}}">{{$blog->user->name}}
                                            </div>
                                            <div class="col-md-3 " style="vertical-align: center;">
                                                <i class="fa fa-clock-o" style="margin-top:15px; font-size: 13pt;"></i> {{\Carbon\Carbon::parse($blog['publish_date'])->diffForHumans()}}
                                            </div>
                                            <div class="col-md-3 " style="vertical-align: center;">
                                                <i class="fa fa-folder" style="margin-top:15px; font-size: 13pt;"></i> {{$blog->cat->cat_name}}
                                            </div>
                                            <div class="col-md-2 " style="vertical-align: center;">
                                                <i class="fa fa-eye" style="margin-top:15px; font-size: 13pt;"></i> {{$blog->seenctr}}
                                            </div>

                                        </div>

                                        <p class="mt-3">
                                            {!! $blog->content !!}
                                        </p>
                                        <div class="input-group justify-content-end">
                                            <button onclick="window.location.href= 'Blog/{{$blog->id}}'" class="btn btn-sm btn-success"><i class="fa fa-arrow-right"></i> Read more</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            @endforeach
                    <div class="" >
                        <!-- went to providers and used bootstrap for pagination -->
{{--                        {!! $causes->onEachSide(5)->links() !!}--}}
                    </div>


                </div>





                <!-- Side bar -->
                <div class="col-md-3">
                    <h3 class="mt-3">Categories</h3>
                    <div class="row bg-white p-3 mx-auto">

                        <style>
                            ul li {
                                list-style-type: disc;

                            }
                            a {
                                text-decoration: none;
                                color:black;
                            }
                            a:hover{
                                text-decoration: underline;
                                color: #555;
                            }
                        </style>

                        <ul style="list-style-type: circle">
                            <li><a href="#"> Refugees (12)</a></li>
                            <li><a href="#"> Poverty (40)</a></li>
                            <li><a href="#"> Medical (3)</a></li>
                            <li><a href="#"> Bankruptcy (34)</a></li>
                            <li><a href="#"> Disasters (50)</a></li>
                            <li><a href="#"> Political (5)</a></li>
                        </ul>

                    </div>
                </div>
            </div>

        </div>

    </section>

    <section id="makeProfile">

        <div class="row" style="background-color:hsla(0, 0%, 0%, 0.8)">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 p-5" style="color: white;">
                        <h1 class="text-align-left  font-semibold">Post a Job Now</h1>
                        <h3 class="text-align-left  "> If you're hiring, you can post your vacancy now! </h3>
                    </div>
                    <div class="col-lg-3 p-5" style="color:white;">
                        <button class="btn btn-light text-align-right " style="font-size: 14pt; margin-top: 20px;"><i class="fa fa-arrow-right"> </i> Post Now</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('footer_scripts')

@endsection

