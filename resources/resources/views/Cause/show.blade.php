@extends('layouts.app')
@section('header')
        <title>Causes</title>


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
                background-color: #efefef;

            }

            .nounderline {
                text-decoration: none;
            }
        </style>

    <style>

        .cause-container {
            background: #fff;
            border-radius: 2px;
            box-shadow: rgba(0, 0, 0, 0.2) 0 4px 2px -2px;
            font-weight: 100;
            width: 100%;
        }
        @media screen and (min-width: 480px) {
            .cause-container {
                width: 28rem;
            }
        }
        @media screen and (min-width: 767px) {
            .cause-container {
                width: 40rem;
            }
        }
        @media screen and (min-width: 959px) {
            .cause-container {
                width: 50rem;
            }
        }

        .cause-container a {
            color: #333;
            text-decoration: none;
            transition: 0.25s ease;
        }
        .cause-container a:hover {
            border-color: #777;
            color: #777;
        }

        .cause-cover {
            border-radius: 2px 2px 0 0;
            height: 28rem;
            margin-bottom: 20px;
            box-shadow: inset rgba(0, 0, 0, 0.2) 0 64px 64px 16px;

        }


        .cause-body {
            margin: 0 auto;
            width: 92%;
        }


        .cause-title h2 a {
            color: #222;
        }

        .cause-summary p {
            color: #4d4d4d;
        }

        .cause-tags ul {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            list-style: none;
            padding-left: 0;
        }

        .cause-tags li + li {
            margin-left: 0.5rem;
        }

        .cause-tags a {
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

        <div class="row p-5 " style="background-image: url('{{asset('images/bg.jpg')}}'); color:white;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2>{{$cause->cause_title}}</h2>
                    </div>
                    <div class="col-md-6 " style="text-align: right">
                        <h5>You are here / <a href="#" class="nounderline">home </a> / <a href="#" class="nounderline">causes</a> </h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="causeDetail">
        <div class="container">
            <div class="row p-3">
                        <!-- cause items section -->
                        <div class="col-md-9">

                            <div class="cause-container w-100 mb-3">

                                <div class="cause-header">
                                    <div class="cause-cover" style=" background: url('{{asset($cause->cause_img)}}'); background-size: cover ;">

                                    </div>
                                </div>

                                <div class="cause-body">
                                    <div class="cause-title">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h3>{{$cause->cause_title}}</h3>
                                            </div>
                                            <div class="col-md-4 text-align-right">
                                                <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#DonorsModel"><i class="fa fa-list " style="margin-right: 5px;"></i> Donor's List</button>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="cause-summary pt-3 pb-3" >
                                        <div class=" row pb-2 font-i w-100" style="width: 70%">
                                            <div class="col-md-3 ">
                                                <i class="fa fa-calendar "></i> {{ \Carbon\Carbon::parse($cause['cause_start_date'])->diffForHumans() }}
                                            </div>
                                            <div class="col-md-3 ">
                                                <i class="fa fa-user "></i>  @if($cause->fr_profile->is_company == 0)
                                                    {{$cause->fr_profile->user->name}}
                                                @else
                                                    <a href="dp/{{$cause->fr_profile->company_profile->id}}">{{$cause->fr_profile->company_profile->name}}</a>
                                                @endif
                                            </div>
                                             <div class="col-md-3">
                                                <i class="fa fa-folder "></i> {{$cause->category->cat_name}}
                                            </div>
                                            <div class="col-md-3 ">
                                                <i class="fa fa-location-arrow "></i> {{$cause->cause_location}}
                                            </div>

                                        </div>

                                        <div class="row cause-donation-detail bg-light p-3 m-2">
                                            <div class="row mb-2 ">

                                                <div class="progress-donation" style="height: 30px;">



                                                    <div class="progress-donation-bar" role="progressbar" style="width: {{100 * $donors->sum('amount') / $cause->cause_goal}}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-md-4" style="text-align: left;"><i class="fa fa-arrow-up"></i> Raised: $ {{$donors->sum('amount')}}</div>
                                                <div class="col-md-4" style="text-align: center;"><i class="fa fa-user"></i> Donors: {{$donors->count()}}</div>
                                                <div class="col-md-4" style="text-align: right;"><i class="fa fa-bullseye"></i> Goal: $ {{number_format($cause->cause_goal)}}</div>
                                            </div>

                                                <div class="input-group justify-content-center">
                                                    <button class="btn btn-success m-2" data-bs-toggle="modal" data-bs-target="#DonationModel"><i class="fa fa-heart"> </i> Quick Donation</button>
                                                   @if($cause->fr_profile->frp_user_id == Auth::id())
                                                    <button class="btn btn-secondary m-2"><i class="fa fa-plus"> </i> Add Followup</button>
                                                       @endif
                                                </div>


                                        </div>
                                        <div class="cause-description row text-justify">

                                            <p>
                                                {{$cause->cause_description}}
                                            </p>

                                        </div>
                                    </div>

                                </div>



                            </div>


                        <!-- follow up section -->
                            @foreach($followup as $follow)
                                @if($follow->cause_id == $cause->id)
                        <h1 class="mt-2 mb-3">Follow up</h1>
                                @endif
                                @break
                            @endforeach

<style>

    .flu-card .flu-card_img img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .flu-card .flu-card_content {
        padding: 15px;
    }

    @media (min-width: 992px) {
        .flu-card--vertical {
            display: flex;
            position: relative;
        }
        .flu-card--vertical .flu-card_img img {
            width: 320px;
            min-width: 300px;
            height: 100%;
            object-fit: cover;
        }
    }

</style>
                            @foreach($followup as $follow)
                                @if($follow->cause_id == $cause->id)
                                    @if($follow->img != "")
                                        <div class="flu-card flu-card--vertical bg-white overflow-hidden mb-4">
                                            <div class="flu-card_img position-relative">
                                                <img src="{{asset($follow->img)}}" alt="">
                                            </div>
                                            <div class="flu-card_content">
                                                <div class="flu-card_title-section">
                                                    <h4 class="flu-card_title">{{$follow->title}}</h4>
                                                </div>
                                                <div class=" row pb-2 font-i" >
                                                    <div class="col-md-5 ">
                                                        <i class="fa fa-calendar "></i> {{$follow->date}}
                                                    </div>
                                                    <div class="col-md-3 ">
                                                        <i class="fa fa-user "></i> {{$follow->user->name}}
                                                    </div>

                                                </div>
                                                <p>
                                                    {{$follow->description}}
                                                </p>
                                            </div>
                                        </div>
                                        @else
                                        <div class="flu-card flu-card--vertical bg-white overflow-hidden mb-4">
                                            <div class="flu-card_img position-relative">

                                            </div>
                                            <div class="flu-card_content">
                                                <div class="flu-card_title-section">
                                                    <h4 class="flu-card_title">{{$follow->title}}</h4>
                                                </div>
                                                <div class=" row pb-2 font-i" >
                                                    <div class="col-md-3 ">
                                                        <i class="fa fa-calendar "></i> {{$follow->date}}
                                                    </div>
                                                    <div class="col-md-2 ">
                                                        <i class="fa fa-user "></i> {{$follow->user->name}}
                                                    </div>

                                                </div>
                                                <p>
                                                    {{$follow->description}}
                                                </p>
                                            </div>
                                        </div>
                                        @endif
                                    @endif
                                @endforeach




                        <!-- comment section -->

                        </div>
<style>
    .relcause-card:hover {
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    }
    .relcause-card .relcause-card_img img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }
    .relcause-card .relcause-card_img i {
        position: absolute;
        top: 20px;
        right: 30px;
        color: #fff;
        font-size: 25px;
        transition: all 0.1s;
    }
    .relcause-card .relcause-card_img i:hover {
        top: 18px;
        right: 28px;
        font-size: 29px;
    }
    .relcause-card .relcause-card_content {
        padding: 15px;
    }
    .relcause-card .relcause-card_content .relcause-card_title-section {
       margin-bottom: 10px;
    }
    .relcause-card .relcause-card_content .relcause-card_title-section .relcause-card_title {
        margin-bottom: 8px;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .relcause-card_title a {
        text-decoration: none;
    }
    .relcause-card .relcause-card_content .relcause-card_title-section .relcause-card-category {
        font-size: 10pt;
        display: block;
        text-decoration: none;
        color:#777;
        margin:0;
    }


    }

