@extends('layouts.app')
@section('header')
    <title>Jobs << Tagheer</title>


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
            background-color: #fff;

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
                <h1>jobs</h1>
                <div class="row mt-4">
                    <form>
<style>

    .searchheader{
        height: 250px;
    }
    .searchitem{
        width: 23%;
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
                            <input type="text" class="form-control me-2 searchitem" placeholder="Search Keyword">
                            <select class="form-control me-2 searchitem  " >
                                <option selected>Category </option>
                                <option>Medical </option>
                                <option>Accounting</option>
                                <option>IT</option>
                            </select>
                            <select class="form-control me-2 searchitem" >
                                <option selected>Location </option>
                                <option>Kabul </option>
                                <option>Kandahar</option>
                                <option>Jalal Abad</option>
                            </select>
                            <button type="submit" class="btn btn-dark rounded-1 searchitem"><i class="fa fa-search" ></i> Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section id="jobDetails">
                <div class="row p-5 justify-center bg-light" >

                    <div class="col-lg-12">
                        <h1 class="text-center">Categories</h1>
                    </div>

                    <div class="container">
                    <div class="row pt-4">
<div class="msg">
    @if(Session::has('msg'))
        <div class="alert alert-success">Your Job has been posted, waiting to be verified. </div>
        @endif
        @if(Session::has('msg3'))
            <div class="alert alert-success">You're posted job is not verified yet, please be patient.  </div>
        @endif
</div>

                            @foreach($cats as $cat)
                                @if($cat->cat_root == 0)
                                    <div>
                                    <a class="nounderline text-black" href="{{route('j.showcat', $cat->id)}}"> <h3>{{$cat->cat_name}} </h3></a>
                                    </div>
                                    @foreach($cats as $ct)
                                        @if($ct->cat_root == $cat->id)
                                            <div class="fpjobcat m-2" style="max-width: 280px;" onclick="window.location.href = '{{route('j.showcat', $ct->id)}}';">
                                                <div class="row g-0">
                                                    <div class="col-md-2 text-center" style="margin-top: 5%; font-size: 25pt; color: #245269">
                                                        <i class="fa fa-{{$ct->cat_icon}}"></i>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="card-body">
                                                            <h5 class="card-title" style="font-size: 12pt; font-weight: 600;">{{$ct->cat_name}}</h5>
                                                            <p class="card-text" style="font-size: 10pt;"><span style="font-weight: 600">{{App\Models\Job::where('cat_id', '=', $ct->id)->where('status', '=', 1)->count()}}</span>   job(s)</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach

                        </div>
                    </div>



                </div>

    </section>

    <section id="Latest Jobs">
        <div class="row p-5 justify-center bg-white" >

                <h1 class="text-center">Latest Jobs</h1>

<style>

    .latestjobs {
        position: relative;
        display: flex;
        flex-direction: row;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;

        border: 1px solid #eeeeee;
        border-radius: 5px;
        cursor: pointer;
    }
    .latestjobs:hover {
    text-decoration: none;
    }

    @media screen and (max-width: 600px){
        .jobinfoitem{
            text-align: left;
        }
    }
</style>
                <div class=" mx-auto " style="max-width: 80rem;">
                    <div class="wrapper ">
                        <div class="ocarousel owl-carousel">
                            @foreach($jobs as $job)
                            <div class="eventcard  w-100" style="max-width: 34rem;">
                                <div class="card-body bg-white">
                                    <div class="latestjobs" >
                                        <div class="col-sm-12">
                                            <div class="card-body p-3 ">
                                                <div class="row">
                                                    <div class="col-sm-7"><h4 class="card-title">{{$job->title}}</h4></div>
                                                    <div class="col-sm-5 text-align-right jobinfoitem" ><h5><i class="fa fa-user-circle"></i>{{$job->company_profile->name}}</h5></div>
                                                </div>
                                                <div class="row card-text bg-light p-1" style="display:flex; flex-direction: row;">
                                                    <div class="col-sm-4 text-align-left jobinfoitem">
                                                        <i class="fa fa-{{$job->category->cat_icon}}"></i> {{$job->category->cat_name}}
                                                    </div>
                                                    <div class="col-sm-3 text-align-center jobinfoitem">
                                                        <i class="fa fa-location-arrow" ></i> {{$job->location}}
                                                    </div>
                                                    <div class="col-sm-5 text-align-right jobinfoitem">
                                                        <i class="fa fa-calendar"></i> {{$job->location}}
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            @endforeach
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

