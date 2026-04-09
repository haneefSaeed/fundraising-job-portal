
    <!-- <div class="tab-content overflow-auto  p-3" id="v-pills-tabContent">
                <div class="tab-pane fade " id="v-pills-user-info" role="tabpanel" aria-labelledby="v-pills-user-info-tab">
                 
                </div>
                <div class="tab-pane fade " id="v-pills-prof-info" role="tabpanel" aria-labelledby="v-pills-prof-info-tab">

                    

                </div>
                <div class="tab-pane fade" id="v-pills-donations" role="tabpanel" aria-labelledby="v-pills-donations-tab">
                    <div class="row w-100">
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
                                                    if (inputValue === null) return false;
                                                    if (inputValue === "") {
                                                        swal.showInputError("You need to write something!");
                                                        return false
                                                    }
                                                    $.ajax({
                                                        url: "{{URL::route('p.update' , $don->id )}}",
                                                        type: "PATCH",
                                                        data: {
                                                            _token: '{{ csrf_token() }}',
                                                            ajxmsg: inputValue,
                                                            form: 1
                                                        },
                                                        dataType: "html",
                                                        success: function() {
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
                                                    if (inputValue === null) return false;
                                                    if (inputValue === "") {
                                                        swal.showInputError("You need to write something!");
                                                        return false
                                                    }
                                                    $.ajax({
                                                        url: "{{URL::route('p.update', -1 )}}",
                                                        type: "PATCH",
                                                        data: {
                                                            _token: '{{ csrf_token() }}',
                                                            msg: inputValue,
                                                            form: 4,
                                                            app_id: '{{$aj->id}}'
                                                        },
                                                        dataType: "html",
                                                        success: function() {
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
                                    <button class="btn btn-sm btn-dark" disabled><i class="fa fa-envelope" style="color:white;"></i></button>
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
                  
            </div> -->

    <!-- <div class="w-full md:w-3/4 bg-white rounded-2xl shadow p-6">              
-->
