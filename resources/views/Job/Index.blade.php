@extends('layouts.app')

@section('header')
<title>Jobs | Tagheer</title>
@endsection

@section('content')

{{-- SEARCH HEADER --}}
<section class="relative bg-cover bg-center text-white"
    style="background-image: url('{{ asset('images/bg_job.jpg') }}');">

    <div class="bg-black bg-opacity-40 py-14">

        <h1 class="text-4xl font-bold mb-6 text-center">Jobs</h1>

        <div class="flex justify-center items-center px-4">
            <div class="bg-white p-3 rounded-lg shadow-lg w-full max-w-5xl">

                <form method="GET" action="{{ route('j.search') }}"
                    class="flex flex-wrap md:flex-nowrap gap-2 items-center">

                    {{-- 🔍 Keyword --}}
                    <input type="text"
                        name="keyword"
                        placeholder="Keyword"
                        value="{{ request('keyword') }}"
                        class="bg-gray-100 border-0 rounded-full px-4 py-2 w-full text-black placeholder:text-gray-400">

                    {{-- 📂 Category --}}
                    <select name="category"
                        class="bg-gray-100 border-0 rounded-full px-4 py-2 w-full text-black">

                        <option value="">Category</option>

                        @foreach($cats as $cat)
                        @if ($cat->cat_root !=0)
                        <option value="{{ $cat->id }}"
                            {{ request('category') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->cat_name }}
                        </option>
                        @endif
                        @endforeach

                    </select>

                    {{-- 📍 Location --}}
                    <input type="text"
                        name="location"
                        placeholder="Location"
                        value="{{ request('location') }}"
                        class="bg-gray-100 border-0 rounded-full px-4 py-2 w-full text-black placeholder:text-gray-400">

                    {{-- 🔘 Buttons --}}
                    <div class="flex gap-2 w-full md:w-auto justify-center">

                        <button type="submit"
                            class="bg-gray-700 hover:bg-gray-800 text-white rounded-full px-4 py-2 flex items-center gap-2">
                            <i class="fa fa-search"></i> Search
                        </button>

                        <a href="{{ route('j.search') }}"
                            class="bg-red-500 hover:bg-red-600 text-white rounded-full px-4 py-2 flex items-center">
                            Reset
                        </a>

                    </div>

                </form>

            </div>
        </div>

    </div>
</section>

{{-- JOB CATEGORIES --}}
<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">Categories</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($cats as $cat)
            @if($cat->cat_root == 0)
            <div>
                <a class="text-black font-semibold text-lg mb-2 inline-block" href="{{ route('j.showcat', $cat->id) }}">
                    {{ $cat->cat_name }}
                </a>
            </div>
            @foreach($cats as $ct)
            @if($ct->cat_root == $cat->id)
            <div onclick="window.location.href=`{{ route('j.showcat', $ct->id) }}`" class="flex items-center p-4 bg-white rounded shadow hover:shadow-lg cursor-pointer transition">
                <div>
                    <h5 class="font-semibold text-lg">{{ $ct->cat_name }}</h5>
                    <p class="text-sm text-gray-600">{{ App\Models\Job::where('cat_id', '=', $ct->id)->where('status', '=', 1)->count() }} job(s)</p>
                </div>
            </div>
            @endif
            @endforeach
            @endif
            @endforeach
        </div>
    </div>
</section>
{{-- LATEST JOBS --}}
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">Latest Jobs</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($jobs as $job)
            <div onclick="window.location.href=`{{ route('j.show', $job->id) }}`" class="bg-white border rounded shadow hover:shadow-lg transition cursor-pointer">
                <div class="p-4">

                    {{-- Job Title --}}
                    <h3 class="font-bold text-xl mb-2">{{ $job->title }}</h3>

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
                    <div class="flex py-2 flex-wrap gap-2 font-semibold text-gray-700 text-sm mt-2 justify-between">
                        <span class="flex items-center gap-1">
                           <a href="{{ route('j.showcat', $job->category->id) }}"> <i class="fa fa-{{ $job->category->cat_icon }}"></i> {{ $job->category->cat_name }}</a>
                        </span>
                        <span class="flex items-center gap-1">
                            <i class="fa fa-location-arrow"></i> {{ $job->location }}
                        </span>
                        
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- POST A JOB CTA --}}
<section class="py-20 bg-gradient-to-r from-black to-gray-600 text-white">
    <div class="container mx-auto px-4 flex flex-col items-center text-center gap-6 max-w-3xl">
        {{-- Heading --}}
        <h2 class="text-4xl md:text-5xl font-extrabold mb-4 drop-shadow-lg">
            Post a Job Now
        </h2>

        {{-- Subtext --}}
        <p class="text-lg md:text-xl text-gray-100 mb-6">
            If you're hiring, showcase your vacancy to talented professionals today!
        </p>

        {{-- Button --}}
        <a href="{{route('j.create')}}"
            class="bg-white text-blue-700 font-bold px-8 py-4 rounded-full hover:bg-gray-200 transition-transform transform hover:scale-105 flex items-center gap-3 shadow-lg"
        >
            <i class="fa fa-arrow-right"></i> Post Now
</a>
    </div>
</section>

@endsection