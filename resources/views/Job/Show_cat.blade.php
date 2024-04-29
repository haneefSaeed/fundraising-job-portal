@extends('layouts.app')
@section('header')
    <title>Show Category</title>


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

        <div class="row p-5 mb-3 " style="background-color: #eee; color:white;">
            <div class="container">
                <div class="row m-3 text-center text-black">

                        <h1>{{$cat->cat_name}}</h1>


                        <p style="font-size:10pt;">You are here / <a href="../../" class="nounderline">home </a> / <a href="../../jobs" class="nounderline">Jobs </a> / {{$cat->cat_name}} </p>
                        <p style="font-size: 10pt; font-weight: 600;">{{$job_count}} Job(s) listed</p>
                </div>
            </div>
        </div>
    </section>

    <section id="jobDetails">
        <div class="container">
            <div class="row p-1">
                <!-- job items section -->
                <div class="col-md-9">

                    <style>

                        .job-card .job-card_img img {
                            width: 100%;
                            height: 200px;
                            object-fit: cover;
                        }

                        .job-card .job-card_content {
                            padding: 15px;
                        }

                        @media (min-width: 992px) {
                            .job-card--vertical {
                                display: flex;
                                position: relative;
                            }
                            .job-card--vertical .job-card_img img {
                                width: 320px;
                                min-width: 300px;
                                height: 100%;
                                object-fit: cover;
                            }
                        }

                    </style>
                    @if($jobs->count()>0)
                    @foreach($jobs as $job)
                        @if($job->status==1)
                    <div class="job-card job-card--vertical bg-light overflow-hidden mb-4">
                        <div class="job-card_img position-relative">
                            <img src="{{asset($job->img)}}" alt="">
                        </div>
                        <div class="job-card_content w-100">
                            <div class="job-card_title-section">
                                <h4 class="job-card_title"><a href="../{{$job->id}}">{{$job->title}}</a> </h4>
                            </div>
                            <div class="row p-2 font-i bg-white" >
                                <div class="col-md-4 ">
                                    <i class="fa fa-calendar "></i> {{\Carbon\Carbon::parse($job['Posted_date'])->diffForHumans()}}
                                </div>
                                <div class="col-md-3 ">
                                    @if($job->company_profile!=null)
                                    <i class="fa fa-user "></i><a href="../../dp/{{$job->company_profile->id}}"> {{ucfirst(strtolower($job->company_profile->name))}}</a>
                                    @endif
                                </div>
                                <div class="col-md-3 ">
                                    <i class="fa fa-folder "></i> {{$job->category->cat_name}}
                                </div>
                                <div class="col-md-2 ">
                                    <i class="fa fa-eye "></i> {{$job->seenctr}}
                                </div>

                            </div>
                            <div class="row p-2" style="font-size: 11pt;">
                                <div class="col-sm-12">

                                    <p>{{$job->small_description}}
                                    <p class="font-i"><i class="fa fa-location-arrow "></i> Kabul, Afghansitan</p>

                                </div>
                            </div>

                        </div>
                    </div>
                        @endif
                    @endforeach
                    @else
                        <div class="row items-center"><h4>Sorry, no Jobs to display yet! :(</h4></div>
                    @endif
                    <div class="row" >
                        <!-- went to providers and used bootstrap for pagination -->
                        <div class="col-lg-2 mx-auto m-3">
                            {!! $jobs->onEachSide(5)->links() !!}
                        </div>
                    </div>
                </div>

                <!-- Job search -->
                <div class="col-md-3">
                    <h3>Search</h3>
                    <div class="row bg-white p-3 mx-auto" style="position: relative;max-width: 20rem;">


                        <form>
                            <label for="hello">
                                Keyword
                            </label>
                            <input type="text" class="form-control" name="Keyword">

                            <label for="hello">
                                Category
                            </label>
                            <select id="category" name="category" class="form-control">
                                <option value="Ref">Accounting</option>
                                <option value="Med">Programming</option>
                                <option value="Food">Engineering</option>
                                <option value="Agri">Manufacturing</option>
                            </select>

                            <label for="Author">
                                Company
                            </label>
                            <input type="text" class="form-control" name="Author">

                            <label for="location">
                                Date
                            </label>
                            <input type="date" class="form-control" name="Location">
                            <div class="input-group p-3 justify-content-center" >
                                <button type="submit" class="btn btn-secondary"><i class="fa fa-search"></i> Search</button>
                            </div>

                        </form>



                    </div>

                    <hr>

                    <h3>Categories</h3>
<style>
    ul li {
        list-style-type: none;

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

                    <ul >
                        @foreach($cats as $item)
                            @if($item->cat_root != 0 )
                        <li style="list-style-type: disc"><a href="{{$item->id}}"> {{$item->cat_name}} ({{App\Models\Job::where('cat_id', '=', $item->id)->count()}})</a></li>
                                @else
                            @endif
                        @endforeach
                        <li style="list-style-type: disc"><a href="../">Show All </a> </li>
                    </ul>
                </div>
            </div>

        </div>

    </section>



@endsection

@section('footer_scripts')
    <section id="modelsdefbm">
        <div class="modal-donation fade" id="DonationModel" tabindex="-1" aria-labelledby="DonateModel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="DonateModel">Contribute Now</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5>Help Afghan Refugees</h5>
                        <p class="font-s text-justify">
                            Suspendisse potenti. Ut non tempus justo. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                        </p>
                        <h5>Please select an Amount you wish to donate:</h5>

                        <form class="row g-3 justify-center mb-2">
                            <div class="col-auto">
                                <button class="btn btn-warning" style="font-weight: 600;">$ 1</button>
                                <button class="btn btn-warning" style="font-weight: 600;">$ 5</button>
                                <button class="btn btn-warning" style="font-weight: 600;">$ 10</button>
                                <button class="btn btn-warning" style="font-weight: 600;">$ 20</button>
                            </div>
                            <div class="col-auto">
                                <input type="text" class="form-control" style="width: 80px; " placeholder="other..">
                            </div>
                        </form>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success">Proceed</button>
                        </div>
                    </div>
                </div>
            </div>


    </section>

@endsection

