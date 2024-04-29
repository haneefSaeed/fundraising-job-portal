@extends('layouts.app')
@section('header')
    <title>Post a new fundraising</title>


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
<script>


</script>
@endsection


@section('content')
      <section id="profileDetail">
        <div class="container">
            @if(isset($msg))
                @if($msg ==1)
                    <div class="alert alert-success m-4"><i class="fa fa-info-circle"></i> Your profile has been succesfully created</div>
                    @elseif($msg ==2)
                        <div class="alert alert-success m-4"><i class="fa fa-info-circle"></i> Your Biography data has been succesfully created</div>
                    @elseif($msg = 3)
                <div class="alert alert-success m-4"><i class="fa fa-info-circle"></i> Your fundraising is under process!</div>

                    @endif
            @endif
            <div class="row p-3">

                <div class="col-lg-6 d-flex items-center">
                    <div class="row">
                        <div class="col-sm-12">
                            <h1>Start a new Fundraising</h1>
                        </div>
                        <div class="col-sm-12">
                            <p>We can help you acheive your goal!!</p>
                        </div>
                        <div class="col-sm-12 mt-5">

                            @if(\App\Models\fr_profile::where('frp_user_id', '=', Auth()->user()->id)->count() < 1)
                                <form method="post" enctype="multipart/form-data" action="{{route('p.store')}}">
                                    @csrf
                                    <div id="form_frp_data" class="row ">
                                            <h5><span style="color:darkred">Step1 :</span> Start by writing a breif biography</h5>
                                            <textarea name="frp_biography" class="form-control w-75" placeholder="e.g. We are a family of a son fighting cancer :("></textarea>
                                        <div class="col-sm-1">
                                            <input type="hidden" name="frp_user_id" value="{{Auth()->user()->id}}">
                                            <button type="submit" name="store_frp_bio" class="btn btn-sm btn-theme ">Save</button>
                                        </div>

                                    </div>

                                </form>
                            @endif

                        </div>
                        <div class="col-sm-12 mt-3">
                            @if(\App\Models\company_profile::where('user_id', '=', Auth()->user()->id)->count() < 1)
                            <h5> If you are a company, create a company profile so people can see your activities</h5>
                            <button type="button" class="btn btn-warning"
                                    onclick="window.location = '/p/' + '{!! encrypt(Auth()->user()->id)!!}?reqcpp&form=cause'">Go to Profile  <i class="fa fa-arrow-right"></i> </button>
                            @else

                                @if(App\Models\fr_profile::where('id', App\Models\fr_profile::where('frp_user_id', Auth()->user()->id)->first()->id)->first()->is_company!=1)

                                    <p style=" font-size:0;">{{App\Models\fr_profile::where('id', App\Models\fr_profile::where('frp_user_id', Auth()->user()->id)->first()->id)->update(array('is_company'=> 1, 'comp_id' => App\Models\company_profile::where("user_id", Auth()->user()->id)->first()->id))}}</p>
                                    @endif
                            @endif
                        </div>
                    </div>


                </div>
                <div class="col-lg-6">
                    <form method="post" enctype="multipart/form-data"    >
                @csrf
                        <fieldset id="cause_form_fields" >
                            <div id="notif">

                            </div>
                        <table>
                            <tr>
                                <td class="p-2" colspan="4"><label for="name">Cause Title</label>
                                    <input type="text" class="form-control" id="cause_title" name="cause_title" placeholder="e.g. Help us with...">
                                    @if($errors->has('cause_title'))
                                        <div class="error"> {{$errors->first('cause_title')}}</div>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="p-2" colspan="4">
                                    <label for="name">Cause Description</label> <textarea id="cause_details" name="cause_description" class="form-control" placeholder="Explain what exactly the fundraising is for?"></textarea>
                                    @if($errors->has('cause_description'))
                                        <div class="error"> {{$errors->first('cause_description')}}</div>
                                    @endif
                                </td>

                            </tr>
                            <tr>
                                <td class="p-2"><label for="name">Image</label> <input type="file" class="form-control" name="cause_img" id="cause_img" value="">
                                    @if($errors->has('cause_img'))
                                        <div class="error"> {{$errors->first('cause_img')}}</div>
                                    @endif
                                </td>
                            </tr>
                            <tr>

                               <td class="p-2"><label for="name">Start Date</label><input type="datetime-local" class="form-control" id="cause_start_date" value="{{Date('Y-m-d H:i:s')}}" name="cause_start_date" >
                                   @if($errors->has('cause_start_date'))
                                       <div class="error"> {{$errors->first('cause_start_date')}}</div>
                                   @endif
                               </td>

                                <td class="p-3"><label for="name">Ending Date</label><input type="datetime-local" class="form-control" id="cause_end_date" name="cause_end_date" >
                                    @if($errors->has('cause_end_date'))
                                        <div class="error"> {{$errors->first('cause_end_date')}}</div>
                                    @endif
                                </td>
                            </tr>
                            <tr>

                                <td class="p-2"><label for="cause_cat_id">category</label>
                                    <select class="form-control" id="cause_cat_id" name="cause_cat_id">
                                        <option selected value="1">Select</option>
                                        @foreach($cats as $cat)
                                            <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                                        @endforeach

                                    </select>

                                    @if($errors->has('cause_cat_id'))
                                        <div class="error"> {{$errors->first('cause_cat_id')}}</div>
                                    @endif</td>


                                <td class="p-3"> <label for="name">Location</label> <input type="text" class="form-control" id="cause_location" name="cause_location" placeholder="eg. Kabul, Afghanistan">
                                    @if($errors->has('cause_location'))
                                        <div class="error"> {{$errors->first('cause_location')}}</div>
                                    @endif
                                        </td>
                            </tr>
                            <tr>

                                <td class="p-2"><label for="name">Target Goal</label><input type="number" class="form-control" name="cause_goal" placeholder="e.g. 3000" >

                                    @if($errors->has('cause_goal'))
                                        <div class="error"> {{$errors->first('cause_goal')}}</div>
                                    @endif

                                </td>

                                <td class="p-3"><label for="name">Tags</label><input type="text" class="form-control" name="cause_tags" placeholder="e.g. Refuge, afghan, homeless" >
                                    @if($errors->has('cause_tags'))
                                        <div class="error"> {{$errors->first('cause_tags')}}</div>
                                    @endif</td>
                            </tr>

                        </table>
                            @if(isset(App\Models\fr_profile::where('frp_user_id', Auth()->user()->id)->first()->id))
                            <input type="hidden" value="{{App\Models\fr_profile::where('frp_user_id', Auth()->user()->id)->first()->id}}" name="cause_frp_id">
                            @endif
                            <input type="hidden"value="0" name="cause_status">
                            <button type="submit" name="subtn_new_cause" formaction="{{route('c.store')}}" class="btn btn-theme mt-3 p-2" ><i class="fa fa-floppy-o" style="margin-right: 10px;"></i> Post</button>

                        </fieldset>

                    </form>
                </div>


        </div>
        </div>



    </section>


@endsection

@section('footer_scripts')

    <script>
        $(document).ready(function(){
            if ($('#form_frp_data').length>0){
                console.log("fr profile exist??? ")
                $('#cause_form_fields').attr('disabled', 'disabled');
                tinyMCE.get('cause_details').getBody().setAttribute('contenteditable', false);
                $('#notif').html('<div class="alert alert-warning "><i class="fa fa-exclamation-triangle"> </i> Please complete your bio first </div>');
                console.log("disaled ")
            }
        })
        $(document).ready(function () {
            $('#tbl_mydonations').DataTable();
        });

        $(document).ready(function () {
            $('#tbl_myJobApplications').DataTable();
        });

        $(document).ready(function () {
            $('#tbl_myPostedJobs').DataTable();
        });
        $(document).ready(function () {
            $('#tbl_myPostedDonations').DataTable();
        });


    </script>
@endsection

