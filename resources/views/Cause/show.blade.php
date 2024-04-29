@extends('layouts.app')
@section('header')
        <title>Causes</title>


        <!-- Styles -->
        <style>
            .font-s{
                font-size: 11pt;
            }
            .font-i {
                font-size:14pt;
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
                        <h2 class="text-white">{{$cause->cause_title}}</h2>
                    </div>
                    <div class="col-md-6 " style="text-align: right">
                        <h5 class="text-white">You are here / <a href="#" class="nounderline">home </a> / <a href="#" class="nounderline">causes</a> </h5>
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
                                    <div class="cause-summary pt-3 pb-3 " >Fundraised by:
                                        <div class=" row pb-2 mt-2 font-i w-100" style="width: 70%">

                                            <div class="col-md-3 ">
                                                <img class="rounded-circle" style=" width: 25px; display: inline;" src="{{asset($cause->fr_profile->user->avatar)}}">
                                                @if($cause->fr_profile->is_company == 0)
                                                    <h5 style="font-size: 12pt; display:inline;" >{{$cause->fr_profile->user->name}}</h5>
                                                @else
                                                    <h5 style="font-size: 12pt; display: inline;"><a href="dp/{{$cause->fr_profile->company_profile->id}}">
                                                            {{(strlen($cause->fr_profile->company_profile->name)>22) ? substr($cause->fr_profile->company_profile->name, 0, 22) . "...": $cause->fr_profile->company_profile->name}}</a></h5>
                                                @endif
                                            </div>
                                            <div class="col-md-3 ">

                                                <i class="fa fa-clock-o" style="font-size: 14pt; margin-right: 10px"></i>
                                                <span
                                                    class="font-s">
                                                    {{\Carbon\Carbon::parse($cause['cause_start_date'])->diffForHumans()}}
                                                </span>
                                            </div>
                                             <div class="col-md-3">
                                                <i class="fa fa-folder "></i> <span
                                                 class="font-s">
                                                     {{$cause->category->cat_name}}
                                                 </span>
                                            </div>
                                            <div class="col-md-3 ">
                                                <span style="font-size: 10pt"><i class="fa fa-location-arrow "></i> {{$cause->cause_location}}</span>
                                            </div>

                                        </div>

                                        <div class="row cause-donation-detail bg-light p-3 m-2">
                                            <div class="row mb-2 ">

                                                <div class="progress-donation" style="height: 30px;">



                                                    <div class="progress-donation-bar" role="progressbar" style="width: {{100 * $donations->sum('amount') / $cause->cause_goal}}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-md-4" style="text-align: left;"><i class="fa fa-arrow-up"></i> Raised: $ {{$donations->sum('amount')}}</div>
                                                <div class="col-md-4" style="text-align: center;"><i class="fa fa-user"></i> Donors: {{$donations->count()}}</div>
                                                <div class="col-md-4" style="text-align: right;"><i class="fa fa-bullseye"></i> Goal: $ {{number_format($cause->cause_goal)}}</div>
                                            </div>

                                                <div class="input-group justify-content-center">
                                                    @if($cause->fr_profile->frp_user_id != Auth::id())
                                                    <button class="btn btn-success m-2" data-bs-toggle="modal" data-bs-target="#DonationModel"><i class="fa fa-heart"> </i> Quick Donation</button>
                                                   @elseif($cause->fr_profile->frp_user_id == Auth::id())
                                                        <button class="btn btn-theme m-2" data-bs-toggle="modal" data-bs-target="#FollowUpModel"><i class="fa fa-plus"> </i> Add Followup</button>
                                                       @endif
                                                </div>


                                        </div>
                                        <div class="cause-description row text-justify" style="list-style: disc;">
<style>
    ul li {
        list-style-type: disc;
        margin-left: 15px;
        font-size: 11pt;
    }

</style>
                                                {!! $cause->cause_description !!}


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
                                                    <h4 class="flu-card_title text-black">{{$follow->title}}</h4>
                                                </div>
                                                <div class=" row pb-2 font-i" >

                                                    <div class="col-md-6 ">
                                                        <img class="rounded-circle" style=" width: 25px; display: inline;" src="{{asset($cause->fr_profile->user->avatar)}}">
                                                        @if($cause->fr_profile->is_company == 0)
                                                            <h5 style="font-size: 11pt;">{{$cause->fr_profile->user->name}}</h5>
                                                        @else
                                                            <h5 style="font-size: 11pt; display: inline;"><a class=" text-black" href="dp/{{$cause->fr_profile->company_profile->id}}">
                                                                    {{(strlen($cause->fr_profile->company_profile->name)>22) ? substr($cause->fr_profile->company_profile->name, 0, 22) . "...": $cause->fr_profile->company_profile->name}}</a></h5>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-5 ">
                                                        <i class="fa fa-calendar "></i> <span class="font-s">
                                                            {{$follow->date}}
                                                        </span>
                                                    </div>

                                                </div>
                                                <div class="col-md-12">
                                                    {!! $follow->description !!}
                                                </div>


                                            </div>
                                        </div>
                                        @else
                                        <div class="flu-card flu-card--vertical bg-white overflow-hidden mb-4">
                                            <div class="flu-card_img position-relative">

                                            </div>
                                            <div class="flu-card_content">
                                                <div class="flu-card_title-section">
                                                    <h4 class="flu-card_title text-black">{{$follow->title}}</h4>
                                                </div>
                                                <div class=" row pb-2 font-i" >

                                                    <div class="col-md-4 ">
                                                        <img class="rounded-circle" style=" width: 25px; display: inline;" src="{{asset($cause->fr_profile->user->avatar)}}">
                                                        @if($cause->fr_profile->is_company == 0)
                                                            <h5 style="font-size: 12pt; display:inline;" >{{$cause->fr_profile->user->name}}</h5>
                                                        @else
                                                            <h5 style="font-size: 12pt; display: inline;"><a href="dp/{{$cause->fr_profile->company_profile->id}}">
                                                                    {{(strlen($cause->fr_profile->company_profile->name)>22) ? substr($cause->fr_profile->company_profile->name, 0, 22) . "...": $cause->fr_profile->company_profile->name}}</a></h5>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-8 ">
                                                        <i class="fa fa-calendar "></i> <span class="font-s">
                                                            {{$follow->date}}
                                                        </span>
                                                    </div>

                                                </div>

                                                    <div class="col-md-12">
                                                        {!! $follow->description !!}
                                                 </div>

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
                            <h3 class="text-black">Related Causes</h3>
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
                                                <div> {{substr(strip_tags($rel->cause_description), 0, 150)}}</div>

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

@section('footer_script')
    <section id="modelsdefbm">
        <div class="modal fade" id="DonationModel" tabindex="-1" aria-labelledby="DonateModel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <h3>{{substr($cause->cause_title, 0, 50)}}</h3>
                        <p class="font-s text-justify">
                            {{substr($cause->cause_description, 0, 300)}}
                              </p>
                        <h5>Please select an Amount you wish to donate:</h5>

                        <form class="row g-3 justify-center mb-2" method="post" action="{{route('c.store')}}">
@csrf

                            <script>
                                function assignDatatoCF() {
                                    document.getElementById('customfield').innerHTML = '<input type="text" id="amount_field" onchange="$(\'#default_Option5\').val($(\'#amount_field\').val())" name="amount"  class="form-control" style="width: 80px; height: 22px; font-size: 10pt; " placeholder="other..">'
                                }

                                function disableDataCF(){
                                    document.getElementById('customfield').innerHTML = ' <input type=\'text\' disabled class=\'form-control\' style=\'width: 80px; height: 22px; font-size: 10pt; \' placeholder=\'other..\'>';
                                }
                            </script>
                            <div class="toggle-radio justify-content-center">
                                <input type="radio" name="amount" id="default_Option1" value="5" onclick="disableDataCF()" >
                                <label for="default_Option1">5$</label>

                                <input type="radio" name="amount" id="default_Option2" value="10" onclick="disableDataCF()" >
                                <label for="default_Option2">10$</label>

                                <input type="radio" name="amount" id="default_Option3" value="50" checked onclick="disableDataCF()" >
                                <label for="default_Option3">50$</label>

                                <input type="radio" name="amount" value="100"  id="default_Option4" onclick="disableDataCF()" >
                                <label for="default_Option4">$100</label>

                                <input type="radio" id="default_Option5" name="amount" onclick="assignDatatoCF()">
                                <label for="default_Option5">Custom</label>

                                <input type="radio" name="amount" id="default_Option5" value="Option5">
                                <label id="customfield" for="default_Option5"><input type="text" id="amount_field" disabled name="amount"  class="form-control" style="width: 80px; height: 22px; font-size: 10pt; " placeholder="other.."></label>

                            </div>

                                <label for="msg">Leave a message!</label>
                                <textarea name="msg" class="form-control">Dear {{$cause->fr_profile->user->name }},
I am happy to contribute to your cause!

Lots of Love,
</textarea>

<div class="mt-3 row">
    <input type="checkbox" class="form-check-input form-check-inline" name="anon" value="1">Check if you want to donate anonymously
</div>

                            <input type="hidden" value="{{$cause->id}}" name="cause_id">
                            <input type="hidden" value="{{Auth::id()}}" name="user_id">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="subtn_qui_don" class="btn btn-success">Proceed</button>
                        </div>
                    </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="modeldonlst">
        <div class="modal fade" id="DonorsModel" tabindex="-1" aria-labelledby="DonorListModel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content">
                    <div class="modal-body">

                        @if($donations->count()>0)
                            <p>We'd like to thank the donors below who contributed:</p>
                       <table class="table table-striped">
                           <tr>
                               <th>Donor Name</th>
                               <th>Amount</th>
                               <th>Date</th>
                           </tr>
                           @foreach($donations as $don)
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
        </div>

    </section>
    @if(Auth()->check())
    <section id="modelfollow">
        <div class="modal fade" id="FollowUpModel" tabindex="-1" aria-labelledby="FollowUpNewModel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content">
                    <div class="modal-body ">
                        <form method="post" action="{{route('c.store')}} " enctype="multipart/form-data">
                            @csrf

                            <label for="title">Title</label>
                            <input type="text" class="form-control " name="title">

                            <label for="title">Image</label>
                            <input type="file" class="form-control " name="img">

                            <label for="title">Description</label>
                            <textarea class="form-control " name="description"></textarea>

                            <input type="hidden" name="cause_id" value="{{$cause->id}}">
                            <input type="hidden" name="user_id" value="{{Auth()->user()->id}}">

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="btn_add_new_followup" class="btn btn-theme"><i class="fa fa-floppy-o" style="margin-right: 10px;"></i> Add</button>

                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endif
    @endsection

