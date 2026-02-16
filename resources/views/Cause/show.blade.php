@extends('layouts.app')
@section('header')
<title>Causes</title>
@endsection


@php
function formatShort($number) {
    if ($number >= 1000000) {
        return number_format($number / 1000000, 1) . 'M';
    } elseif ($number >= 1000) {
        return number_format($number / 1000, 1) . 'K';
    }
    return number_format($number, 2);
}
@endphp


@section('content')
<!-- Breadcrumbs -->
<section class="bg-cover bg-center py-10" style="background-image: url('{{ asset('images/bg.jpg') }}')">
    <div class="container mx-auto px-4 md:px-20 text-white flex justify-between items-center">
        <div>
            <h2 class="text-3xl font-semibold">{{ $cause->cause_title }}</h2>
        </div>
        <div class="text-right text-sm">
            You are here / <a href="#" class="underline">home</a> / <a href="#" class="underline">causes</a>
        </div>
    </div>
</section>

<!-- Cause Details -->
<section class="py-10">
    <div class="container mx-auto px-4 md:px-20 grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Cause -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded shadow overflow-hidden">
                <div class="h-96 bg-cover bg-center" style="background-image: url('{{ asset($cause->cause_img) }}');"></div>

                <div class="p-6 space-y-4">
                    <div class="flex justify-between items-start">
                        <h3 class="text-2xl font-semibold">{{ $cause->cause_title }}</h3>
                        <button class="bg-yellow-500 text-white px-3 py-1 rounded text-sm" data-bs-toggle="modal" data-bs-target="#DonorsModel">
                            <i class="fa fa-list mr-1"></i> Donors List
                        </button>
                    </div>

                    <!-- Cause Info -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 items-center text-sm">
                        <div class="flex items-center space-x-2">
                            <img class="w-6 h-6 rounded-full" src="{{ asset($cause->fr_profile->user->avatar) }}" alt="avatar">
                            @if($cause->fr_profile->is_company == 0)
                            <span>{{ $cause->fr_profile->user->name }}</span>
                            @else
                            <a href="dp/{{ $cause->fr_profile->company_profile->id }}" class="underline">
                                {{ Str::limit($cause->fr_profile->company_profile->name, 22) }}
                            </a>
                            @endif
                        </div>
                        <div class="flex items-center space-x-1">
                            <i class="fa fa-clock-o"></i>
                            <span>{{ \Carbon\Carbon::parse($cause->cause_start_date)->diffForHumans() }}</span>
                        </div>
                        <div class="flex items-center space-x-1">
                            <i class="fa fa-folder"></i>
                            <span>{{ $cause->category->cat_name }}</span>
                        </div>
                        <div class="flex items-center space-x-1">
                            <i class="fa fa-location-arrow"></i>
                            <span>{{ $cause->cause_location }}</span>
                        </div>
                    </div>

                    <!-- Donation Progress -->
                    <div class="space-y-2 mt-4">
                        @php
                        $raised = $donations->sum('amount');
                        $progress = $cause->cause_goal > 0 ? ($raised / $cause->cause_goal) * 100 : 0;
                        @endphp
                        <div class="w-full h-4 bg-gray-200 rounded">
                            <div class="h-4 bg-gray-500 rounded" style="width: {{ $progress }}%"></div>
                        </div>
                        <div class="flex justify-between text-xs font-medium">
                            <span>Raised: ${{ $raised }}</span>
                            <span>Donors: {{ $donations->count() }}</span>
                            <span>Goal: ${{ number_format($cause->cause_goal) }}</span>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="mt-4">
                        @if($cause->fr_profile->frp_user_id != Auth::id())
                        <button class="bg-green-500 text-white px-4 py-2 rounded" data-bs-toggle="modal" data-bs-target="#DonationModel">
                            <i class="fa fa-heart mr-1"></i> Quick Donation
                        </button>
                        @elseif($cause->fr_profile->frp_user_id == Auth::id())
                        <button class="bg-blue-600 text-white px-4 py-2 rounded" data-bs-toggle="modal" data-bs-target="#FollowUpModel">
                            <i class="fa fa-plus mr-1"></i> Add Follow-up
                        </button>
                        @endif
                    </div>

                    <!-- Description -->
                    <div class="text-justify space-y-2">
                        {!! $cause->cause_description !!}
                    </div>
                </div>
            </div>

            <!-- Follow-ups -->
            @if($followup->where('cause_id', $cause->id)->count() > 0)
            <h3 class="text-xl font-semibold mt-6 mb-3">Follow-ups</h3>
            @foreach($followup->where('cause_id', $cause->id) as $follow)
            <div class="bg-white rounded shadow overflow-hidden mb-4 flex flex-col lg:flex-row">
                @if($follow->img)
                <div class="lg:w-80 h-60 bg-cover bg-center" style="background-image: url('{{ asset($follow->img) }}');"></div>
                @endif
                <div class="p-4 flex-1 space-y-2">
                    <h4 class="text-lg font-semibold">{{ $follow->title }}</h4>
                    <div class="flex items-center justify-between text-sm space-x-2">
                        <div class="flex items-center space-x-2">
                            <img class="w-6 h-6 rounded-full" src="{{ asset($cause->fr_profile->user->avatar) }}">
                            <span>
                                @if($cause->fr_profile->is_company == 0)
                                {{ $cause->fr_profile->user->name }}
                                @else
                                <a href="dp/{{ $cause->fr_profile->company_profile->id }}" class="underline">{{ Str::limit($cause->fr_profile->company_profile->name, 22) }}</a>
                                @endif
                            </span>
                        </div>
                        <span><i class="fa fa-calendar mr-1"></i>{{ $follow->date }}</span>
                    </div>
                    <div>{!! $follow->description !!}</div>
                </div>
            </div>
            @endforeach
            @endif
        </div>

        <!-- Sidebar -->
        <div class="space-y-6 bg-gray-50 border rounded-lg p-6">



            <div class="flex items-center gap-6">
                <div class="relative w-32 h-32">

                    <svg class="w-full h-full -rotate-90" viewBox="0 0 80 80">

                        <!-- Background -->
                        <circle
                            cx="40"
                            cy="40"
                            r="30"
                            stroke="currentColor"
                            stroke-width="5"
                            fill="transparent"
                            class="text-gray-300" />

                        <!-- Progress -->
                        <circle
                            id="progressCircle"
                            cx="40"
                            cy="40"
                            r="30"
                            stroke="currentColor"
                            stroke-width="5"
                            fill="transparent"
                            stroke-dasharray="188.5"
                            stroke-dashoffset="188.5"
                            stroke-linecap="round"
                            class="text-black transition-all duration-[1500ms] ease-out" />
                    </svg>

                    <!-- Percentage -->
                    <div class="absolute inset-0 flex items-center justify-center">
                        <span id="percentText" class="text-lg font-bold text-gray-700">0%</span>
                    </div>

                </div>


                <div class="flex flex-col justify-center items-start text-xl font-semibold">
                    @if($cause->fr_profile->frp_user_id == Auth::id())

                    @if ($donations->sum('amount') > 10)
                    Great Job!
                    @else
                    Hang on!
                    @endif
                    @endif
                    <div>Raised {{number_format($donations->sum('amount'), 2, '.')}}</div>
                    <div>from {{ number_format($cause->cause_goal , 2, '.') }}</div>
                </div>
            </div>



        </div>
    </div>

    <div class="space-y-6">
        <h3 class="text-xl font-semibold">Related Causes</h3>
        @foreach($related as $rel)
        @if($rel->id != $cause->id)
        <div class="bg-white rounded shadow overflow-hidden">
            <div class="h-48 bg-cover bg-center" style="background-image: url('{{ asset($rel->cause_img) }}');"></div>
            <div class="p-4 space-y-2">
                <h4 class="font-semibold text-lg">
                    <a href="{{ route('c.show', $rel->id) }}" class="hover:underline">{{ $rel->cause_title }}</a>
                </h4>
                <div class="text-xs space-x-2">
                    <span><i class="fa fa-calendar mr-1"></i>{{ \Carbon\Carbon::parse($rel['cause_start_date'])->diffForHumans() }}</span>
                    <span><i class="fa fa-folder mr-1"></i>{{ $rel->category->cat_name }}</span>
                    <span><i class="fa fa-location-arrow mr-1"></i>{{ $rel->cause_location }}</span>
                </div>
                <p class="text-sm">{{ Str::limit(strip_tags($rel->cause_description), 150) }}</p>
                <a href="{{ route('c.show', $rel->id) }}" class="inline-block bg-blue-600 text-white px-3 py-1 rounded text-sm">Read More</a>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</section>


<script>
    document.addEventListener("DOMContentLoaded", () => {

        const raised = {{$donations -> sum('amount')}};
        const goal = {{$cause -> cause_goal}};

        const percent = goal > 0 ?
            Math.min((raised / goal) * 100, 100) :
            0;

        const circle = document.getElementById("progressCircle");
        const text = document.getElementById("percentText");

        const circumference = 188.5;
        const offset = circumference - (percent / 100) * circumference;

        setTimeout(() => {
            circle.style.strokeDashoffset = offset;
        }, 100);

        let current = 0;
        const interval = setInterval(() => {
            current++;
            text.textContent = Math.floor(current) + "%";
            if (current >= percent) clearInterval(interval);
        }, 15);
    });
</script>


@endsection