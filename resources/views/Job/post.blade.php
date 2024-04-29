@extends('layouts.app')
@section('header')
    <title>Post a new Job</title>


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

                <div class="col-lg-5 d-flex items-center">
                    <div class="row">
                        <div class="col-sm-12">
                            <h1>Post a new Vacancy!!!</h1>
                        </div>
                        <div class="col-sm-12">
                            <p>We can help you acheive your goal!!</p>
                        </div>
                        <div class="col-sm-12 mt-5">

                        </div>
                        <div class="col-sm-12 mt-3">
                            @if(\App\Models\company_profile::where('user_id', '=', Auth()->user()->id)->count() < 1)
                                <div id="form_comp_data">
                            <h5> If you are a company, create a company profile so people can see your activities</h5>
                            <button type="button" class="btn btn-warning"
                                    onclick="window.location = '/p/' + '{!! encrypt(Auth()->user()->id)!!}?reqcpp&form=job'">Go to Profile  <i class="fa fa-arrow-right"></i> </button>
                                </div>
                                    @else

                            @endif
                        </div>
                    </div>


                </div>
                <div class="col-lg-7">

                       <form method="post" enctype="multipart/form-data" action="{{route('j.store')}}">
                           @csrf

                           <fieldset id="job_form_field" >
                               <div id="notif">

                               </div>
                               <table>
                                   <tr>
                                       <td class="p-2" colspan="4"><label for="name">Job Title</label>
                                           <input type="text" class="form-control" id="title" required name="title" placeholder="e.g. Senior Developer">
                                           @if($errors->has('title'))
                                               <div class="error"> {{$errors->first('title')}}</div>
                                           @endif
                                       </td>
                                   </tr>
                                   <tr>
                                       <td class="p-2" colspan="4"><label for="name">Job Reference</label>
                                           <input type="text" class="form-control" id="title" name="reference" placeholder="e.g. VAC#144">
                                           @if($errors->has('title'))
                                               <div class="error"> {{$errors->first('title')}}</div>
                                           @endif
                                       </td>
                                   </tr>
                                   <tr>
                                       <td class="p-2" colspan="4"><label for="name">Ad Description</label>
                                           <input type="text" class="form-control" id="small_description" name="small_description" placeholder="">
                                           @if($errors->has('small_description'))
                                               <div class="error"> {{$errors->first('small_description')}}</div>
                                           @endif
                                       </td>
                                   </tr>
                                   <tr>
                                       <td class="p-2" colspan="4">
                                           <label for="name">Description</label><textarea required name="description" class="form-control initTMC" id="job_description" placeholder="Write a Job Description, Qualification, etc..."></textarea>
                                           @if($errors->has('description'))
                                               <div class="error"> {{$errors->first('description')}}</div>
                                           @endif
                                       </td>

                                   </tr>
                                   <tr>

                                       <td class="p-2">
                                           <label for="name">Minimum Education</label>

                                           <select  class="form-control" name="edu_lvl_id" required id="edu_lvl_id" >
                                               @foreach($edulvls as $edu)
                                                   <option value="{{$edu->id}}">{{$edu->detail}}</option>
                                               @endforeach
                                           </select>
                                           @if($errors->has('edu_lvl_id'))
                                               <div class="error"> {{$errors->first('edu_lvl_id')}}</div>
                                           @endif
                                       </td>
                                       <td class="p-2">
                                           <label for="cause_cat_id">Minimum Experience</label>
                                           <select class="form-control" id="exp_lvl_id" name="exp_lvl_id">
                                               <option selected value="1">Select</option>
                                               @foreach($explvls as $exp)
                                                   <option value="{{$exp->id}}">{{$exp->detail}}</option>
                                               @endforeach
                                           </select>

                                           @if($errors->has('exp_lvl_id'))
                                               <div class="error"> {{$errors->first('exp_lvl_id')}}</div>
                                           @endif</td>

                                   </tr>
                                   <tr>

                                       <td class="p-2">
                                           <label for="name">Gender preference </label>
                                           <select type="text" class="form-control" id="gender" name="pref_gender" >
                                               <option value="male">Male</option>
                                               <option value="male">Female</option>
                                               <option value="male" selected>Any</option>
                                           </select>
                                           @if($errors->has('pref_gender'))
                                               <div class="error"> {{$errors->first('pref_gender')}}</div>
                                           @endif
                                       </td>
                                   </tr>
                                   <tr>

                                       <td class="p-2">
                                           <label for="cat_id">category</label>
                                           <select class="form-control" id="cat_id" name="cat_id">
                                               <option selected value="1">Select</option>
                                               @foreach($cats as $cat)
                                                   @if($cat->cat_root != 0)
                                                       <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                                                   @endif
                                               @endforeach
                                           </select>

                                           @if($errors->has('cat_id'))
                                               <div class="error"> {{$errors->first('cat_id')}}</div>
                                           @endif</td>


                                       <td class="p-2" colspan="2">
                                           <label for="name">Location</label>
                                           <input type="text" class="form-control" id="location"  name="location" >
                                           @if($errors->has('location'))
                                               <div class="error"> {{$errors->first('location')}}</div>
                                           @endif
                                       </td>





                                   </tr>
                                   <tr>
                                       <td class="p-2">
                                           <label for="cause_cat_id">Employment Type</label>
                                           <select class="form-control" id="emp_type_id" name="emp_type_id">
                                               <option selected value="1">Select</option>
                                               @foreach($emptype as $empt)
                                                   <option value="{{$empt->id}}">{{$empt->detail}}</option>
                                               @endforeach
                                           </select>

                                           @if($errors->has('emp_type_id'))
                                               <div class="error"> {{$errors->first('emp_type_id')}}</div>
                                           @endif</td>

                                       <td class="p-2">
                                           <label for="name">Closing Date</label>
                                           <input type="datetime-local" class="form-control" name="closing_date" >

                                           @if($errors->has('closing_date'))
                                               <div class="error"> {{$errors->first('closing_date')}}</div>
                                           @endif

                                       </td>
                                   </tr>
                                   <tr>

                                       <td class="p-2">
                                           <label for="name">Is remote Job?</label>
                                           <input class="form-check-inline" type="radio" name="is_remote" value="0"> Yes
                                           <input class="form-check-inline" type="radio" name="is_remote" value="1"> No


                                       @if($errors->has('is_remote'))
                                               <div class="error"> {{$errors->first('is_remote')}}</div>
                                           @endif

                                       </td>
                                   </tr>
                                   <tr>
                                       <td class="p-2" colspan="4"><label for="name">Tags</label><input type="text" class="form-control" name="cause_tags" placeholder="e.g. Refuge, afghan, homeless" >
                                           @if($errors->has('cause_tags'))
                                               <div class="error"> {{$errors->first('cause_tags')}}</div>
                                           @endif</td>
                                   </tr>

                               </table>


                               <input type="hidden"value="0" name="status">
                               @if(\App\Models\company_profile::where('user_id', '=', Auth()->user()->id)->first() !=null)
                               <input type="hidden"value="{{\App\Models\company_profile::where('user_id', '=', Auth()->user()->id)->first()->id}}" name="comp_profile_id">
                               @endif
                                   <input type="hidden"value="{{Date('Y-m-d H:i:s')}}" name="posted_date">
                               <button type="submit" name="subtn_new_job" class="btn btn-theme mt-3 p-2" ><i class="fa fa-floppy-o" style="margin-right: 10px;"></i> Post</button>

                           </fieldset>

                       </form></div>



        </div>
        </div>



    </section>

<script>
    $(document).ready(function(){
        if ($('#form_comp_data').length>0){
            console.log("this is called")
            $('#job_form_field').attr('disabled', 'disabled');
            tinymce.get('job_description').getBody().setAttribute('contenteditable', false);
            $('#notif').html('<div class="alert alert-warning "><i class="fa fa-exclamation-triangle"> </i> Please Create a Company profile first! </div>');
            console.log("disaled ")
        }
    })
</script>
@endsection

@section('footer_scripts')

    <script>

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

