@extends('layouts.admin')

@section("content")

<div class="p-4 md:p-6 bg-gray-100 min-h-screen text-gray-900">

    <!-- Title -->
    <h4 class="text-lg mb-4">
        <span class="text-gray-500">Fundraising /</span>
        <span class="text-gray-900 font-semibold">Donations</span>
    </h4>

    <!-- Card -->
    <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">

        <!-- Header -->
        <div class="px-5 py-4 border-b border-gray-200 text-sm text-gray-700 font-medium">
            All Donations
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">

            <table id="donTable" class="min-w-full text-sm text-left">

                <!-- Head -->
                <thead class="bg-gray-100 text-gray-600 uppercase text-xs tracking-wider">
                <tr>
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Donor</th>
                    <th class="px-4 py-3">Cause</th>
                    <th class="px-4 py-3">Amount</th>
                    <th class="px-4 py-3">Date</th>
                    <th class="px-4 py-3">Message</th>
                    <th class="px-4 py-3">Reply</th>
                </tr>
                </thead>

                <!-- Body -->
                <tbody class="divide-y divide-gray-200">

                @foreach($donations as $donation)
                    <tr class="hover:bg-gray-50 transition">

                        <td class="px-4 py-3 text-gray-700">
                            {{ $donation->id }}
                        </td>

                        <td class="px-4 py-3 font-medium text-gray-900">
                            {{ $donation->user->name }}
                        </td>

                        <td class="px-4 py-3 text-gray-700">
                            {{ $donation->cause->cause_title }}
                        </td>

                        <td class="px-4 py-3 font-semibold text-gray-900">
                            {{ number_format($donation->amount) }}
                        </td>

                        <td class="px-4 py-3 text-gray-500">
                            {{ date('Y-M-d h:i:s', strtotime($donation->date)) }}
                        </td>

                        <td class="px-4 py-3 text-gray-600">
                            {{ $donation->msg }}
                        </td>

                        <td class="px-4 py-3 text-gray-600">
                            {{ $donation->rep_msg }}
                        </td>

                    </tr>
                @endforeach

                </tbody>

            </table>

        </div>
    </div>

</div>

@endsection