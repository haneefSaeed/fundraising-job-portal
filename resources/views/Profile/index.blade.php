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
    <script type="text/javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function ConfirmDelete(frid) {
            swal({
                title: "Are you sure you want to End this Cause?",
                text: "Fundraising # "+ frid + "is About to End and you will not be recovered",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: "{{URL::route('p.update' , 0 )}}",
                            type: "PATCH",
                            data: {
                                _token: '{{ csrf_token() }}',
                                sendata: frid,
                                form: 3
                            },
                            dataType: "html",
                            success: function () {
                                swal("Done!", "FR # " + frid + " was deleted", "success");
                            }
                        });
                    }});

        }
    </script>
<script>
    $(document).ready(function(){
        if(window.location.href.includes('reqcpp')) {
            console.log("got the URL")
            document.getElementById('v-pills-prof-info-tab').classList.add('active');
            console.log("active tab")
            document.getElementById('v-pills-prof-info').classList.add('show', 'active');
            console.log("active content")
            document.getElementById('company-tab').classList.add('active');
            console.log("select company tab")

            document.getElementById('company_info').classList.add('show', 'active');
            console.log("select company tab content")

            document.getElementById('notif_primary').classList.add('alert', 'alert-primary');
            document.getElementById('notif_primary').innerHTML = '<i class="fa fa-exclamation-circle"></i> Hey, You need to complete your profile!!!';
            setTimeout(function(){
                document.getElementById('notif_primary').classList.remove('alert', 'alert-primary');
                document.getElementById('notif_primary').innerHTML = ' ';


            }, 7000)
        }
        else if( window.location.href.includes('reqppp')) { //request personal information
            document.getElementById('v-pills-prof-info-tab').classList.add('active');
            document.getElementById('v-pills-prof-info').classList.add('show', 'active');
            document.getElementById('career-tab').classList.add('active');

            document.getElementById('career_info').classList.add('show', 'active');

            document.getElementById('notif_primary').classList.add('alert', 'alert-primary');
            document.getElementById('notif_primary').innerHTML = '<i class="fa fa-exclamation-circle"></i> Hey, You need to complete your Professional profile!!!';
            setTimeout(function(){
                document.getElementById('notif_primary').classList.remove('alert', 'alert-primary');
                document.getElementById('notif_primary').innerHTML = ' ';


            }, 7000)
        }
    })


</script>


@endsection


@section('content')

    <section id="breadcrumbs">

        <div class="row p-5" style="background-color: #eee; color:white;">
            <div class="container">
                <div class="row text-center text-black">
                    <div class="col-md-3">
                        <img class="rounded-circle" width="180px;" height="180px;" src="{{asset($user->avatar)}}">
                    </div>
                    <div class="col-md-5 text-align-left mt-4">
                        <h1>Hi, {{$user->name}} </h1>
                        <h4>Welcome to your profile!</h4>
                        @if(\App\Models\prof_profile::where('user_id', '=', Auth()->user()->id)->first()!=null)
                        <p><i class="fa fa-info-circle"></i> You have donated {{{\App\Models\donations::where('user_id', '=', Auth()->user()->id)->sum('amount')}}} and applied for {{{\App\Models\application::where('prof_prof_id', '=', \App\Models\prof_profile::where('user_id', '=', Auth()->user()->id)->first()->id)->count()}}} jobs. Thank you! </p>
                        @else
                            <p><i class="fa fa-info-circle"></i>You have donated $ {{{\App\Models\donations::where('user_id', '=', Auth()->user()->id)->sum('amount')}}}, so far!! Thank you! </p>
                        @endif
                            <div id="notif_primary"></div>
                    </div>

                </div>
            </div>
        </div>

    </section>

    <section id="profileDetail">
        <div class="container">
            <div class="row ">



                <div class="d-flex align-items-start">
                    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link" id="v-pills-user-info-tab" data-bs-toggle="pill" data-bs-target="#v-pills-user-info" type="button" role="tab" aria-controls="v-pills-user-info" aria-selected="true">  <i class="fa fa-user" style="margin-right: 10px;"></i> User information</button>
                        <button class="nav-link" id="v-pills-prof-info-tab" data-bs-toggle="pill" data-bs-target="#v-pills-prof-info" type="button" role="tab" aria-controls="v-pills-prof-info" aria-selected="false"><i class="fa fa-black-tie" style="margin-right: 10px;"></i> Professional profile</button>
                        <button class="nav-link" id="v-pills-donations-tab" data-bs-toggle="pill" data-bs-target="#v-pills-donations" type="button" role="tab" aria-controls="v-pills-donations" aria-selected="false"><i class="fa fa-heart" style="margin-right: 10px;"></i> Donations </button>
                        <button class="nav-link" id="v-pills-app-jobs-tab" data-bs-toggle="pill" data-bs-target="#v-pills-app-jobs" type="button" role="tab" aria-controls="v-pills-app-jobs" aria-selected="false"><i class="fa fa-file" style="margin-right: 10px;"></i> Applied Jobs</button>
                        <button class="nav-link" id="v-pills-post-jobs-tab" data-bs-toggle="pill" data-bs-target="#v-pills-post-jobs" type="button" role="tab" aria-controls="v-pills-post-jobs" aria-selected="false"><i class="fa fa-files-o" style="margin-right: 10px;"></i> Posted Jobs</button>
                        <button class="nav-link" id="v-pills-post-donation-tab" data-bs-toggle="pill" data-bs-target="#v-pills-post-donation" type="button" role="tab" aria-controls="v-pills-post-donation" aria-selected="false"><i class="fa fa-heart-o" style="margin-right: 10px;"></i> Posted Donations</button>
                    </div>
                    <div class="tab-content overflow-auto  p-3" id="v-pills-tabContent">
                        <div class="tab-pane fade " id="v-pills-user-info" role="tabpanel" aria-labelledby="v-pills-user-info-tab">
                            <h3>Personal Information</h3>
                            <form>
                                <table>
                                    <tr> <td class="p-2"><label for="name">Name</label> </td>
                                        <td class="p-2"><input type="text" class="form-control" value="{{$user->name}}"> </td>
                                        <td class=" p-3"><label for="name">Date of Birth</label> </td>
                                        <td class=" p-3"><input type="date" class="form-control" value="{{$user->dob}}" > </td>
                                    </tr>
                                    <tr>
                                        <td class="p-2"><label for="name">Phone Number</label> </td>
                                        <td class="p-2"><input type="number" class="form-control"> </td>
                                        <td class="p-3"><label for="name">Gender</label> </td>
                                        <td class="p-3"><select class="form-control" >
                                                <option>Male</option>
                                                <option>Female</option>
                                                <option>Other</option>
                                            </select> </td>
                                    </tr>
                                    <tr>
                                        <td class="p-2"><label for="name">Email Address</label> </td>
                                        <td class="p-2"><input type="email" class="form-control" value="{{$user->email}}" > </td>
                                        <td class="p-3"><label for="name">Confrim Email Address</label> </td>
                                        <td class="p-3"><input type="email" class="form-control" > </td>
                                    </tr>
                                    <tr>
                                        <td class="p-2"><label for="name">Username</label> </td>
                                        <td class="p-2"><input type="text" class="form-control" value="{{$user->username}}"> </td>
                                    </tr>
                                    <tr>
                                        <td class="p-2"><label for="name">Password</label> </td>
                                        <td class="p-2"><input type="password" class="form-control" > </td>
                                        <td class="p-3"><label for="name">Confrim Password</label> </td>
                                        <td class="p-3"><input type="password" class="form-control" > </td>
                                    </tr>
                                </table>

                                <button class="btn btn-danger mt-3"><i class="fa fa-floppy-o" style="margin-right: 10px;"></i> Save Changes</button>


                            </form></div>
                        <div class="tab-pane fade " id="v-pills-prof-info" role="tabpanel" aria-labelledby="v-pills-prof-info-tab">

                            <h3>Professional information</h3>
                            <ul class="nav nav-tabs" id="prof_info_type_tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link " id="career-tab" data-bs-toggle="tab" data-bs-target="#career_info" type="button" role="tab" aria-controls="career" aria-selected="false" >Career information</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link " id="company-tab" data-bs-toggle="tab" data-bs-target="#company_info" type="button" role="tab" aria-controls="company"aria-selected="false" >Company Information</button>
                                </li>

                            </ul>
                            <div class="tab-content" id="myTabContent">

                                <div class="tab-pane fade" id="career_info" role="tabpanel" aria-labelledby="career-tab">
                                    @if(App\Models\prof_profile::where('user_id', '=', Auth()->user()->id)->count()!=1)
                                        <div class="alert alert-info">Plase complete your profile before applying for a job </div>

                                    <form method="post" enctype="multipart/form-data" action="{{route('p.store')}}">
                                        @csrf
                                        <table>
                                            <tr> <td class="p-2"><label for="name">Career Level</label> </td>
                                                <td class="p-2">

                                                    <select class="form-control" name="career_id" >
                                                        <option selected>Select</option>
                                                        @foreach($careers as $car)
                                                            <option value="{{$car->id}}">{{$car->level}}</option>
                                                        @endforeach
                                                    </select>

                                                </td>
                                                <td class=" p-3"><label for="name">Current Address</label> </td>
                                                <td class=" p-3">
                                                    <input type="text" name="location">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-2"><label for="name">Current Position</label> </td>
                                                <td class="p-2"><input type="text" class="form-control" name="current_position" placeholder="Ex: Sales Executive"> </td>
                                            </tr>
                                            <tr>
                                                <td class="p-2"><label for="name">Current Company</label> </td>
                                                <td class="p-2"><input type="text" class="form-control" name="current_company" placeholder="Ex: Orbit Technology"> </td>
                                                <td class="p-2"><label for="name">Total Experience</label> </td>
                                                <td class="p-2"><input type="number" class="form-control" name="total_exp" placeholder="years of experience"> </td>
                                            </tr>
                                            <tr>
                                                <td class="p-2"><label for="name">Education Level</label> </td>
                                                <td class="p-2">

                                                    <select class="form-control" name="edu_id">
                                                        <option selected>Select</option>
                                                        @foreach($edu_levels as $elvl)
                                                            <option value="{{$elvl->id}}">{{$elvl->detail}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-2"><label for="name">Your CV</label> </td>
                                                <td class="p-2"><input type="file" name="cv" class="form-control" placeholder="Upload CV" > </td>
                                                <td class="p-3"><label for="name">Your Cover Letter</label> </td>
                                                <td class="p-3"><input type="file" name="cl" class="form-control" > </td>
                                            </tr>
                                            <tr>
                                                <td class="p-2"><label for="otherDocs">Other Documents</label></td>
                                                <td class="p-2"><input type="file" name="other_doc" class="form-control"> </td>
                                            </tr>
                                            <tr>
                                                <td class="p-2"><label for="statement">Statement</label> </td>
                                                <td class="p-2" colspan="4">
                                                    <textarea class="form-control" name="statement"></textarea>
                                                </td>
                                            </tr>
                                        </table>
                                            <input type="hidden" value="{{Auth()->user()->id}}" name="user_id">
                                        <button class="btn btn-danger mt-4" type="submit" name="btn_submit_career_info"><i class="fa fa-floppy-o" style="margin-right: 10px;"></i> Save Changes</button>

                                    </form>
                                        @else
                                        <form method="post" enctype="multipart/form-data" action="{{route('p.store')}}">
                                            @csrf
                                            <table>
                                                <tr> <td class="p-2"><label for="name">Career Level</label> </td>
                                                    <td class="p-2">

                                                        <select class="form-control" name="career_id" >
                                                            <option selected>Select</option>
                                                            @foreach($careers as $car)
                                                                <option value="{{$car->id}}">{{$car->level}}</option>
                                                            @endforeach
                                                        </select>

                                                    </td>
                                                    <td class=" p-3"><label for="name">Current Address</label> </td>
                                                    <td class=" p-3">
                                                        <input type="text" name="location">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="p-2"><label for="name">Current Position</label> </td>
                                                    <td class="p-2"><input type="text" class="form-control" name="current_position" placeholder="Ex: Sales Executive"> </td>
                                                </tr>
                                                <tr>
                                                    <td class="p-2"><label for="name">Current Company</label> </td>
                                                    <td class="p-2"><input type="text" class="form-control" name="current_company" placeholder="Ex: Orbit Technology"> </td>
                                                    <td class="p-2"><label for="name">Total Experience</label> </td>
                                                    <td class="p-2"><input type="number" class="form-control" name="total_exp" placeholder="years of experience"> </td>
                                                </tr>
                                                <tr>
                                                    <td class="p-2"><label for="name">Education Level</label> </td>
                                                    <td class="p-2">

                                                        <select class="form-control" name="edu_id">
                                                            <option selected>Select</option>
                                                            @foreach($edu_levels as $elvl)
                                                                <option value="{{$elvl->id}}">{{$elvl->detail}}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="p-2"><label for="name">Your CV</label> </td>
                                                    <td class="p-2"><input type="file" name="cv" class="form-control" placeholder="Upload CV" > </td>
                                                    <td class="p-3"><label for="name">Your Cover Letter</label> </td>
                                                    <td class="p-3"><input type="file" name="cl" class="form-control" > </td>
                                                </tr>
                                                <tr>
                                                    <td class="p-2"><label for="otherDocs">Other Documents</label></td>
                                                    <td class="p-2"><input type="file" name="other_doc" class="form-control"> </td>
                                                </tr>
                                                <tr>
                                                    <td class="p-2"><label for="statement">Statement</label> </td>
                                                    <td class="p-2" colspan="4">
                                                        <textarea class="form-control" name="statement"></textarea>
                                                    </td>
                                                </tr>
                                            </table>

                                            <button class="btn btn-danger mt-4" type="submit" name="btn_update_career_info"><i class="fa fa-floppy-o" style="margin-right: 10px;"></i> Update</button>

                                        </form>
                                        @endif

                                </div>

                                <div class="tab-pane fade" id="company_info" role="tabpanel" aria-labelledby="company-tab">

                                        @if(App\Models\company_profile::where('user_id', '=', Auth()->user()->id)->count() != 1)
                                        <form method="post" enctype="multipart/form-data" action="{{route('p.store')}}">
                                            @csrf
                                            <table>
                                                <td class="p-2">
                                                    <label for="name">Company Name</label>
                                                </td>

                                                <td class="p-2">
                                                    <input type="text" name="name" class="form-control" placeholder="Ex: Orbit Technology">
                                                    @if($errors->has('name'))
                                                        <div class="error">{{$errors->first('name')}}</div>
                                                    @endif
                                                </td>

                                                <td class=" p-3"><label for="name">Company Size</label> </td>
                                                <td class=" p-3">

                                                    <select class="form-control" name="comp_size_id">
                                                        <option selected>Select</option>
                                                        @foreach($compsizes as $size)
                                                            <option value="{{$size->id}}">{{$size->range}}</option>
                                                            @endforeach
                                                    </select>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-2"><label for="name">Company Email Email</label> </td>
                                                <td class="p-2"><input type="text" class="form-control" name="email" placeholder="Ex: info@company.com">
                                                    @if($errors->has('email'))
                                                        <div class="error">{{$errors->first('email')}}</div>
                                                    @endif</td>
                                                <td class="p-3"><label for="name">Industry</label> </td>
                                                <td class="p-3"><input type="text" class="form-control" name="industry" placeholder="Ex: Manufacturing">
                                                    @if($errors->has('industry'))
                                                        <div class="error">{{$errors->first('industry')}}</div>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-2"><label for="name">Website</label> </td>
                                                <td class="p-2"><input type="text" name="website" class="form-control" placeholder="Ex: www.company.com"> </td>
                                                <td class="p-3"><label for="name">Contact Number</label> </td>
                                                <td class="p-3"><input type="number" name="phone" class="form-control" placeholder="Ex: 079000000"> </td>
                                            </tr>
                                            <tr>
                                                <td class="p-2"><label for="name">Address</label> </td>
                                                <td class="p-2" colspan="4"><input name="address" type="text" class="form-control"> </td>

                                            </tr>
                                            <tr>
                                                <td class="p-2"><label for="name">Facebook Link</label> </td>
                                                <td class="p-2"><input type="text" name="facebook" class="form-control"> </td>
                                                <td class="p-3"><label for="name">Instagram Link</label> </td>
                                                <td class="p-3"><input type="text" name="instagram" class="form-control"> </td>
                                            </tr>
                                            <tr>
                                                <td class="p-2"><label for="name">LinkdIn Link</label> </td>
                                                <td class="p-2"><input type="text" name="linkedin" class="form-control"> </td>
                                                <td class="p-3"><label for="name">Twitter Link</label> </td>
                                                <td class="p-3"><input type="text" name="twitter" class="form-control"> </td>
                                            </tr>
                                            <tr>
                                                <td class="p-2"><label for="name">Company Bio</label> </td>
                                                <td colspan="4">
                                                    <textarea class="form-control" name="statement"></textarea>
                                                    @if($errors->has('statement'))
                                                        <div class="error">{{$errors->first('statement')}}</div>
                                                    @endif
                                                </td>
                                            </tr>
                                        </table>
                                            <input type="hidden" name="user_id" value="{{Auth()->user()->id}}">

                                            <input type="hidden" name="form" value="
                                @if(isset($_GET['form']))
                                {{$_GET['form']}}
                                @endif">
                                        <button  type="submit" class="btn btn-danger mt-4" name="store_new_company_info" ><i class="fa fa-floppy-o" style="margin-right: 10px;"></i> Save Changes</button>
                                        </form>
                                        @else
                                        <form method="post" enctype="multipart/form-data" action="{{route('p.update', $cprof->id)}}">
                                            @csrf
                                            @method('PUT')
                                            <table>
                                                <td class="p-2">
                                                    <label for="name">Company Name</label>
                                                </td>

                                                <td class="p-2">
                                                    <input type="text" name="name" class="form-control" placeholder="Ex: Orbit Technology" value="{{$cprof->name}}">
                                                    @if($errors->has('name'))
                                                        <div class="error">{{$errors->first('name')}}</div>
                                                    @endif
                                                </td>

                                                <td class=" p-3"><label for="name">Company Size</label> </td>
                                                <td class=" p-3">

                                                    <select class="form-control" name="comp_size_id">
                                                        <option selected value="{{$cprof->comp_size_id}}">{{$cprof->comp_size->range}}</option>
                                                        @foreach($compsizes as $size)
                                                            <option value="{{$size->id}}">{{$size->range}}</option>
                                                        @endforeach
                                                    </select>

                                                </td>
                                                </tr>
                                                <tr>
                                                    <td class="p-2"><label for="name">Company Email Email</label> </td>
                                                    <td class="p-2"><input type="text" class="form-control" name="email" value="{{$cprof->email}}" placeholder="Ex: info@company.com">
                                                        @if($errors->has('email'))
                                                            <div class="error">{{$errors->first('email')}}</div>
                                                        @endif</td>
                                                    <td class="p-3"><label for="name">Industry</label> </td>
                                                    <td class="p-3"><input type="text" class="form-control" name="industry" value="{{$cprof->industy}}" placeholder="Ex: Manufacturing">
                                                        @if($errors->has('industry'))
                                                            <div class="error">{{$errors->first('industry')}}</div>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="p-2"><label for="name">Website</label> </td>
                                                    <td class="p-2"><input type="text" name="website" value="{{$cprof->website}}"class="form-control" placeholder="Ex: www.company.com"> </td>
                                                    <td class="p-3"><label for="name">Contact Number</label> </td>
                                                    <td class="p-3"><input type="number" name="phone" class="form-control" value="{{$cprof->phone}}" placeholder="Ex: 079000000"> </td>
                                                </tr>
                                                <tr>
                                                    <td class="p-2"><label for="name">Address</label> </td>
                                                    <td class="p-2" colspan="4"><input name="address" type="text" value="{{$cprof->address}}" class="form-control"> </td>

                                                </tr>
                                                <tr>
                                                    <td class="p-2"><label for="name">Facebook Link</label> </td>
                                                    <td class="p-2"><input type="text" name="facebook" class="form-control" value="{{$cprof->facebook}}"> </td>
                                                    <td class="p-3"><label for="name">Instagram Link</label> </td>
                                                    <td class="p-3"><input type="text" name="instagram" class="form-control" value="{{$cprof->instagram}}"> </td>
                                                </tr>
                                                <tr>
                                                    <td class="p-2"><label for="name">LinkdIn Link</label> </td>
                                                    <td class="p-2"><input type="text" name="linkedin" class="form-control" value="{{$cprof->linkedin}}"> </td>
                                                    <td class="p-3"><label for="name">Twitter Link</label> </td>
                                                    <td class="p-3"><input type="text" name="twitter" class="form-control" value="{{$cprof->twitter}}"> </td>
                                                </tr>
                                                <tr>
                                                    <td class="p-2"><label for="name">Company Bio</label> </td>
                                                    <td colspan="4">
                                                        <textarea class="form-control" name="statement">{{$cprof->statement}}</textarea>
                                                        @if($errors->has('statement'))
                                                            <div class="error">{{$errors->first('statement')}}</div>
                                                        @endif
                                                    </td>
                                                </tr>
                                            </table>
                                            <input type="hidden" name="user_id" value="{{Auth()->user()->id}}">
                                            <button  type="submit" class="btn btn-danger mt-4" name="btn_update_company_info" ><i class="fa fa-floppy-o" style="margin-right: 10px;"></i> Update<button>
                                        </form>
                                        @endif
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="v-pills-donations" role="tabpanel" aria-labelledby="v-pills-donations-tab">
                            <div class="row w-100" >
                            <h3>My Donations</h3>
                            <table id="tbl_mydonations" class="table table-striped w-100" style="min-width: 800px;">
                               <thead>
                               <tr>
                                   <td style="font-weight: 600;">ID</td>
                                   <td style="font-weight: 600;">Cause Title</td>
                                   <td style="font-weight: 600;">Date</td>
                                   <td style="font-weight: 600;">Amount</td>
                                   <td style="font-weight: 600;">Msg</td>
                                   <td style="font-weight: 600;">Reply</td>
                               </tr>
                               </thead>
                               <tbody>


                               @foreach($mydonations as $don)
                               <tr>
                                   <td>{{$don->id}}</td>
                                   <td><a href="{{route('c.show', $don->cause_id)}}">{{$don->cause->cause_title}}</a></td>
                                   <td>{{$don->date}}</td>
                                   <td>{{$don->amount}}</td>
                                   @if($don->msg != "")
                                       <script type="text/javascript">


                                           function showMessage(msg) {
                                               swal('Your Message', msg);
                                           }

                                       </script>
                                   <td><button type="button" class="btn btn-sm btn-primary" onclick='showMessage("{{ $don->msg }}")'><i class="fa fa-envelope"></i></button> </td>
                                       @else
                                       <script type="text/javascript">

                                           $.ajaxSetup({
                                               headers: {
                                                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                               }
                                           });
                                           function sendMessage(donid) {

                                               swal({
                                                   title: "Send Message!",
                                                   content: "input",
                                                   showCancelButton: true,
                                                   inputPlaceholder: "Express your feeling to the fundraiser"
                                               })
                                                   .then((inputValue) => {
                                                       if (inputValue=== null) return false;
                                                       if (inputValue === "") {
                                                           swal.showInputError("You need to write something!");
                                                           return false
                                                       }
                                                       $.ajax({
                                                           url: "{{URL::route('p.update' , $don->id )}}",
                                                           type: "PATCH",
                                                           data:{
                                                               _token:'{{ csrf_token() }}',ajxmsg: inputValue, form: 1},
                                                           dataType: "html",
                                                           success: function () {
                                                               swal("Sent!", "Thank you! You're message has been sent!", "success");
                                                           }
                                                       });
                                                   });

                                           }
                                       </script>
                                       <td><button type="button" class="btn btn-sm btn-warning" onclick="sendMessage();"><i class="fa fa-envelope"></i></button> </td>
                                   @endif
                                   @if($don->rep_msg != "")
                                       <td><button type="button" class="btn btn-sm btn-success" onclick="swal('You Have a reply from {{$don->cause->fr_profile->user->name}}' ,'{!! $don->rep_msg !!}')"><i class="fa fa-envelope"></i></button> </td>
                                   @else
                                       <td><button type="button" class="btn btn-sm btn-danger" disabled><i class="fa fa-envelope"></i></button> </td>
                                   @endif
                               </tr>
                             @endforeach
                               </tbody>
                            </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-app-jobs" role="tabpanel" aria-labelledby="v-pills-app-jobs-tab">
                            <h3>My Job Applications</h3>
                            <table id="tbl_myJobApplications" class="table table-responsive rounded-1 " style="width: 900px; border:1px solid #eee; ">
                                <thead>
                                <tr class="bg-light">
                                    <th>S/N</th>
                                    <th>Job Title</th>
                                    <th>Organization</th>
                                    <th>Applied Date</th>
                                    <th>Closing Date</th>
                                    <th>Status</th>
                                    <th>Message</th>
                                    <th>Reply</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($AppJobs != null)
                                    @foreach( $AppJobs as $aj)

                                    <tr>
                                        <td>1</td>
                                        <td><a href="{{route('j.show', $aj->job->id)}}">{{$aj->job->title}}</a></td>
                                        <td>{{$aj->job->company_profile->name}}</td>
                                        <td>{{$aj->apply_date}}</td>
                                        <td>{{$aj->job->closing_date}}</td>
                                        <td>
                                        @if($aj->status == 0)
                                            <div class="badge bg-info">Pending</div>
                                        @elseif($aj->status == 1)
                                            <div class="badge bg-success ">Shortlisted</div>
                                        @elseif($aj->status == 2)
                                            <div class="badge bg-danger ">Rejected</div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($aj->message !='')
                                                <button class="btn btn-sm btn-theme" onclick="swal('{{$aj->message}}')"><i class="fa fa-envelope"></i></button>
                                            @else
                                                <script type="text/javascript">

                                                    $.ajaxSetup({
                                                        headers: {
                                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                        }
                                                    });
                                                    function sendCompMsg() {

                                                        swal({
                                                            title: "Send Message!",
                                                            content: "input",
                                                            showCancelButton: true,
                                                            inputPlaceholder: "Write a Message for the Company!"
                                                        })
                                                            .then((inputValue) => {
                                                                if (inputValue=== null) return false;
                                                                if (inputValue === "") {
                                                                    swal.showInputError("You need to write something!");
                                                                    return false
                                                                }
                                                                $.ajax({
                                                                    url: "{{URL::route('p.update', -1 )}}",
                                                                    type: "PATCH",
                                                                    data:{
                                                                        _token:'{{ csrf_token() }}' ,msg: inputValue, form: 4, app_id : '{{$aj->id}}'},
                                                                    dataType: "html",
                                                                    success: function () {
                                                                        swal("Sent!", "Thank you! You're message has been sent!", "success");
                                                                    }
                                                                });
                                                            });
                                                    }
                                                </script>
                                        <button type="button" class="btn btn-sm btn-warning" onclick="sendCompMsg();"><i class="fa fa-envelope"></i></button>
                                            @endif
                                        </td>
                                        <td>
                                            @if($aj->reply !='')
                                                <button class="btn btn-sm btn-success" onclick="swal('{{$aj->reply}}')"><i class="fa fa-envelope"></i></button>
                                            @else
                                                <button class="btn btn-sm btn-dark" disabled ><i class="fa fa-envelope" style="color:white;"></i></button>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                                </tbody>

                            </table>

                        </div>
                        <div class="tab-pane fade" id="v-pills-post-jobs" role="tabpanel" aria-labelledby="v-pills-post-jobs-tab">
                            <h3>Posted Jobs</h3>
                            <table id="tbl_myPostedJobs" class="table table-responsive rounded-1 " style="width: 900px; border:1px solid #eee; ">
                                <thead>
                                <tr class="bg-light">
                                    <th>S/N</th>
                                    <th>Vacancy Title</th>
                                    <th>Reference No. </th>
                                    <th>Posting Date</th>
                                    <th>Closing Date</th>
                                    <th>status</th>
                                    <th>Views</th>
                                    <th>Applicants</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($PostedJobs!=null)
                                @foreach($PostedJobs as $pj)
                                <tr>
                                    <td>{{$pj->id}}</td>
                                    <td><a href="{{route('profile.postedjobs', $pj->id)}}">{{$pj->title}}</a></td>
                                    <td>{{$pj->reference}}</td>
                                    <td>{{$pj->Posted_date}}</td>
                                    <td>{{$pj->closing_date}}</td>
                                    <td>
                                    @if($pj->status == 0)
                                        <div class="badge bg-info">Pending</div>
                                        @elseif($pj->status == 1)
                                        <div class="badge bg-success">Active</div>
                                        @elseif($pj->status ==2)
                                        <div class="badge bg-danger">Ended</div>
                                        @elseif($pj->status ==3)
                                            <div class="badge bg-danger">Cancelled</div>
                                        @endif
                                    </td>
                                    <td>{{$pj->seenctr}}</td>
                                    <td><button class="btn btn-sm btn-success"><b>{{\App\Models\application::where('vac_id', '=', $pj->id)->count()}}</b></button></td>
                                </tr>
                                @endforeach
                                    @endif
                                </tbody>

                            </table>

                        </div>
                        <div class="tab-pane fade" id="v-pills-post-donation" role="tabpanel" aria-labelledby="v-pills-post-donation-tab">
                            <h3>My Fundraisings</h3>
                            @if($myfrs!=null)
                            <table id="tbl_myPostedDonations" class="table table-responsive rounded-1 " style="width: 900px; border:1px solid #eee; ">
                                <thead>
                                <tr class="bg-light">
                                    <th>S/N</th>
                                    <th>Donation Title</th>
                                    <th>Category</th>
                                    <th>Posting Date</th>
                                    <th>Closing Date</th>
                                    <th>Goal</th>
                                    <th>Raised</th>
                                    <th>Viewed</th>
                                    <th>Donors</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($myfrs as $fr)
                                <tr>
                                    <td>{{$fr->id}}</td>
                                    <td><a href="{{URL::route('profile.posteddonations', encrypt($fr->id))}}">{{$fr->cause_title}}</a></td>
                                    <td>{{App\Models\categories::all()->where('id' , '=', $fr->cause_cat_id)->first()->cat_name}}</td>
                                    <td>{{$fr->cause_start_date}}</td>
                                    <td>{{$fr->cause_end_date}}</td>
                                    <td>{{$fr->cause_goal}}</td>
                                    <td>{{App\Models\donations::where('cause_id', '=', $fr->id)->sum('amount')}}</td>
                                    <td>{{$fr->seenctr}}</td>
                                    <td>{{App\Models\donations::where('cause_id', '=', $fr->id)->distinct()->count()}}</td>
                                    <td>

                                        @if($fr->cause_status == 0)
                                            <div class="badge bg-info">Pending</div>
                                            @elseif($fr->cause_status == 1)
                                            <div class="badge bg-success">Running</div>
                                            @elseif($fr->cause_status == 2)
                                            <div class="badge bg-warning">Ended</div>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-theme " href="{{URL::route('profile.posteddonations', encrypt($fr->id))}}"><i class="fa fa-eye"></i></a>
                                        @if($fr->cause_status!=2)
                                            <button class="btn btn-sm btn-success btn-adf{!! $fr->id !!}"  data-bs-toggle="modal" onclick=" $('#causeId').val($('.btn-adf{{$fr->id}}').val());" data-bs-target="#FollowUpModel" value="{{$fr->id}}"><i class="fa fa-newspaper-o" title="Add Follow Up"></i> </button>

                                            <button onclick="ConfirmDelete({{$fr->id}})" class="btn btn-sm btn-danger"><i class="fa fa-close" title="Delete"></i> </button>
                                            @endif
                                    </td>
                                </tr>
                                    @endforeach
                                </tbody>

                            </table>
                                @else
                                <h5> You have posted no Fundraisings yet, Click <a href="{{route('c.create')}}">Here</a> to start Now!!! </h5>
                                @endif
                        </div>
                    </div>
                </div>




    </section>


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

    @if(Auth()->check())
        <section id="modelfollow">
            <div class="modal fade" id="FollowUpModel" tabindex="-1" aria-labelledby="FollowUpNewModel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered ">
                    <div class="modal-content">
                        <div class="modal-body ">
                            <h5>Add New Followup</h5>
                            <form method="post" action="{{route('c.store')}} " enctype="multipart/form-data">
                                @csrf

                                <label for="title">Title</label>
                                <input type="text" class="form-control " name="title">

                                <label for="title">Image</label>
                                <input type="file" class="form-control " name="img">

                                <label for="title">Description</label>
                                <textarea class="form-control " name="description"></textarea>

                                <input id="causeId" type="hidden" name="cause_id">
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
@section('footer')

    @endsection

