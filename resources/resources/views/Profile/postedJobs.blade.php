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
            <div class="row p-5 ">

                <h3 style="display: inline;"><a href="{{URL::route('profile.show', [1])}}" class="btn btn-sm btn-outline-dark me-2" style="display: inline; "><i class="fa fa-arrow-left"></i> Back to profile</a> Vacancy No. {id}: Administrative Assistant</h3>
                <ul class="nav nav-tabs mt-3" id="PostedJobTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active"  style="background-color: #245269; color:white;" id="appt-tab" data-bs-toggle="tab" data-bs-target="#appt-tab-pane" type="button" role="tab" aria-controls="appt-tab-pane" aria-selected="true">Applicants</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="edit-tab" style="background-color: #eeeeee; color:#333;" data-bs-toggle="tab" data-bs-target="#edit-tab-pane" type="button" role="tab" aria-controls="edit-tab-pane" aria-selected="false">Edit Vacancy Info</button>
                    </li>

                </ul>
                <div class="tab-content p-3" id="PostedJobTabsContent">
                    <div class="tab-pane fade show active" id="appt-tab-pane" role="tabpanel" aria-labelledby="appt-tab" tabindex="0">
                        <table id="tbl_candidates" class="table table-striped" style="width: 100%;">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Status</th>
                                <th>Candidate Name</th>
                                <th>Applied Date</th>
                                <th>Career</th>
                                <th>Education </th>
                                <th>Experience</th>
                                <th>CV</th>
                                <th>Cover</th>
                                <th>Docs</th>
                                <th>Message</th>
                                <th>Actions <button type="button" class="shrejinfo"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top">
                                        <i class="fa fa-info-circle"></i>
                                    </button> </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td><p class="badge bg-info">Pending</p> </td>
                                <td>Hanif Abdul Baqi</td>
                                <td>22 June 2022</td>
                                <td>Manager</td>
                                <td>Masters Degree</td>
                                <td>7 years</td>
                                <td><button class="btn btn-sm btn-warning"><i class="fa fa-download"></i></button> </td>
                                <td><button class="btn btn-sm btn-warning"><i class="fa fa-download"></i></button> </td>
                                <td><button class="btn btn-sm btn-warning"><i class="fa fa-download"></i></button> </td>
                                <td><button class="btn btn-sm btn-info" onclick="readApplicantMsg('Hanif','Hi, I love your job!')"><i class="fa fa-eye"></i></button> </td>
                                <td><button class="btn btn-sm btn-success" onclick="confirmShortlist('Hanif')"><i class="fa fa-check "></i></button> <button class="btn btn-sm btn-danger" onclick="confirmRejection()"><i class="fa fa-close"></i></button> </td>

                            </tr>
                            <tr>
                                <td>2</td>
                                <td><p class="badge bg-success">Shortlisted</p> </td>
                                <td>Ahmad Saeed</td>
                                <td>01 June 2022</td>
                                <td>Senior</td>
                                <td>Masters Degree</td>
                                <td>5 years</td>
                                <td><button class="btn btn-sm btn-warning"><i class="fa fa-download"></i></button> </td>
                                <td><button class="btn btn-sm btn-warning"><i class="fa fa-download"></i></button> </td>
                                <td><button class="btn btn-sm btn-warning"><i class="fa fa-download"></i></button> </td>
                                <td><button class="btn btn-sm btn-info" onclick="readApplicantMsg('Ahmad', 'Hi, I love your job!')"><i class="fa fa-eye"></i></button> </td>
                                <td><button class="btn btn-sm btn-success" onclick="confirmShortlist('Ahmad')"><i class="fa fa-check "></i></button> <button class="btn btn-sm btn-danger" onclick="confirmRejection()"><i class="fa fa-close"></i></button> </td>

                            </tr>

                            <tr>
                                <td>2</td>
                                <td><p class="badge bg-danger">Rejected</p> </td>
                                <td>Zubair Ahmad</td>
                                <td>01 June 2022</td>
                                <td>N/A</td>
                                <td>School</td>
                                <td>0 years</td>
                                <td><button class="btn btn-sm btn-warning"><i class="fa fa-download"></i></button> </td>
                                <td><button class="btn btn-sm btn-warning"><i class="fa fa-download"></i></button> </td>
                                <td><button class="btn btn-sm btn-warning"><i class="fa fa-download"></i></button> </td>
                                <td><button class="btn btn-sm btn-info" onclick="readApplicantMsg('Zubair','I am noob.')"><i class="fa fa-eye"></i></button> </td>
                                <td><button class="btn btn-sm btn-success" onclick="confirmShortlist('Zubair')"><i class="fa fa-check "></i></button> <button class="btn btn-sm btn-danger" onclick="confirmRejection()"><i class="fa fa-close"></i></button> </td>

                            </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="tab-pane fade" id="edit-tab-pane" role="tabpanel" aria-labelledby="edit-tab" tabindex="0"><form>
                            <table width="100%">
                                <tr>
                                    <td class="p-2"><label for="name">Vacancy Title</label> </td>
                                    <td class="p-2"><input type="text" class="form-control"></td>
                                    <td class="p-3"><label for="name">Vacancy Reference</label> </td>
                                    <td class="p-3"><input type="text" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td class=" p-2"><label for="name">Vacancy Location</label> </td>
                                    <td class=" p-2">

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
                                    <td class=" p-3"><label for="name">Vacancy Category</label> </td>
                                    <td class=" p-3">

                                        <select class="form-control" >
                                            <option selected>Select</option>
                                            <option >Admin</option>
                                            <option >IT</option>
                                            <option >Finance</option>
                                            <option >Managment</option>
                                            <option >Engineering</option>
                                            <option >Medical</option>
                                            <option >Space</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=" p-2"><label for="name">Employment Type</label> </td>
                                    <td class=" p-2">

                                        <select class="form-control" >
                                            <option selected>Select</option>
                                            <option >Intern</option>
                                            <option >Volunteer</option>
                                            <option >Part time</option>
                                            <option >Full Time</option>
                                        </select>
                                    </td>

                                    <td class=" p-3"><label for="name">Gender</label> </td>
                                    <td class=" p-3">

                                        <select class="form-control" >
                                            <option selected>Select</option>
                                            <option >Male</option>
                                            <option >Female</option>
                                            <option >Any</option>
                                            <option >Other</option>
                                        </select>
                                    </td>

                                </tr>
                                <tr>
                                    <td class=" p-2"><label for="name">Minimum Experience</label> </td>
                                    <td class=" p-2">

                                        <select class="form-control" >
                                            <option selected>Select</option>
                                            <option >0-1 years</option>
                                            <option >1-3 years</option>
                                            <option >3-5 years</option>
                                            <option >5-8 years</option>
                                            <option >8-12 years</option>
                                            <option >12+ years</option>
                                        </select>
                                    </td>

                                    <td class=" p-3"><label for="name">minimum Education</label> </td>
                                    <td class=" p-3">

                                        <select class="form-control" >
                                            <option selected>Select</option>
                                            <option >None</option>
                                            <option >High School</option>
                                            <option >College Degree</option>
                                            <option >Bachelors Degree</option>
                                            <option >Masters Degree</option>
                                            <option >PhD</option>
                                        </select>
                                    </td>

                                </tr>
                                <tr>
                                    <td class=" p-2"><label for="name">Company size</label> </td>
                                    <td class=" p-2">

                                        <select class="form-control" >
                                            <option selected>Select</option>
                                            <option >1-10 Staff</option>
                                            <option >10-30 Staff</option>
                                            <option >30-50 Staff</option>
                                            <option >50-80 Staff</option>
                                            <option >80-100 Staff</option>
                                            <option >100+ Staff</option>
                                            <option >1000+ Staff</option>
                                        </select>
                                    </td>

                                    <td class="p-3"><label for="name">Expiration Date</label> </td>
                                    <td class="p-3"><input type="datetime-local" class="form-control" placeholder="e.g: 22 March 2022 12:35 AM"> </td>

                                </tr>
                                <tr>
                                    <td class="p-2"><label for="name">Job Description</label> </td>
                                    <td class="p-2" colspan="3"><textarea class="form-control"></textarea> </td>
                                </tr>
                                <tr>
                                    <td class="p-2"><label for="name">Responsibilities</label> </td>
                                    <td class="p-2" colspan="3"><textarea class="form-control"></textarea> </td>
                                </tr>
                                <tr>
                                    <td class="p-2"><label for="name">Qualification Requirement</label> </td>
                                    <td class="p-2" colspan="3"><textarea class="form-control"></textarea> </td>
                                </tr>
                            </table>

                            <button class="btn btn-danger mt-4"><i class="fa fa-floppy-o" style="margin-right: 10px;"></i> Save Changes</button>


                        </form></div>

                </div>


                        </div>
                    </div>
                </div>




    </section>


@endsection

@section('footer_scripts')

<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
    <script>
        function confirmShortlist(name){
            swal({
                title: "Shortlist candidate?",
                text: "You're about to shortlist, " + name + "?",
                icon: "warning",
                buttons: true,
                dangerMode: false,
            })
                .then((shortlist) => {
                    if (shortlist) {
                        swal("The Candidate "+ name + " was shortlisted successfully", {
                            icon: "success",
                        });
                    } else {
                    }
                });
        }
        function confirmRejection(){
            swal({
                title: "Reject candidate?",
                text: "You're about to reject the candidate?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((reject) => {
                    if (reject) {
                        swal("The Candidate was Rejected successfully", {
                            icon: "success",
                        });
                    } else {
                    }
                });
        }
        function readApplicantMsg(name, msg){
            swal(name + "'s Message", msg);
        }

    </script>
    <script>
        $(document).ready(function () {
            $('#tbl_candidates').DataTable();
        });
    </script>
@endsection

