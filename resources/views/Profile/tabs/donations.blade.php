
 
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


 