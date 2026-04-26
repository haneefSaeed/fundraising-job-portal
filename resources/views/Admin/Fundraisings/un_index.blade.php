@extends('layouts.admin')

@section("content")

<div class="p-4 md:p-6 bg-gray-100 min-h-screen">

    <!-- Page Title -->
    <div class="mb-4">
        <h2 class="text-lg md:text-xl font-semibold text-gray-800">
            <span class="text-gray-500">Fundraising /</span> Pending Fundraising
        </h2>
    </div>

    <!-- Card -->
    <div class="bg-white shadow rounded-lg overflow-hidden">

        <!-- Header -->
        <div class="px-4 py-3 border-b">
            <h3 class="text-base font-semibold text-gray-700">
                Unverified Fundraising
            </h3>
        </div>

        <!-- Table Wrapper -->
        <div class="overflow-x-auto">
            <table id="unFundTable" class="min-w-full text-sm text-left text-gray-600">

                <thead class="bg-gray-50 text-xs uppercase text-gray-500">
                    <tr>
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Title</th>
                        <th class="px-4 py-3">Description</th>
                        <th class="px-4 py-3">Fundraiser</th>
                        <th class="px-4 py-3">Category</th>
                        <th class="px-4 py-3">Image</th>
                        <th class="px-4 py-3">Location</th>
                        <th class="px-4 py-3">Date</th>
                        <th class="px-4 py-3">Goal</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Tags</th>
                        <th class="px-4 py-3">Action</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 bg-white">
                @foreach($causes as $cause)
                    <tr class="hover:bg-gray-50">

                        <td class="px-4 py-2">{{ $cause->id }}</td>

                        <td class="px-4 py-2 font-medium text-gray-900">
                            {{ $cause->cause_title }}
                        </td>

                        <td class="px-4 py-2">
                            {{ substr($cause->cause_description, 0, 50) }}
                        </td>

                        <td class="px-4 py-2">
                            {{ $cause->fr_profile->user->name }}
                        </td>

                        <td class="px-4 py-2">
                            {{ $cause->category->cat_name }}
                        </td>

                        <td class="px-4 py-2">
                            <img src="{{ asset($cause->cause_img) }}"
                                 class="w-12 h-8 object-cover rounded">
                        </td>

                        <td class="px-4 py-2">
                            {{ $cause->cause_location }}
                        </td>

                        <td class="px-4 py-2">
                            {{ date('Y-M-d', strtotime($cause->cause_start_date)) }}
                        </td>

                        <td class="px-4 py-2">
                            {{ number_format($cause->cause_goal) }}
                        </td>

                        <td class="px-4 py-2">
                            <span class="px-2 py-1 text-xs rounded bg-yellow-100 text-yellow-700">
                                Pending
                            </span>
                        </td>

                        <td class="px-4 py-2">
                            {{ $cause->cause_tags }}
                        </td>

                        <!-- Actions -->
                        <td class="px-4 py-2">
                            <div class="flex items-center gap-2">

                                <a href="/admin/unfund/verify/{{$cause->id}}"
                                   class="verifyConfirm text-green-600 hover:underline text-sm">
                                    Verify
                                </a>

                                <a href="/admin/unfund/reject/{{$cause->id}}"
                                   class="rejectConfirm text-red-600 hover:underline text-sm">
                                    Reject
                                </a>

                            </div>
                        </td>

                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>

    </div>
</div>

@endsection

@section('footer')
<script>
    document.getElementById('db_pitem_funds').classList.add('active');
    document.getElementById('db_item_unfund').classList.add('active');
</script>

<script>
    $('.verifyConfirm').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');

        swal({
            title: 'Are you sure?',
            text: 'You are about to verify this Fundraising!',
            icon: 'warning',
            buttons: ["Cancel", "Verify!"],
        }).then(function(value) {
            if (value) window.location.href = url;
        });
    });

    $('.rejectConfirm').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');

        swal({
            title: 'Are you sure?',
            text: 'You are about to reject this Fundraising!',
            icon: 'warning',
            buttons: ["Cancel", "Reject!"],
        }).then(function(value) {
            if (value) window.location.href = url;
        });
    });

    $(document).ready(function () {
        $('#unFundTable').DataTable({
            order: [[0, 'desc']],
        });
    });
</script>
@endsection