</style>

                        <!-- related posts -->
                        <div class="col-md-3">
                            <h3>Related Causes</h3>
                            @foreach($related as $rel)
                                @if($rel->id != $cause->id)
                                <div class="relcause-card bg-white rounded-lg overflow-hidden mb-4 shadow">
                                    <div class="relcause-card_img position-relative">
                                        <img src="{{asset($rel->cause_img)}}" alt="">
                                    </div>
                                    <div class="relcause-card_content">
                                        <div class="relcause-card_title-section overflow-hidden">
                                            <h4 class="relcause-card_title"><a href="#!" class="text-dark">{{$rel->cause_title}}</a></h4>
                                            <div style="font-size: 9pt;">
                                                <p class="relcause-card-category"><i class="fa fa-calendar"></i> {{\Carbon\Carbon::parse($rel['cause_start_date'])->diffForHumans()}}</p>
                                                <a href="#" class="relcause-card-category"><i class="fa fa-folder"></i> {{$rel->category->cat_name}}</a>
                                                <a href="#" class="relcause-card-category"><i class="fa fa-location-arrow"></i> {{$rel->cause_location}}</a>

                                            </div>
                                        </div>
                                        <div class="relcause-card_bottom-section">
                                            <div class="d-flex justify-content-between">
                                                <div> {{substr($rel->cause_description, 0, 150)}}</div>

                                            </div>
                                            <div class="row mx-auto w-50 p-1">
                                                <a href="{{$rel->id}}" class="btn btn-sm btn-primary">Read More <i class="fa fa-arrow-right"></i> </a>
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



    @endsection

@section('footer_scripts')
    <section id="modelsdefbm">
        <div class="modal fade" id="DonationModel" tabindex="-1" aria-labelledby="DonateModel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="DonateModel">Contribute Now</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5>{{$cause->cause_title}}</h5>
                        <p class="font-s text-justify">
                            {{$cause->cause_description}}
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

    <section id="modeldonlst">
        <div class="modal fade" id="DonorsModel" tabindex="-1" aria-labelledby="DonorListModel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="DonorListModel">List of Donors</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        @if($donors->count()>0)
                            <p>We'd like to thank the donors below who contributed:</p>
                       <table class="table table-striped">
                           <tr>
                               <th>Donor Name</th>
                               <th>Amount</th>
                               <th></th>
                           </tr>
                           @foreach($donors as $don)
                               <tr>
                                   <td>
                                       @if($don->anon == 0)
                                       {{$don->user->name}}
                                           @else
                                       Anonymous
                                           @endif
                                   </td>
                                   <td>{{$don->amount}}</td>
                                   <td>{{ \Carbon\Carbon::parse($don['date'])->diffForHumans() }}</td>
                               </tr>
                               @endforeach
                       </table>
                        @else
                            <div class="m-5">
                            <h5 class="text-center" style="color:red;">Ops..Sorry No Donors Yet : ' (</h5>
                            </div>
                        @endif
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>


    </section>

    @endsection

