@extends('layouts.admin')

@section("content")

<div class="p-4 md:p-6 bg-gray-50 min-h-screen">

    <!-- Title -->
    <h4 class="text-lg md:text-xl font-semibold mb-4">
        <span class="text-gray-500">Jobs /</span>
        <span class="text-gray-900">All Posted Jobs</span>
    </h4>

    <!-- Card -->
    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">

        <!-- Header -->
        <div class="px-4 py-3 border-b text-sm font-medium text-gray-700">
            All Jobs
        </div>

        <!-- Table -->
        <div class="overflow-x-scroll">

            <table id="JobsTable" class="min-w-full text-sm text-left overflow-scroll">

                <!-- Head -->
                <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                <tr>
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Title</th>
                    <th class="px-4 py-3">Description</th>
                    <th class="px-4 py-3">Image</th>
                    <th class="px-4 py-3">Location</th>
                    <th class="px-4 py-3">Gender</th>
                    <th class="px-4 py-3">Company</th>
                    <th class="px-4 py-3">Education</th>
                    <th class="px-4 py-3">Experience</th>
                    <th class="px-4 py-3">Category</th>
                    <th class="px-4 py-3">Type</th>
                    <th class="px-4 py-3">Closing Date</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Tags</th>
                </tr>
                </thead>

                <!-- Body -->
                <tbody class="divide-y divide-gray-200">

                @foreach($jobs as $job)
                    <tr class="hover:bg-gray-50 transition">

                        <td class="px-4 py-3 text-gray-700">{{ $job->id }}</td>

                        <td class="px-4 py-3 font-semibold text-gray-900">
                            {{ $job->title }}
                        </td>

                        <td class="px-4 py-3 text-gray-500">
                            {{ substr($job->small_description, 0, 50) }}
                        </td>

                        <td class="px-4 py-3">
                            <img class="w-12 h-8 object-cover rounded border"
                                 src="{{ asset($job->img) }}">
                        </td>

                        <td class="px-4 py-3 text-gray-700">{{ $job->location }}</td>
                        <td class="px-4 py-3 text-gray-700">{{ $job->pref_gender }}</td>
                        <td class="px-4 py-3 text-gray-700">{{ $job->company_profile->name }}</td>
                        <td class="px-4 py-3 text-gray-700">{{ $job->edu_level->detail }}</td>
                        <td class="px-4 py-3 text-gray-700">{{ $job->exp_level->detail }}</td>
                        <td class="px-4 py-3 text-gray-700">{{ $job->category->cat_name }}</td>
                        <td class="px-4 py-3 text-gray-700">{{ $job->emp_type->detail }}</td>

                        <td class="px-4 py-3 text-gray-500">
                            {{ date('Y-M-d h:i:s', strtotime($job->closing_date)) }}
                        </td>

                        <!-- Status -->
                        <td class="px-4 py-3">
                            @if($job->status == 0)
                                <span class="px-2 py-1 text-xs rounded bg-blue-100 text-blue-600">
                                    Pending
                                </span>
                            @elseif($job->status == 1)
                                <span class="px-2 py-1 text-xs rounded bg-green-100 text-green-600">
                                    Verified
                                </span>
                            @else
                                <span class="px-2 py-1 text-xs rounded bg-red-100 text-red-600">
                                    Rejected
                                </span>
                            @endif
                        </td>

                        <td class="px-4 py-3 text-gray-500">{{ $job->tags }}</td>

                    </tr>
                @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection