@extends('layouts.app')

@section('header')
<title>Show Category</title>
@endsection

@section('content')

{{-- BREADCRUMBS --}}
<section class="bg-gray-100 py-8">
    <div class="max-w-screen-sm mx-auto px-4 text-center">
        <h1 class="text-3xl font-bold mb-2 text-gray-800">{{ $cat->cat_name }}</h1>
        <p class="text-sm text-gray-600 mb-2">
            You are here / <a href="../../" class="text-blue-600 hover:underline">Home</a> /
            <a href="../../jobs" class="text-blue-600 hover:underline">Jobs</a> / {{ $cat->cat_name }}
        </p>
        <p class="text-gray-700 font-semibold text-sm">{{ $job_count }} Job(s) listed</p>
    </div>
</section>

{{-- JOB LIST AND SIDEBAR --}}
<section class="py-12 flex justify-center items-center">
    <div class="w-3/4">
        <div class="container mx-auto px-4 grid grid-cols-1 lg:grid-cols-12 gap-8">

            {{-- JOB LIST --}}
            <div class="lg:col-span-8 space-y-6">
                @if($jobs->count() > 0)
                @foreach($jobs as $job)
                @if($job->status == 1)
                <div onclick="window.location.href=`{{ route('j.show', $job->id) }}`" class="cursor-pointer bg-white flex flex-col p-4 rounded-lg shadow overflow-hidden md:flex hover:shadow-lg transition">

                    {{-- Job Title --}}
                    <h3 class="font-bold text-xl ">{{ $job->title }}</h3>
                    <div class="mb-2">{{ $job->small_description }}</div>
                    {{-- Profile / Company Info --}}
                    <div class="flex items-center gap-2 mb-2">
                        <div class="flex items-center gap-2 border p-1 rounded-full hover:bg-gray-50">
                            {{-- Avatar --}}
                            <img class="w-6 h-6 rounded-full object-cover"
                                src="{{ asset($job->company_profile->avatar ?? 'images/u/default_avatar.png') }}"
                                alt="avatar" />

                            {{-- Name --}}
                            @if($job->company_profile->is_company == 0)
                            <span class="font-semibold text-sm">{{ $job->company_profile->name }}</span>
                            @else
                            <a href="{{ url('dp/'.$job->company_profile->id) }}" class="font-semibold text-sm hover:underline">
                                {{ Str::limit($job->company_profile->name, 22) }}
                            </a>
                            @endif
                        </div>
                        <span class="flex items-center gap-1 text-xs font-semibold">
                            Posted this </i> {{ \Carbon\Carbon::parse($job->created_at)->diffForHumans() }}
                        </span>
                    </div>

                    {{-- Job Details --}}
                    <div class="flex py-2 flex-wrap gap-2 font-semibold text-gray-700 text-sm  justify-between">
                        <span class="flex items-center gap-1">
                            <a href="{{ route('j.showcat', $job->category->id) }}"> <i class="fa fa-{{ $job->category->cat_icon }}"></i> {{ $job->category->cat_name }}</a>
                        </span>
                        <span class="flex items-center gap-1">
                            <i class="fa fa-location-arrow"></i> {{ $job->location }}
                        </span>

                    </div>
                </div>
                @endif
                @endforeach
                @else
                <div class="text-center py-12">
                    <h4 class="text-gray-700 text-lg">Sorry, no Jobs to display yet! :(</h4>
                </div>
                @endif

                {{-- PAGINATION --}}
                <div class="flex justify-center mt-6">
                    {!! $jobs->onEachSide(5)->links() !!}
                </div>
            </div>

            {{-- SIDEBAR --}}
            <div class="lg:col-span-4 space-y-6">

                {{-- SEARCH FORM --}}
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-4">Search</h3>

                    <form method="GET" action="{{ route('j.search') }}" class="space-y-4">

                        {{-- 🔍 Keyword --}}
                        <div>
                            <label class="block text-sm font-medium mb-1">Keyword</label>
                            <input type="text"
                                name="keyword"
                                placeholder="Keyword"
                                value="{{ request('keyword') }}"
                                class="w-full bg-gray-100 border-0 rounded-full px-4 py-2 text-black placeholder:text-gray-400 focus:ring-2 focus:ring-gray-300">
                        </div>

                        {{-- 📂 Category --}}
                        <div>
                            <label class="block text-sm font-medium mb-1">Category</label>
                            <select name="category"
                                class="w-full bg-gray-100 border-0 rounded-full px-4 py-2 text-black focus:ring-2 focus:ring-gray-300">

                                <option value="">All Categories</option>

                                @foreach($cats as $item)
                                @if($item->cat_cat == 'JOB')
                                <option value="{{ $item->id }}"
                                    {{ request('category') == $item->id ? 'selected' : '' }}>
                                    {{ $item->cat_name }}
                                </option>
                                @endif
                                @endforeach

                            </select>
                        </div>

                        {{-- 📍 Location --}}
                        <div>
                            <label class="block text-sm font-medium mb-1">Location</label>
                            <input type="text"
                                name="location"
                                placeholder="Location"
                                value="{{ request('location') }}"
                                class="w-full bg-gray-100 border-0 rounded-full px-4 py-2 text-black placeholder:text-gray-400 focus:ring-2 focus:ring-gray-300">
                        </div>

                        {{-- 🔘 Buttons --}}
                        <div class="flex gap-2 mt-4 justify-center items-center">

                            <button type="submit"
                                class="w-1/3 bg-gray-700 hover:bg-gray-800 text-white rounded-full px-4 py-2 flex justify-center items-center gap-2">
                                <i class="fa fa-search"></i> Search
                            </button>

                            <a href="{{ route('j.search') }}"
                                class="w-1/3 text-center bg-red-500 hover:bg-red-600 text-white rounded-full px-4 py-2">
                                Reset
                            </a>

                        </div>

                    </form>
                </div>
                {{-- CATEGORIES LIST --}}
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-3">Categories</h3>
                    <ul class="space-y-1 text-gray-700">
                        @foreach($cats as $item)
                        @if($item->cat_root != 0)
                        <li class="ml-4 list-disc">
                            <a href="{{ $item->id }}" class="hover:underline">{{ $item->cat_name }} ({{ App\Models\Job::where('cat_id', $item->id)->count() }})</a>
                        </li>
                        @endif
                        @endforeach
                        <li class="ml-4 list-disc">
                            <a href="../" class="hover:underline">Show All</a>
                        </li>
                    </ul>
                </div>

            </div>

        </div>
    </div>
</section>

{{-- DONATION MODAL --}}
<div id="DonationModel" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg w-full max-w-lg p-6 relative">
        <h5 class="text-xl font-bold mb-2">Contribute Now</h5>
        <h5 class="text-lg font-semibold mb-2">Help Afghan Refugees</h5>
        <p class="text-gray-700 mb-4">Suspendisse potenti. Ut non tempus justo. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
        <h5 class="mb-2">Please select an Amount you wish to donate:</h5>
        <form class="flex flex-wrap gap-2 mb-4">
            <button class="bg-yellow-400 hover:bg-yellow-500 font-semibold px-4 py-2 rounded">$1</button>
            <button class="bg-yellow-400 hover:bg-yellow-500 font-semibold px-4 py-2 rounded">$5</button>
            <button class="bg-yellow-400 hover:bg-yellow-500 font-semibold px-4 py-2 rounded">$10</button>
            <button class="bg-yellow-400 hover:bg-yellow-500 font-semibold px-4 py-2 rounded">$20</button>
            <input type="text" class="border rounded px-2 py-1 w-20" placeholder="Other..">
        </form>
        <div class="flex justify-end gap-2">
            <button onclick="document.getElementById('DonationModel').classList.add('hidden')" class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400">Close</button>
            <button class="px-4 py-2 rounded bg-green-600 hover:bg-green-700 text-white font-semibold">Proceed</button>
        </div>
    </div>
</div>

@endsection