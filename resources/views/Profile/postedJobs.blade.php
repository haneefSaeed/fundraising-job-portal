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

    <section id="profileDetail">
        <div class="container">
            <div class="row p-5 ">

                <h3 style="display: inline;"><a href="{{URL::route('p.show', [1])}}" class="btn btn-sm btn-outline-dark me-2" style="display: inline; "><i class="fa fa-arrow-left"></i> Back to profile</a> Vacancy No. {{$job->id}}: {{$job->title}}
                    @if($job->status == 0)
                        <div class="badge bg-info">Pending</div>
                        @elseif($job->status == 1)
                    <div class="badge bg-success">Active</div>
                        @elseif($job->status == 2)
                    <div class="badge bg-danger">Cancelled</div>
                        @elseif($job->status == 3)
                    <div class="badge bg-dark">Refused</div>
                        @endif
                </h3>
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
                                <th>Reply</th>
                                <th>Actions </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($apps as $app)
                            <tr>
                                <td>{{$app->id}}</td>
                                <td>@if($app->status==0)
                                <div class="badge bg-info">Pending</div>
                                        @elseif($app->status == 1)
                                    <div class="badge bg-success">Shortlisted</div>
                                        @elseif($app->status == 2)
                                    <div class="badge bg-danger">Rejected</div>
                                        @endif
                                </td>
                                <td>{{$app->prof_prof->user->name}}</td>
                                <td>{{$app->apply_date}}</td>
                                <td>{{$app->prof_prof->career->level}}</td>
                                <td>{{$app->prof_prof->edu_lvl->detail}}</td>
                                <td>{{$app->prof_prof->total_exp}} Years</td>
                                <td><a href="{{asset($app->prof_prof->cv)}}" class="btn btn-sm btn-theme"><i class="fa fa-download"></i></a> </td>
                                <td>
                                    @if($app->prof_prof->cl!=null)
                                        <a href="{{asset($app->prof_prof->cl)}}" class="btn btn-sm btn-theme"><i class="fa fa-download"></i></a>
                                @endif</td>

                                <td>@if($app->prof_prof->other_doc!=null)
                                        <a href="{{asset($app->prof_prof->other_doc)}}" class="btn btn-sm btn-theme"><i class="fa fa-download"></i></a>
                                    @endif</td>
                                <td><button class="btn btn-sm btn-info" onclick="swal('{{$app->prof_prof->user->name}} Message','{{$app->message}}')"><i class="fa fa-envelope"></i></button> </td>
                                <script type="text/javascript">

                                    $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                    });
                                    function replyCandidate() {
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
                                                        _token:'{{ csrf_token() }}' ,msg: inputValue, form: 5, app_id : '{{$app->id}}'},
                                                    dataType: "html",
                                                    success: function () {
                                                        swal("Sent!", "Thank you! You're message has been sent!", "success");
                                                    }
                                                });
                                            });
                                    }
                                    function candidateStatusChange(stat, statname) {
                                        swal({
                                            title: "Are you sure?",
                                            text: 'Candidate {{$app->prof_prof->user->name}} will be ' + statname + '?',
                                            confirmButtonText :statname,
                                            buttons:{
                                                cancel: true,
                                                confirm: true,
                                            }
                                        })
                                            .then((confirm) => {
                                                if(confirm) {
                                                    $.ajax({
                                                        url: "{{URL::route('p.update', -1 )}}",
                                                        type: "PATCH",
                                                        data: {
                                                            _token: '{{ csrf_token() }}',
                                                            form: 6,
                                                            status: stat,
                                                            app_id: '{{$app->id}}'
                                                        },
                                                        dataType: "html",
                                                        success: function () {
                                                                swal(statname + "ed!", '{{$app->prof_prof->user->name}}' + ' was ' + statname + 'ed successfully!', "success");
                                                                window.location.reload();

                                                        }
                                                    });
                                                }
                                            });
                                    }
                                </script>
                                @if($app->reply=="")

                                <td><button class="btn btn-sm btn-info" onclick="replyCandidate()"><i class="fa fa-envelope"></i></button> </td>
                                @else
                                    <td><button class="btn btn-sm btn-dark" onclick="swal('your reply', '{{$app->reply}}')"><i class="fa fa-envelope"></i></button> </td>
                                @endif

                                <td>
                                    <button class="btn btn-sm btn-success" onclick="candidateStatusChange(1, 'shortlist')"><i class="fa fa-check "></i></button>
                                    <button class="btn btn-sm btn-danger" onclick="candidateStatusChange(2, 'reject')"><i class="fa fa-close"></i></button>
                                    <button class="btn btn-sm btn-warning" onclick="candidateStatusChange(0, 'review')"><i class="fa fa-close"></i></button>
                                </td>

                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="tab-pane fade" id="edit-tab-pane" role="tabpanel" aria-labelledby="edit-tab" tabindex="0">
                        <form method="post" action="{{route('j.update', $job->id)}}" enctype="multipart/form-data">
                            @csrf
                            <table width="100%">
                                <tr>
                                    <td class="p-2"><label for="name">Vacancy Title</label> </td>
                                    <td class="p-2"><input type="text" class="form-control" name="title" value="{{$job->title}}"></td>
                                    <td class="p-3"><label for="name">Vacancy Reference</label> </td>
                                    <td class="p-3"><input type="text" class="form-control" name="reference" value="{{$job->reference}}"></td>
                                </tr>
                                <tr>
                                    <td class=" p-2"><label for="name">Vacancy Location</label> </td>
                                    <td class=" p-2">
                                        <input type="text" name="location" class="form-control" value="{{$job->location}}">
                                    </td>
                                    <td class=" p-3"><label for="name">Vacancy Category</label> </td>
                                    <td class=" p-3">

                                        <select class="form-control" name="cat_id"  >
                                            @foreach($cats as $cat)
                                                @if($cat->id == $job->cat_id)
                                                    <option value="{{$cat->id}}" selected>{{$cat->cat_name}}</option>
                                                @endif
                                                    <option value="{{$cat->id}}" >{{$cat->cat_name}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=" p-2"><label for="name">Employment Type</label> </td>
                                    <td class=" p-2">

                                        <select class="form-control" name="emp_type_id" >
                                            @foreach($emp_types as $et)
                                                @if($et->id == $job->emp_type_id)
                                                    <option value="{{$et->id}}" selected>{{$et->detail}}</option>
                                                @endif
                                                <option value="{{$et->id}}" >{{$et->detail}}</option>
                                            @endforeach
                                        </select>
                                    </td>

                                    <td class=" p-3"><label for="name">Preferred Gender</label> </td>
                                    <td class=" p-3">

                                        <select class="form-control" name="pref_gender">
                                            @if($job->pref_gender == 'Any')
                                                <option value="Any" selected>Any</option>
                                                <option value="Male">Male</option>
                                                <option value="Female" >Female</option>
                                            @endif

                                                @if($job->pref_gender == 'male')
                                                    <option value="Any" >Any</option>
                                                    <option value="Male" selected>Male</option>
                                                    <option value="Female" >Female</option>
                                                @endif

                                                @if($job->pref_gender == 'female')
                                                    <option value="Any" >Any</option>
                                                    <option value="Male" >Male</option>
                                                    <option value="Female" selected >Female</option>
                                                @endif
                                        </select>
                                    </td>

                                </tr>
                                <tr>
                                    <td class=" p-2"><label for="name">Minimum Experience</label> </td>
                                    <td class=" p-2">

                                        <select class="form-control" name="exp_lvl_id">
                                            @foreach($exp_lvls as $el)
                                                @if($el->id == $job->exp_lvl_id)
                                                    <option value="{{$el->id}}" selected>{{$el->detail}}</option>
                                                @endif
                                                <option value="{{$el->id}}" >{{$el->detail}}</option>
                                            @endforeach
                                        </select>
                                    </td>

                                    <td class=" p-3"><label for="name">minimum Education</label> </td>
                                    <td class=" p-3">

                                        <select class="form-control" name="edu_lvl_id">
                                            @foreach($edu_lvls as $els)
                                                @if($els->id == $job->edu_lvl_id)
                                                    <option value="{{$els->id}}" selected>{{$els->detail}}</option>
                                                @endif
                                                <option value="{{$els->id}}" >{{$els->detail}}</option>
                                            @endforeach
                                        </select>
                                    </td>

                                </tr>
                                <tr>

                                    <td class="p-2"><label for="name">Closing Date</label> </td>
                                    <td class="p-2"><input type="datetime-local" name="closing_date" value="{{$job->closing_date}}" class="form-control" > </td>
                                    <td class="p-3"><label for="name">Image</label> </td>
                                    <td class="p-3"><input type="file" name="img" class="form-control" > </td>
                                </tr>
                                <tr>
                                    <td class="p-2"><label for="name">Small Description</label> </td>
                                    <td class="p-2" colspan="3"><input type="text" name="small_description"  class="form-control" value="{{$job->small_description}}"> </td>
                                </tr>
                                <tr>
                                    <td class="p-2"><label for="name">Job Description</label> </td>
                                    <td class="p-2" colspan="3"><textarea name="description" class="form-control initTMC">{{$job->description}}</textarea> </td>
                                </tr>

                                <tr>
                                    <td class="p-2"><label for="name">tags</label> </td>
                                    <td class="p-2" colspan="3"><input type="text" name="tags" class="form-control" value="{{$job->tags}}"> </td>
                                </tr>
                            </table>
                            <button type="submit" name="btn_update_job" class="btn btn-danger mt-4"><i class="fa fa-floppy-o" style="margin-right: 10px;"></i> Save Changes</button>

                        </form></div>

                </div>


                        </div>
                    </div>
                </div>




    </section>


@endsection

@section('footer_scripts')



    <script>
        $(document).ready(function () {
            $('#tbl_candidates').DataTable();
        });
    </script>
@endsection

