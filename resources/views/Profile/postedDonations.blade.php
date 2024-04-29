@extends('layouts.app')
@section('header')
    <title>Show Posted Donations</title>


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

                <h3 style="display: inline;"><button onclick="history.back()" class="btn btn-sm btn-outline-dark me-2" style="display: inline; "><i class="fa fa-arrow-left"></i> Back to profile</button>
                    Fundraising # {{$cause->id}}: <a class="" style="color:black" href="{{route('c.show', $cause->id)}}"> {{$cause->cause_title}}</a></h3>
                <ul class="nav nav-tabs mt-3" id="PostedDonations" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active"  style=" color:black;" id="donors-tab" data-bs-toggle="tab"
                                data-bs-target="#donors-tab-pane" type="button" role="tab" aria-controls="donors-tab-pane" aria-selected="true">Donors</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="edit-tab" style=" color:#333;" data-bs-toggle="tab"
                                data-bs-target="#edit-tab-pane" type="button" role="tab" aria-controls="edit-tab-pane" aria-selected="false">Edit Fundraising Info</button>
                    </li>
                    @if($followups->count() !=0)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="followup-tab" style=" color:#333;" data-bs-toggle="tab"
                                data-bs-target="#followup-tab-pane" type="button" role="tab" aria-controls="followup-tab-pane" aria-selected="false">Edit Followups</button>
                    </li>
                        @endif

                </ul>
                <div class="tab-content p-3" id="PostedDonationsContent">
                    <div class="tab-pane fade show active" id="donors-tab-pane" role="tabpanel" aria-labelledby="donors-tab" tabindex="0">
                        <table id="tbl_Donors" class="table table-striped" style="width: 100%;">
                            <thead>
                            <tr>
                                <th>Donation #</th>
                                <th>Donor</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Donor's Message</th>
                                <th>Leave a Message</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($donation as $don)
                            <tr>
                                <td>{{$don->id}}</td>
                                @if($don->anon == 1)
                                <td>Anonymous</td>
                                @else
                                <td>{{$don->user->name}}</td>
                                @endif
                                <td>{{$don->date}}</td>
                                <td>{{$don->amount}}</td>

                                @if($don->msg!="")

                                 @if($don->anon == 1)

                                    <td>
                                        <button class="btn btn-sm btn-info" onclick="readMsg('Anonymous','{{$don->msg}}')"><i class="fa fa-envelope"></i></button>
                                    </td>

                                @else
                                    <td>
                                        <button class="btn btn-sm btn-info" onclick="readMsg('{{$don->user->name}}' ,'{{$don->msg}}')"><i class="fa fa-envelope"></i></button>
                                    </td>
                                @endif
                                @else
                                    <td>
                                        <button disabled class="btn btn-sm btn-secondary" onclick=""><i class="fa fa-envelope"></i></button>
                                    </td>
                                @endif




                                @if($don->rep_msg =="")
                                    <script type="text/javascript">

                                        $.ajaxSetup({
                                            headers: {
                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                            }
                                        });
                                        function sendReplyMessage() {
                                            swal({
                                                title: "Send Message!",
                                                content: "input",
                                                showCancelButton: true,
                                                inputPlaceholder: "Express your feeling to the donor"
                                            })
                                                .then((inputValue) => {
                                                    if (inputValue=== null) return false;
                                                    if (inputValue === "") {
                                                        swal.showInputError("You need to write something!");
                                                        return false
                                                    }
                                                    $.ajax({
                                                        url: "{{URL::route('p.update' , $don->cause_id )}}",
                                                        type: "PATCH",
                                                        data:{
                                                            _token:'{{ csrf_token() }}',ajxmsg: inputValue , form: 2},
                                                        dataType: "html",
                                                        success: function () {
                                                            swal("Sent!", "Thank you! You're message has been sent!", "success");
                                                            location.reload();
                                                        }
                                                    });
                                                });

                                        }
                                    </script>
                                    <td><button class="btn btn-sm btn-warning" onclick="sendReplyMessage()"><i class="fa fa-download"></i></button> </td>
                                    @else
                                    <td><button class="btn btn-sm btn-info" onclick="swal('You sent a message:', '{{$don->rep_msg}}')"><i class="fa fa-envelope"></i></button></td>
                                @endif

                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="tab-pane fade" id="edit-tab-pane" role="tabpanel" aria-labelledby="edit-tab" tabindex="0">
                        <form method="post" action="{{route('p.update', $cause->id)}} " enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <table width="100%">
                                <tr>
                                    <td class="p-2"><label for="name">Cause Title</label> </td>
                                    <td class="p-2"><input type="text" class="form-control" name="cause_title" value="{{$cause->cause_title}}"></td>
                                    <td class="p-3"><label for="name">Ending Date</label> </td>
                                    <td class="p-3"><input type="datetime-local" class="form-control" name="cause_end_date" value="{{$cause->cause_end_date}}"></td>
                                </tr>
                                <tr>
                                    <td class=" p-2"><label for="name">Cause location</label> </td>
                                    <td class=" p-2">
                                        <input type="text" class="form-control" name="cause_location" value="{{$cause->cause_location}}">
                                    </td>
                                    <td class=" p-3"><label for="name">Cause Category</label> </td>
                                    <td class=" p-3">

                                        <select class="form-control" name="cause_cat_id" >
                                            <option selected value="{{$cause->cause_cat_id}}">{{$cause->category->cat_name}}</option>
                                            @foreach($cats as $cat)
                                                @if($cat->cat_id != $cause->cuse_cat_id)
                                            <option value="{{$cat->cat_id}}" >{{$cat->cat_name}}</option>
                                                @endif
                                           @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=" p-2"><label for="name">Cause Image</label> </td>
                                    <td class=" p-2">
                                        <input type="file" class="form-control" name="cause_img" >
                                    </td>
                                </tr>

                                <tr>
                                    <td class="p-2"><label for="name">Fundraising Description</label> </td>
                                    <td class="p-2" colspan="3"><textarea class="form-control" name="cause_description">{{$cause->cause_description}}</textarea> </td>
                                </tr>
                                <tr>
                                    <td class="p-2"><label for="name">Tags</label> </td>
                                    <td class="p-2" colspan="3"><input type="text" name="cause_tags" value="{{$cause->cause_tags}}" class="form-control"></td>
                                </tr>

                            </table>

                            <button type="submit" name="btn_update_posted_donation" class="btn btn-theme mt-4"><i class="fa fa-floppy-o" style="margin-right: 10px;"></i> Save Changes</button>


                        </form>
                    </div>
                    @if($followups->count() !=0)
                    <div class="tab-pane fade" id="followup-tab-pane" role="tabpanel" aria-labelledby="followup-tab" tabindex="0">
                        <div class="row">
                            <!-- Items need responsiveness -->

                            @foreach($followups as $follow)
                                <div class="fu_items col-md-3 p-2 bg-light m-2" style="width: 31%;">
                                    <h5>Followup # {{$follow->id}}</h5>
                                    <form id="followups_form" method="post" style="display: inline;" action="{{route('p.update', $follow->id)}} " enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                              <label for="title">Title</label>
                                        <input type="text" class="form-control " name="title" value="{{$follow->title}}">

                                        <label for="title">Image</label>
                                        <input type="file" class="form-control " name="img" value="{{$follow->img}}">

                                        <label for="title">Description</label>
                                        <textarea class="form-control " name="description">{{$follow->description}}</textarea>

                                        <input type="hidden" name="cause_id" value="{{$follow->cause_id}}">
                                        <input type="hidden" id="fuid" value="{{$follow->id}}">
                                        <button type="submit" name="btn_update_followup" class="btn btn-theme mt-4"><i class="fa fa-floppy-o" style="margin-right: 10px;"></i> Update</button>

                                    </form>
                                    <form id="delete_fu_form" method="post" style="display: inline;" action="{{route('c.destroy', $follow->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="delete_followup_request">
                                        <button type="submit"    class="btn btn-danger mt-4 show_confirm"><i class="fa fa-floppy-o" style="margin-right: 10px;"></i> Delete</button>
                                    </form>
                                </div>

                            @endforeach
                                @else

                                @endif
                        </div>


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
<script type="text/javascript">


    $('.show_confirm').click(function(event) {

        var form =  $('#delete_fu_form');

        var name = $(this).data("name");

        event.preventDefault();

        swal({

            title: `Are you sure you want to delete this record?`,

            text: "If you delete this, it will be gone forever.",

            icon: "warning",

            buttons: true,

            dangerMode: true,

        })

            .then((willDelete) => {

                if (willDelete) {

                    form.submit();

                }

            });

    });
</script>
    <script>
        function readMsg(name, msg){
            swal(name + "'s Message", msg);
        }

    </script>
    <script>
        $(document).ready(function () {
            $('#tbl_Donors').DataTable();
        });
    </script>
@endsection

