@extends('layouts.admin')

@section("content")

<div class="p-4 md:p-6 bg-black min-h-screen text-white">

    <!-- Top Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">

        <!-- Welcome -->
        <div class="lg:col-span-2 bg-neutral-900 border border-neutral-800 rounded-xl p-5">
            <h5 class="text-lg font-medium text-white">
                Welcome back {{ucfirst(strtolower(Auth::guard('admin')->user()->name))}}!
            </h5>
            <p class="text-sm text-gray-400 mt-2">
                You have done <span class="text-white font-semibold">72%</span> more sales today.
            </p>
        </div>

        <!-- Stats -->
        <div class="grid grid-cols-2 gap-4">

            <!-- Fundraising -->
            <div class="bg-neutral-900 border border-neutral-800 rounded-xl p-4">
                <p class="text-xs text-gray-400">Fundraisings</p>
                <h3 class="text-lg mt-1">
                    {{App\Models\causes::count()}}
                </h3>
                <p class="text-xs text-red-400 mt-1">
                    Unverified: {{App\Models\causes::where('cause_status', 0)->count()}}
                </p>
            </div>

            <!-- Jobs -->
            <div class="bg-neutral-900 border border-neutral-800 rounded-xl p-4">
                <p class="text-xs text-gray-400">Jobs</p>
                <h3 class="text-lg mt-1">
                    {{App\Models\Job::count()}}
                </h3>
                <p class="text-xs text-red-400 mt-1">
                    Unverified: {{App\Models\Job::where('status', 0)->count()}}
                </p>
            </div>

        </div>
    </div>

    <!-- Chart + Income -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mt-4">

        <!-- Chart -->
        <div class="lg:col-span-2 bg-neutral-900 border border-neutral-800 rounded-xl p-4">
            <h5 class="text-sm text-gray-400 mb-3">One week report</h5>
            <div id="totalRevenueChart"></div>
        </div>

        <!-- Income / Expense -->
        <div class="bg-neutral-900 border border-neutral-800 rounded-xl p-4 flex flex-col justify-center">

            <div id="growthChart" class="mb-4"></div>

            <div class="text-center text-sm text-gray-400 mb-4">
                40% Income Growth
            </div>

            <div class="flex justify-between text-sm">

                <div>
                    <p class="text-gray-400">Income</p>
                    <h6 class="text-white">
                        {{$transactions->where('trans_type', 'Income')->sum('trans_amount')}}
                    </h6>
                </div>

                <div>
                    <p class="text-gray-400">Expense</p>
                    <h6 class="text-white">
                        {{$transactions->where('trans_type', 'Expense')->sum('trans_amount')}}
                    </h6>
                </div>

            </div>

        </div>
    </div>

    <!-- Bottom Stats -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mt-4">

        <!-- Blogs -->
        <div class="bg-neutral-900 border border-neutral-800 rounded-xl p-4">
            <p class="text-xs text-gray-400">Blogs</p>
            <h3 class="text-lg mt-1">{{App\Models\Blog::count()}}</h3>
        </div>

        <!-- Draft Transactions -->
        <div class="bg-neutral-900 border border-neutral-800 rounded-xl p-4">
            <p class="text-xs text-gray-400">Draft Transactions</p>
            <h3 class="text-lg mt-1">
                {{App\Models\transactions::where('trans_status', 0)->count()}}
            </h3>
        </div>

        <!-- Placeholder Cards -->
        <div class="bg-neutral-900 border border-neutral-800 rounded-xl p-4 col-span-2">
            <p class="text-xs text-gray-400">Profile Report</p>
            <h3 class="text-lg mt-2">$84,686k</h3>
            <p class="text-green-400 text-xs mt-1">+68.2%</p>
        </div>

    </div>

</div>

@endsection