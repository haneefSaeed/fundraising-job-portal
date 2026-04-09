@extends('layouts.app')

@section('header')
<title>Search Jobs</title>
@endsection

@section('content')

{{-- BREADCRUMBS --}}
<section class="bg-gray-100 py-8">
    <div class="max-w-screen-sm mx-auto px-4 text-center">
        <h1 class="text-3xl font-bold mb-2 text-gray-800">Search{{$keyword == ""? " Result" : ": " . $keyword}}</h1>

        <p class="text-sm text-gray-600 mb-2">
            You are here /
            <a href="{{ url('/') }}" class="text-blue-600 hover:underline">Home</a> /
            <a href="{{ url('/jobs') }}" class="text-blue-600 hover:underline">Jobs</a> /
            Search
        </p>

        <p class="text-gray-700 font-semibold text-sm">
            {{ $job_count }} Job(s) found
        </p>
    </div>
</section>

{{-- JOB LIST + SIDEBAR --}}
<section class="py-12 flex justify-center items-center">
    <div class="w-3/4">
        <div class="container mx-auto px-4 grid grid-cols-1 lg:grid-cols-12 gap-8">

            {{-- JOB LIST --}}
            <div class="lg:col-span-8 space-y-6">

                @if($jobs->count() > 0)

                @foreach($jobs as $job)

                <div class="bg-white rounded-lg shadow overflow-hidden md:flex hover:shadow-lg transition">

                    <div class="md:w-1/3 h-48 md:h-auto">
                        @if(Str::contains($job->img, 'images/u/default'))
                        <div class="w-full h-full flex items-center justify-center bg-gray-200 text-gray-500 text-4xl">
                            <i class="fa fa-briefcase"></i>
                        </div>
                        @else
                        <img src="{{ asset($job->img) }}" class="w-full h-full object-cover">
                        @endif
                    </div>

                    <div class="md:w-2/3 p-4 flex flex-col justify-between">
                        <div>

                            <h4 class="text-xl font-semibold mb-2">
                                <a href="{{ url('j/'.$job->id) }}"
                                    class="text-gray-800 hover:text-blue-600">
                                    {{ $job->title }}
                                </a>
                            </h4>

                            <div class="flex flex-wrap text-sm text-gray-600 gap-4 mb-2">
                                <span>
                                    <i class="fa fa-calendar"></i>
                                    {{ \Carbon\Carbon::parse($job->created_at)->diffForHumans() }}
                                </span>

                                @if($job->company_profile)
                                <span>
                                    <i class="fa fa-user"></i>
                                    <a href="{{ url('dp/'.$job->company_profile->id) }}" class="hover:underline">
                                        {{ ucfirst(strtolower($job->company_profile->name)) }}
                                    </a>
                                </span>
                                @endif

                                <span>
                                    <i class="fa fa-folder"></i>
                                    {{ $job->category->cat_name ?? '' }}
                                </span>

                                <span>
                                    <i class="fa fa-eye"></i>
                                    {{ $job->seenctr }}
                                </span>
                            </div>

                            <p class="text-gray-700 mb-2">
                                {{ $job->small_description }}
                            </p>

                            <p class="text-gray-600 text-sm">
                                <i class="fa fa-location-arrow"></i>
                                {{ $job->location }}
                            </p>

                        </div>
                    </div>

                </div>

                @endforeach

                @else
                <div class="text-center py-12">
                    <h4 class="text-gray-700 text-lg">No jobs found.</h4>
                </div>
                @endif

                {{-- PAGINATION --}}
                <div class="flex justify-center mt-6">
                    {{ $jobs->links() }}
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

                {{-- CATEGORIES --}}
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-3">Categories</h3>

                    <ul class="space-y-1 text-gray-700">
                        @foreach($cats as $item)
                        @if($item->cat_cat == 'JOB')
                        <li class="ml-4 list-disc">
                            <a href="{{ url('j/cat/'.$item->id) }}" class="hover:underline">
                                {{ $item->cat_name }}
                                ({{ App\Models\Job::where('cat_id', $item->id)->count() }})
                            </a>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </div>

            </div>

        </div>
    </div>
</section>

@endsection