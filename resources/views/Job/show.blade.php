@extends('layouts.app')
@section('header')
    <title>Show single job</title>


    <!-- Styles -->
    <style>
        .font-s{
            font-size: 10pt;
        }
        .font-i {
            font-size:10pt;
            color: #444444;
        }
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
    @if($job->status == 0)
        <script>
            window.location.href= '{{route('jobs')}}';
            </script>
        @endif
    <section id="breadcrumbs">

        <div class="row p-3 mb-3 " style="background-color: #eee; color:white;">
            <div class="container">
                <div class="row m-3 text-center text-black">

                    <h1>{{$job->title}}</h1>
                    <p style="font-size:10pt;">You are here / <a href="../" class="nounderline">home </a> / <a href="./" class="nounderline">Jobs </a> / {{$job->title}}</p>
                    <p>{{$job->small_description}}</p>
                    <p><span style ="font-weight: 600">{{\App\Models\application::where('vac_id' , '=', $job->id)->count()}}</span> Applicants applied.</p>
                    @if(Session::has('msg'))
                    <div class="alert alert-success w-50">
                        <i class="fa fa-info-circle"></i> Your application was submitted sucessfully
                    </div>
                        @endif
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

                        .job-container {
                            background: #fff;
                            border-radius: 2px;
                            box-shadow: rgba(0, 0, 0, 0.2) 0 4px 2px -2px;
                            font-weight: 100;
                            width: 100%;
                        }
                        @media screen and (min-width: 480px) {
                            .job-container {
                                width: 28rem;
                            }
                        }
                        @media screen and (min-width: 767px) {
                            .job-container {
                                width: 40rem;
                            }
                        }
                        @media screen and (min-width: 959px) {
                            .job-container {
                                width: 50rem;
                            }
                        }

                        .job-container a {
                            color: #333;
                            text-decoration: none;
                            transition: 0.25s ease;
                        }
                        .job-container a:hover {
                            border-color: #777;
                            color: #777;
                        }

                        .job-cover {
                            border-radius: 2px 2px 0 0;
                            height: 28rem;
                            margin-bottom: 20px;
                            box-shadow: inset rgba(0, 0, 0, 0.2) 0 64px 64px 16px;

                        }


                        .job-body {
                            margin: 0 auto;
                            width: 92%;
                        }


                        .job-title h2 a {
                            color: #222;
                        }

                        .job-summary p {
                            color: #4d4d4d;
                        }

                        .job-tags ul {
                            display: flex;
                            flex-direction: row;
                            flex-wrap: wrap;
                            list-style: none;
                            padding-left: 0;
                        }

                        .job-tags li + li {
                            margin-left: 0.5rem;
                        }

                        .job-tags a {
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
                    <div class="job-container bg-light shadow-none w-100 mb-3">

                        <div class="job-header">
                            <div class="job-cover" style=" background: url('{{asset($job->img)}}'); background-size: cover ;">
                            </div>
                        </div>

                        <div class="job-body">
                            <div class="job-title">

                                <h3></h3>


                            </div>
                            <div class="job-summary pt-3 pb-3" >
                                <div class=" row pb-2 font-i" >
                                    <div class="col-md-3 ">
                                        <i class="fa fa-calendar "></i> {{$job->Posted_date}}
                                    </div>
                                    <div class="col-md-2 ">
                                        <i class="fa fa-user "></i> {{ucfirst(strtolower($job->company_profile->name))}}
                                    </div>
                                    <div class="col-md-2">
                                        <i class="fa fa-folder "></i> {{$job->category->cat_name}}
                                    </div>
                                    <div class="col-md-2 ">
                                        <i class="fa fa-eye "></i> {{$job->seenctr}}
                                    </div>
                                    <div class="col-md-3 ">
                                        <i class="fa fa-location-arrow "></i> {{$job->location}}
                                    </div>


                                </div>


                                <div class="job-description row text-justify mt-2">
<style>
    th {
        font-weight: 600;
    }
</style>
                                    <table class="table table-striped">
                                      <tr>
                                          <th>Employment Type: </th>
                                          <td>{{$job->emp_type->detail}}</td>
                                          <th>Vacancy No. </th>
                                          <td>{{$job->reference}}</td>
                                      </tr>
                                        <tr>
                                            <th>Remote Job</th>
                                            <td>
                                                @if($job->is_remote == 1)
                                                    Yes
                                                    @else
                                                No
                                                    @endif

                                            </td>
                                            <th>Gender</th>
                                            <td>{{$job->pref_gender}}</td>
                                        </tr>
                                        <tr>
                                            <th>Minimum Experience</th>
                                            <td>{{$job->exp_level->detail}}</td>
                                            <th>Minimum Education</th>
                                            <td>{{$job->edu_level->detail}}</td>
                                        </tr>
                                        <tr>
                                            <th>Company Size</th>
                                            <td>{{$job->company_profile->comp_size->range}}</td>
                                            <th>Expires on</th>
                                            <td>{{$job->closing_date}}</td>
                                        </tr>
                                    </table>
                                    <style>
                                        ul li {
                                            list-style-type: disc;
                                            margin-left: 15px;
                                            font-size: 11pt;
                            }
                            </style>

                            {!! $job->description !!}

{{--                      <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ApplyJobModal"><i class="fa fa-file" style="margin-right: 5px;"> </i> Apply Now </button>--}}

                            <!--

                            -->
{{--                            @if(\App\Models\application::where('prof_prof_id', '=', \App\Models\prof_profile::where('user_id', '=', Auth()->user()->id)->first()->id)--}}
{{--                            ->where('vac_id', '=',$job->id)->count()<1)--}}
{{--                                @if($job->company_profile->user->id!=Auth()->user()->id)--}}
                                    <div class="row mx-auto w-25 p-3" >
                                    <button class="btn btn-success" id="btn_apply_now" onclick="checkUser()"><i class="fa fa-file" style="margin-right: 5px;"> </i> Apply Now </button>  </div>
{{--                                @endif--}}
{{--                            @else--}}
{{--                                <div class="row mx-auto w-75 p-3" >--}}
{{--                                <div class="alert alert-warning"> <i class="fa fa-warning"></i> You've already apply to this job! click <a href="{{route('p.show', encrypt(Auth()->user()->id))}}">Here</a> to visit your Profile </div>--}}
{{--                                </div>--}}
{{--                            @endif--}}


  </div>
    </div>
                        </div>
                    </div>
                </div>
<style>
                    .reljob-card:hover {
                        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
                    }
                    .reljob-card .reljob-card_img img {
                        width: 100%;
                        height: 100%;
                        object-fit: cover;
                    }
                    .reljob-card .reljob-card_img i {
                        position: absolute;
                        top: 20px;
                        right: 30px;
                        color: #fff;
                        font-size: 25px;
                        transition: all 0.1s;
                    }
                    .reljob-card .reljob-card_img i:hover {
                        top: 18px;
                        right: 28px;
                        font-size: 29px;
                    }
                    .reljob-card .reljob-card_content {
                        padding: 15px;
                    }
                    .reljob-card .reljob-card_content .reljob-card_title-section {
                        margin-bottom: 10px;
                    }
                    .reljob-card .reljob-card_content .reljob-card_title-section .reljob-card_title {
                        margin-bottom: 8px;
                        display: -webkit-box;
                        -webkit-box-orient: vertical;
                        overflow: hidden;
                        text-overflow: ellipsis;
                    }
                    .reljob-card_title a {
                        text-decoration: none;
                    }
                    .reljob-card .reljob-card_content .reljob-card_title-section .reljob-card-category {
                        font-size: 10pt;
                        display: block;
                        text-decoration: none;
                        color:#555555;
                        margin:0;
                    }

                </style>
                <!-- related posts -->
                <div class="col-md-3">
                    <h3>Related Jobs</h3>

                    @foreach ($rel_jobs as $rel)
                        @if($rel->id!=$job->id)
                            <div class="reljob-card bg-white rounded-lg overflow-hidden mb-4 shadow">
                                <div class="reljob-card_img position-relative">
                                    <img src="{{asset($rel->img)}}" alt="">
                                </div>
                                <div class="reljob-card_content">
                                    <div class="reljob-card_title-section overflow-hidden">
                                        <h4 class="reljob-card_title"><a href="#!" class="text-dark">{{$rel->title}}</a></h4>
                                        <div style="font-size: 9pt;">
                                            <a href="#" class="reljob-card-category"><h5 style="color: #696cff; font-size:11pt">by {{$rel->company_profile->name}}</h5></a>
                                            <a href="#" class="reljob-card-category"><i class="fa fa-calendar"></i> {{\Carbon\Carbon::parse($rel['Posted_date'])->diffForHumans()}}</a>
                                            <a href="#" class="reljob-card-category"><i class="fa fa-folder"></i> {{$rel->category->cat_name}}</a>
                                            <a href="#" class="reljob-card-category"><i class="fa fa-location-arrow"></i> {{$rel->location}}</a>
"
                                        </div>
                                    </div>
                                    <div class="reljob-card_bottom-section">
                                        <div class="d-flex justify-content-between">
                                            <div>{{$rel->small_description}} </div>

                                        </div>
                                        <div class="row mx-auto w-50 p-1">
                                            <button onclick="window.location.href = ('{{$rel->id}}')" class="btn btn-sm btn-theme">read more</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach


                </div>
            </div>
        </div>
    </section>

<script>
    function checkUser(){
        @if(Auth::check())
            //check login
            @if(\App\Models\prof_profile::where('user_id' , '=', Auth()->user()->id)->first() !=null )

                          @if(\App\Models\application::where('prof_prof_id', '=', \App\Models\prof_profile::where('user_id', '=', Auth()->user()->id)->first()->id)
                          ->where('vac_id', '=',$job->id)->count()<1)
                            $('#ApplyJobModal').modal('show');

                    @else
                        $('#btn_apply_now').attr('disabled', 'disabled');
                        $('#btn_apply_now').html("Whoops! You've already Applied for this post!");
                @endif
            @else
                //else create profile
                window.location = '/p/' + '{!! encrypt(Auth()->user()->id)!!}?reqppp&form=job'
            @endif

        @else
                //else go to login
            window.location ="/login";
        @endif
    }
</script>
@endsection

@section('footer_script')

    <section id="modelapplyjob">
        <div class="modal fade" id="ApplyJobModal" tabindex="-1" aria-labelledby="JobModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ApplyJobModal">You're Applying for</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5>Senior Graphic Designer Needed</h5>
                        <p class="font-s text-justify">
                            Leave a note to the recruiters. (Optional)
                        </p>
                        <form class="row g-3 justify-center mb-2" method="post" action="{{route('j.store')}}">
                            @csrf
                            <textarea class="form-control" name="message"></textarea>

                            <p>If you have different CV, please Upload here (Optional)</p>
                            <input type="file" class="form-control" name="cv">
                            <input type="hidden" name="user_id" value="{{(Auth::check()) ? Auth()->user()->id : -1 }}">
                            <input type="hidden" name="vac_id" value="{{$job->id}}">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="btn_application_apply" class="btn btn-success">Apply</button>
                        </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection

