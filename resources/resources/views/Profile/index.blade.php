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

@endsection


@section('content')
    <section id="breadcrumbs">

        <div class="row p-5" style="background-color: #eee; color:white;">
            <div class="container">
                <div class="row text-center text-black">
                    <div class="col-md-3">
                        <img class="rounded-circle" width="180px;" height="180px;" src="{{asset('images/jobs/avatar.jpg')}}">
                    </div>
                    <div class="col-md-5 text-align-left mt-4">
                        <h1>Hi, {{$user->name}} </h1>
                        <h4>Welcome to your profile!</h4>
                        <p><i class="fa fa-info-circle"></i> You have donated {x} and applied for {y} jobs. Thank you! </p>
{{--                        <div class="alert  alert-warning"><i class="fa fa-exclamation-circle"></i> You've been shortlisted, please check Applications </div>--}}
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
                        <button class="nav-link active" id="v-pills-user-info-tab" data-bs-toggle="pill" data-bs-target="#v-pills-user-info" type="button" role="tab" aria-controls="v-pills-user-info" aria-selected="true">  <i class="fa fa-user" style="margin-right: 10px;"></i> User information</button>
                        <button class="nav-link" id="v-pills-prof-info-tab" data-bs-toggle="pill" data-bs-target="#v-pills-prof-info" type="button" role="tab" aria-controls="v-pills-prof-info" aria-selected="false"><i class="fa fa-black-tie" style="margin-right: 10px;"></i> Professional profile</button>
                        <button class="nav-link" id="v-pills-donations-tab" data-bs-toggle="pill" data-bs-target="#v-pills-donations" type="button" role="tab" aria-controls="v-pills-donations" aria-selected="false"><i class="fa fa-heart" style="margin-right: 10px;"></i> Donations </button>
                        <button class="nav-link" id="v-pills-app-jobs-tab" data-bs-toggle="pill" data-bs-target="#v-pills-app-jobs" type="button" role="tab" aria-controls="v-pills-app-jobs" aria-selected="false"><i class="fa fa-file" style="margin-right: 10px;"></i> Applied Jobs</button>
                        <button class="nav-link" id="v-pills-post-jobs-tab" data-bs-toggle="pill" data-bs-target="#v-pills-post-jobs" type="button" role="tab" aria-controls="v-pills-post-jobs" aria-selected="false"><i class="fa fa-files-o" style="margin-right: 10px;"></i> Posted Jobs</button>
                        <button class="nav-link" id="v-pills-post-donation-tab" data-bs-toggle="pill" data-bs-target="#v-pills-post-donation" type="button" role="tab" aria-controls="v-pills-post-donation" aria-selected="false"><i class="fa fa-heart-o" style="margin-right: 10px;"></i> Posted Donations</button>
                    </div>
                    <div class="tab-content overflow-auto  p-3" id="v-pills-tabContent">
                        <div class="tab-pane fade show active " id="v-pills-user-info" role="tabpanel" aria-labelledby="v-pills-user-info-tab">
                            <h3>Personal Information</h3>
                            <form>
                                <table>
                                    <tr> <td class="p-2"><label for="name">Name</label> </td>
                                        <td class="p-2"><input type="text" class="form-control" value="{{$user->name}}"> </td>
                                        <td class=" p-3"><label for="name">Date of Birth</label> </td>
                                        <td class=" p-3"><input type="date" class="form-control" > </td>
                                    </tr>
                                    <tr>
                                        <td class="p-2"><label for="name">Phone Number</label> </td>
                                        <td class="p-2"><input type="number" class="form-control"> </td>
                                        <td class="p-3"><label for="name">Gender</label> </td>
                                        <td class="p-3"><select class="form-control">
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
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="career-tab" data-bs-toggle="tab" data-bs-target="#career_info" type="button" role="tab" aria-controls="career" aria-selected="true">Career information</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="company-tab" data-bs-toggle="tab" data-bs-target="#company_info" type="button" role="tab" aria-controls="company" aria-selected="false">Company Information</button>
                                </li>

                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="career_info" role="tabpanel" aria-labelledby="career-tab"> <form>
                                        <table>
                                            <tr> <td class="p-2"><label for="name">Career Level</label> </td>
                                                <td class="p-2">

                                                    <select class="form-control" >
                                                        <option selected>Select</option>
                                                        <option >Student</option>
                                                        <option >Intern</option>
                                                        <option >Junior</option>
                                                        <option >Mid-Level</option>
                                                        <option >Senior</option>
                                                        <option >Manager</option>
                                                        <option >Executive Director </option>
                                                    </select>

                                                </td>
                                                <td class=" p-3"><label for="name">Current Location</label> </td>
                                                <td class=" p-3">

                                                    <select class="form-control" >
                                                        <option selected>Select</option>
                                                        <option >Kabul</option>
                                                        <option >Kandahar</option>
                                                        <option >Herat</option>
                                                        <option >Jalal Abad</option>
                                                        <option >Mazar Sharif</option>
                                                        <option >Baghlan</option>
                                                        <option >Bamiyan </option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-2"><label for="name">Current Position</label> </td>
                                                <td class="p-2"><input type="text" class="form-control" placeholder="Ex: Sales Executive"> </td>
                                            </tr>
                                            <tr>
                                                <td class="p-2"><label for="name">Current Company</label> </td>
                                                <td class="p-2"><input type="text" class="form-control" placeholder="Ex: Orbit Technology"> </td>
                                                <td class="p-2"><label for="name">Total Experience</label> </td>
                                                <td class="p-2"><input type="number" class="form-control" placeholder="years of experience"> </td>
                                            </tr>
                                            <tr>
                                                <td class="p-2"><label for="name">Education Level</label> </td>
                                                <td class="p-2">

                                                    <select class="form-control" >
                                                        <option selected>Select</option>
                                                        <option >N/A</option>
                                                        <option >High School</option>
                                                        <option >Bacholors Degree</option>
                                                        <option >Masters Degree</option>
                                                        <option >PhD</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-2"><label for="name">Your CV</label> </td>
                                                <td class="p-2"><input type="file" class="form-control" placeholder="Upload CV" > </td>
                                                <td class="p-3"><label for="name">Your Cover Letter</label> </td>
                                                <td class="p-3"><input type="file" class="form-control" > </td>
                                            </tr>
                                            <tr>
                                                <td class="p-2"><label for="otherDocs">Other Documents</label></td>
                                                <td class="p-2"><input type="file" class="form-control"> </td>
                                            </tr>
                                            <tr>
                                                <td class="p-2"><label for="statement">Statement</label> </td>
                                                <td class="p-2" colspan="4">
                                                    <textarea class="form-control"></textarea>
                                                </td>
                                            </tr>
                                        </table>

                                        <button class="btn btn-danger mt-4"><i class="fa fa-floppy-o" style="margin-right: 10px;"></i> Save Changes</button>


                                    </form></div>
                                <div class="tab-pane fade" id="company_info" role="tabpanel" aria-labelledby="company-tab"><form>
                                        <table>

                                                <td class="p-2"><label for="name">Company Name</label> </td>
                                                <td class="p-2"><input type="text" class="form-control" placeholder="Ex: Orbit Technology"> </td>

                                                <td class=" p-3"><label for="name">Company Size</label> </td>
                                                <td class=" p-3">

                                                    <select class="form-control" >
                                                        <option selected>Select</option>
                                                        <option >Kabul</option>
                                                        <option >Kandahar</option>
                                                        <option >Herat</option>
                                                        <option >Jalal Abad</option>
                                                        <option >Mazar Sharif</option>
                                                        <option >Baghlan</option>
                                                        <option >Bamiyan </option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-2"><label for="name">Company Email Email</label> </td>
                                                <td class="p-2"><input type="text" class="form-control" placeholder="Ex: info@company.com"> </td>
                                                <td class="p-3"><label for="name">Industry</label> </td>
                                                <td class="p-3"><input type="text" class="form-control" placeholder="Ex: Manufacturing"> </td>
                                            </tr>
                                            <tr>
                                                <td class="p-2"><label for="name">Website</label> </td>
                                                <td class="p-2"><input type="text" class="form-control" placeholder="Ex: www.company.com"> </td>
                                                <td class="p-3"><label for="name">Contact Number</label> </td>
                                                <td class="p-3"><input type="number" class="form-control" placeholder="Ex: 079000000"> </td>
                                            </tr>
                                            <tr>
                                                <td class="p-2"><label for="name">Address</label> </td>
                                                <td class="p-2" colspan="4"><input type="text" class="form-control"> </td>

                                            </tr>
                                            <tr>
                                                <td class="p-2"><label for="name">Facebook Link</label> </td>
                                                <td class="p-2"><input type="text" class="form-control"> </td>
                                                <td class="p-3"><label for="name">Instagram Link</label> </td>
                                                <td class="p-3"><input type="number" class="form-control"> </td>
                                            </tr>
                                            <tr>
                                                <td class="p-2"><label for="name">LinkdIn Link</label> </td>
                                                <td class="p-2"><input type="text" class="form-control"> </td>
                                                <td class="p-3"><label for="name">Twitter Link</label> </td>
                                                <td class="p-3"><input type="number" class="form-control"> </td>
                                            </tr>
                                            <tr>
                                                <td class="p-2"><label for="name">Company Bio</label> </td>
                                                <td colspan="4">
                                                    <textarea class="form-control"></textarea>
                                                </td>
                                            </tr>
                                        </table>

                                        <button class="btn btn-danger mt-4"><i class="fa fa-floppy-o" style="margin-right: 10px;"></i> Save Changes</button>

                                    </form></div>
                            </div>




                        </div>
                        <div class="tab-pane  fade" id="v-pills-donations" role="tabpanel" aria-labelledby="v-pills-donations-tab">
                            <div class="row w-100" >
                            <h3>My Donations</h3>
                            <table id="tbl_mydonations" class="table table-striped w-100" style="min-width: 800px;">
                               <thead>
                               <tr>
                                   <td style="font-weight: 600;">S/N</td>
                                   <td style="font-weight: 600;">Cause</td>
                                   <td style="font-weight: 600;">Date</td>
                                   <td style="font-weight: 600;">Amount</td>
                               </tr>
                               </thead>
                               <tbody>
                               <tr>
                                   <td>1</td>
                                   <td><a href="#"> Helping the poor</a></td>
                                   <td>22 Aug 2022, 12:34 AM</td>
                                   <td>$50</td>
                               </tr>
                               <tr>
                                   <td>2</td>
                                   <td><a href="#"> Medical Condition of James bond</a></td>
                                   <td>14 Sep 2022, 11:34 AM</td>
                                   <td>$10</td>
                               </tr>
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
                                </tr>
                                </thead>
                                <tbody>

                                <tr>
                                    <td>1</td>
                                    <td><a href="#">Administrative Assistant</a></td>
                                    <td>UNICEF</td>
                                    <td>22 Aug 2022, 12:34 AM</td>
                                    <td>22 Nov 2022, 12:34 AM</td>
                                    <td><div class="alert-info font-semibold">Pending</div></td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td><a href="#">Graphic Designer</a></td>
                                    <td>Orbit Technology</td>
                                    <td>02 Jun 2022, 10:34 AM</td>
                                    <td>05 Aug 2022, 05:34 AM</td>
                                    <td><div class="alert-danger font-semibold">Rejected</div></td>
                                </tr>
                                </tbody>

                            </table>

                        </div>
                        <div class="tab-pane fade" id="v-pills-post-jobs" role="tabpanel" aria-labelledby="v-pills-post-jobs-tab">
                            <h3>Posted Jobs</h3>
                            <table id="tbl_myPostedJobs" class="table table-responsive rounded-1 " style="width: 900px; border:1px solid #eee; ">
                                <thead>
                                <tr class="bg-light">
                                    <th>S/N</th>
                                    <th>Vacancy Name</th>
                                    <th>Reference No. </th>
                                    <th>Posting Date</th>
                                    <th>Closing Date</th>
                                    <th>Views</th>
                                    <th>Applicants</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><a href="{{URL::route('profile.postedjobs', [1])}}">Administrative Assistant</a></td>
                                    <td>VR7944</td>
                                    <td>22 Aug 2022, 12:34 AM</td>
                                    <td>22 Nov 2022, 12:34 AM</td>
                                    <td>1402</td>
                                    <td><button class="btn btn-sm btn-success"><b>120</b></button></td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td><a href="#">Graphic Designer</a></td>
                                    <td>GRA5422</td>
                                    <td>02 Jun 2022, 10:34 AM</td>
                                    <td>05 Aug 2022, 05:34 AM</td>
                                    <td>200</td>
                                    <td><button class="btn btn-sm btn-success"><b>35</b></button></td>
                                </tr>
                                </tbody>

                            </table>

                        </div>
                        <div class="tab-pane fade" id="v-pills-post-donation" role="tabpanel" aria-labelledby="v-pills-post-donation-tab">
                            <h3>My Posted Donation</h3>
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
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><a href="{{URL::route('profile.posteddonations', [1])}}">Save Qaderi from getting bald.</a></td>
                                    <td>Medical</td>
                                    <td>22 Aug 2022, 12:34 AM</td>
                                    <td>22 Nov 2022, 12:34 AM</td>
                                    <td>$1500</td>
                                    <td>$20</td>
                                    <td>1612</td>
                                    <td>120</td>
                                    <td>
                                        <button class="btn btn-sm btn-success"><i class="fa fa-eye"></i></button>
                                        <button class="btn btn-sm btn-success"><i class="fa fa-newspaper-o" title="Add Follow Up"></i> </button>
                                        <button class="btn btn-sm btn-danger"><i class="fa fa-close" title="Delete"></i> </button>
                                    </td>
                                </tr>
                                </tbody>

                            </table>

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
@endsection

