@extends('layouts.admin')

@section("content")

<div class="p-4 md:p-6 bg-gray-100 min-h-screen text-gray-900">

    <!-- Title -->
    <h4 class="text-lg mb-4">
        <span class="text-gray-500">Fundraisings /</span>
        <span class="text-gray-900 font-semibold">All Fundraisings</span>
    </h4>

    <!-- Card -->
    <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm">

        <!-- Header -->
        <div class="px-5 py-4 border-b border-gray-200 text-sm text-gray-600">
            All Fundraising
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">

            <table id="allFundTable" class="min-w-full text-sm text-left">

                <!-- Head -->
                <thead class="bg-gray-100 text-gray-600 uppercase text-xs tracking-wider">
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
                </tr>
                </thead>

                <!-- Body -->
                <tbody class="divide-y divide-gray-200">

                @foreach($causes as $cause)
                    <tr class="hover:bg-gray-50 transition">

                        <td class="px-4 py-3 text-gray-700">{{ $cause->id }}</td>

                        <td class="px-4 py-3 font-medium text-gray-900">
                            {{ $cause->cause_title }}
                        </td>

                        <td class="px-4 py-3 text-gray-500">
                            {{ substr($cause->cause_description, 0, 35) }}
                        </td>

                        <td class="px-4 py-3 text-gray-700">
                            {{ $cause->fr_profile->user->name }}
                        </td>

                        <td class="px-4 py-3 text-gray-700">
                            {{ $cause->category->cat_name }}
                        </td>

                        <td class="px-4 py-3">
                            <img class="w-12 h-8 object-cover rounded-md border border-gray-200"
                                 src="{{ asset($cause->cause_img) }}">
                        </td>

                        <td class="px-4 py-3 text-gray-500">
                            {{ $cause->cause_location }}
                        </td>

                        <td class="px-4 py-3 text-gray-500">
                            {{ date('Y-M-d', strtotime($cause->cause_start_date)) }}
                        </td>

                        <td class="px-4 py-3 text-gray-800 font-medium">
                            {{ number_format($cause->cause_goal) }}
                        </td>

                        <!-- Status -->
                        <td class="px-4 py-3">
                            @if($cause->cause_status == 0)
                                <span class="px-2 py-1 text-xs rounded-md bg-blue-100 text-blue-600 border border-blue-200">
                                    Pending
                                </span>
                            @elseif($cause->cause_status == 1)
                                <span class="px-2 py-1 text-xs rounded-md bg-green-100 text-green-600 border border-green-200">
                                    Verified
                                </span>
                            @else
                                <span class="px-2 py-1 text-xs rounded-md bg-red-100 text-red-600 border border-red-200">
                                    Rejected
                                </span>
                            @endif
                        </td>

                        <td class="px-4 py-3 text-gray-500">
                            {{ $cause->cause_tags }}
                        </td>

                    </tr>
                @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection