@extends('layouts.app')
@section('header')
<title>Show single job</title>

<script src="//unpkg.com/alpinejs" defer></script>


<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function ConfirmDelete(frid) {
        swal({
                title: "Are you sure you want to End this Cause?",
                text: "Fundraising # " + frid + "is About to End and you will not be recovered",
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
                        success: function() {
                            swal("Done!", "FR # " + frid + " was deleted", "success");
                        }
                    });
                }
            });

    }
</script>


@endsection


@section('content')

@php
$userId = auth()->id();

$profile = \App\Models\prof_profile::where('user_id', $userId)->first();
$donatedAmount = \App\Models\donations::where('user_id', $userId)->sum('amount');

$appliedJobs = 0;
if ($profile) {
$appliedJobs = \App\Models\application::where('prof_prof_id', $profile->id)->count();
}
@endphp


<div class="flex w-full min-h-screen">
    <div x-data="{ activeTab: 'user-info' }" class="flex w-full min-h-screen">

        <!-- Sidebar -->
        <div class="flex flex-col w-64 bg-[#262626] py-2 px-7 gap-2 text-sm font-semibold font-montserrat">
            <p class="text-[8pt] font-semibold text-[#ebebeb] ">USER DETAIL</p>
            <button
                @click="activeTab = 'user-info'"
                :class="activeTab === 'user-info' ? 'bg-[#424242] text-[#ebebeb]' : 'bg-[#262626] text-[#ebebeb]'"
                class="p-2 font-semibold text-sm flex items-center gap-2 rounded-md transition-all duration-600 hover:bg-[#424242] hover:text-white">

                <i class="fa fa-user"></i> User
            </button>

            <button
                @click="activeTab = 'professional'"
                :class="activeTab === 'professional' ? 'bg-[#424242] text-[#ebebeb]' : 'bg-[#262626] text-[#ebebeb]'"
                class="p-2 font-semibold text-sm flex items-center gap-2 rounded-md transition-all duration-600 hover:bg-[#424242] hover:text-white">

                <i class="fa fa-black-tie"></i> Professional
            </button>

            <button
                @click="activeTab = 'postedDonations'"
                :class="activeTab === 'postedDonations' ? 'bg-[#424242] text-[#ebebeb]' : 'bg-[#262626] text-[#ebebeb]'"
                class="p-2 font-semibold text-sm flex items-center gap-2 rounded-md transition-all duration-600 hover:bg-[#424242] hover:text-white">

                <i class="fa fa-heart"></i> Posted Causes
            </button>
        </div>

        <!-- Main Content -->
        <div class="flex-1 bg-gray-50">
            <div x-show="activeTab === 'user-info'" class="p-6">
                <div class="text-3xl font-worksans font-medium mb-3 ">Welcome, {{$user->name}}</div>
                <div class="bg-gray-100 flex gap-5 justify-between border rounded p-4 text-md font-semibold border-gray-300 mb-4" >
                   <div class="border-gray-300 w-full border-r">Posted Jobs : 0</div>
                   <div class="border-gray-300 w-full border-r">Posted Jobs : 0</div>
                   <div class="border-gray-300 w-full border-r">Posted Jobs : 0</div>
                   <div class="w-full">Posted Jobs : 0</div>
                </div>
                @include('profile.tabs.user-info')
            </div>

            <div x-show="activeTab === 'professional'" class="p-6">
                @include('profile.tabs.professional')
            </div>

            <div x-show="activeTab === 'postedDonations'" class="p-6">
                @include('profile.tabs.posted-donations')
            </div>
        </div>


    </div>



</div>

</section>

</div>

@endsection

@section('footer_scripts')

<script>
    $(document).ready(function() {
        $('#tbl_mydonations').DataTable();
    });

    $(document).ready(function() {
        $('#tbl_myJobApplications').DataTable();
    });

    $(document).ready(function() {
        $('#tbl_myPostedJobs').DataTable();
    });
    $(document).ready(function() {
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