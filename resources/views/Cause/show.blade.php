@extends('layouts.app')
@section('header')
<title>Causes</title>
@endsection



@section('content')
<!-- Breadcrumbs -->
<div class="flex items-center justify-center">

    <div class="max-w-screen-xl">
        <section class="bg-cover bg-center mt-10 md:mt-14 text-black ">
            <div class="  px-4 md:px-20 flex flex-col">
                <div>
                    <h2 class="text-3xl font-semibold">{{ $cause->cause_title }}</h2>
                </div>
                <div class="mt-3 text-sm">
                    <i class="fa-solid fa-home"></i> <a href="#" class="underline">home</a> / <a href="#" class="underline">causes</a> / {{$cause->cause_title}}
                </div>
            </div>
        </section>

        <!-- Cause Details -->
        <section class="py-10">
            <div class="container mx-auto px-4 md:px-20 grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Main Cause -->
                <div class="lg:col-span-2 space-y-6">
                    <div class="bg-white rounded overflow-hidden">
                        <div class="h-96 bg-cover bg-center rounded-md mb-7" style="background-image: url('{{ asset($cause->cause_img) }}');"></div>

                        <div class=" space-y-4">


                            <!-- Cause Info -->
                            <!-- <div class="grid grid-cols-2 md:grid-cols-4 gap-4 items-center text-sm">
                                <div class="flex items-center space-x-2">
                                   
                                </div>
                                Posted this
                              

                                <div class="flex items-center space-x-1">
                                    <i class="fa fa-folder"></i>
                                    <span>{{ $cause->category->cat_name }}</span>
                                </div>
                                <div class="flex items-center space-x-1">
                                    <i class="fa fa-location-arrow"></i>
                                    <span>{{ $cause->cause_location }}</span>
                                </div>
                            </div> -->

                            <div class=" flex items-start justify-start">
                                <div class="flex items-center justify-center gap-2">
                                    <div class="border hover:bg-gray-50 font-bold text-sm pr-1 rounded-full flex items-center justify-center">
                                        <img class="w-10 h-10 rounded-full" src="{{ asset($cause->fr_profile->user->avatar) }}" alt="avatar" />
                                        @if($cause->fr_profile->is_company == 0)
                                        <span>{{ $cause->fr_profile->user->name }}</span>
                                        @else
                                        <a href="dp/{{ $cause->fr_profile->company_profile->id }}" class="">
                                            {{ Str::limit($cause->fr_profile->company_profile->name, 22) }}
                                        </a>
                                        @endif
                                    </div>
                                    <h3 class="font-bold text-xs"> Posted this <span class="text-sm">{{ \Carbon\Carbon::parse($cause->cause_start_date)->diffForHumans() }}</span> in <span class="text-sm">{{ $cause->cause_location }}</span> </h3>
                                </div>
                            </div>



                            <!-- Description -->
                            <div class="text-justify font-montserrat font-[500] space-y-2">
                                {!! $cause->cause_description !!}
                            </div>
                        </div>
                    </div>

                    <!-- Follow-ups -->
                    @if($followup->where('cause_id', $cause->id)->count() > 0)
                    <h3 class="text-xl font-semibold mt-2 mb-3">Updates</h3>
                    @foreach($followup->where('cause_id', $cause->id) as $follow)
                    <div class="bg-white rounded-lg  border overflow-hidden mb-4 flex flex-col p-4 lg:flex-row">
                        <!-- @if($follow->img)
                        <div class="lg:w-80 h-60 bg-cover bg-center" style="background-image: url('{{ asset($follow->img) }}');"></div>
                        @endif -->
                        <div class="p-4 flex-1 space-y-2">
                            <h4 class="text-md font-bold">{{ $follow->title }}</h4>
                            <div class="flex items-center justify-between text-sm space-x-2">
                                <div class="flex items-center justify-center gap-2">
                                    <div class="border hover:bg-gray-50 font-bold text-sm pr-1 rounded-full flex items-center justify-center">
                                        <img class="w-10 h-10 rounded-full" src="{{ asset($cause->fr_profile->user->avatar) }}" alt="avatar" />
                                        @if($cause->fr_profile->is_company == 0)
                                        <span>{{ $cause->fr_profile->user->name }}</span>
                                        @else
                                        <a href="dp/{{ $cause->fr_profile->company_profile->id }}" class="">
                                            {{ Str::limit($cause->fr_profile->company_profile->name, 22) }}
                                        </a>
                                        @endif
                                    </div>
                                    <h3 class="font-bold text-xs"> Posted this <span>{{ \Carbon\Carbon::parse($cause->cause_start_date)->diffForHumans() }}</span> </h3>
                                </div>
                            </div>
                            <div>{!! $follow->description !!}</div>
                        </div>
                    </div>
                    @endforeach

                    @endif
                </div>

                <!-- Sidebar -->
                <div class="space-y-6 border rounded-lg p-6 sticky top-6 self-start  ">

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

                            @if ($donations->sum('amount') > 100)
                            <h1 class="text-[9pt] font-bold">GREAT JOB! YOU HAVE RAISED</h1>
                            <h1 class="font-bold text-4xl"> ${{number_format($donations->sum('amount'), 2, '.')}}</h1>
                            <h2 class="font-light text-3xl"><span class="font-light text-2xl inline">Of </span> ${{ formatShort($cause->cause_goal , 2, '.') }}</h2>
                            <h2 class="font-medium text-[10pt] ">{{formatShort($donations->count('amount'))}} Donations</h2>
                            @elseif ($donations->sum('amount') <100 && $donations->sum('amount')>0)
                                <h1 class="text-[9pt] font-bold">YOU HAVE RAISED</h1>
                                <h1 class="font-bold text-4xl"> ${{number_format($donations->sum('amount'), 2, '.')}}</h1>
                                <h2 class="font-light text-3xl"><span class="font-light text-2xl inline">Of </span> ${{ formatShort($cause->cause_goal , 2, '.') }}</h2>
                                <h2 class="font-medium text-[10pt] ">{{formatShort($donations->count('amount'))}} Donations</h2>
                                @elseif ($donations->sum ('amount') == 0)
                                <h1 class="font-bold">Sorry! You have not raised anything yet! </h1>
                                <h2 class="font-light">Hang in there! sometimes it takes time to raise but it is absolutely possible </h1>
                                    @endif

                                    @else

                                    @if ($donations->sum('amount') > 100)
                                    <h1 class="font-bold text-4xl"> ${{number_format($donations->sum('amount'), 2, '.')}}</h1>
                                    <h2 class="font-light text-3xl"><span class="font-light text-2xl inline">Of </span> ${{ formatShort($cause->cause_goal , 2, '.') }}</h2>
                                    <h2 class="font-medium text-[10pt] ">{{formatShort($donations->count('amount'))}} Donations</h2>
                                    @elseif ($donations->sum('amount') <100 && $donations->sum('amount')>0)
                                        <h1 class="font-bold text-4xl"> ${{number_format($donations->sum('amount'), 2, '.')}}</h1>
                                        <h2 class="font-light text-3xl"><span class="font-light text-2xl inline">Of </span> ${{ formatShort($cause->cause_goal , 2, '.') }}</h2>
                                        <h2 class="font-medium text-[10pt] ">{{formatShort($donations->count('amount'))}} Donations</h2>
                                        @elseif ($donations->sum ('amount') == 0)
                                        <h2 class="font-bold ">Be the first to take action!</h1>
                                            <h2 class="font-light">Help them win this! you can do it. </h1>

                                                @endif

                                                @endif

                        </div>
                    </div>
                    <div class="flex justify-center items-center">
                        @if($cause->fr_profile->frp_user_id == Auth::id())
                        <div>followups</div>
                        @else

                        <button class="bg-gradient-to-tr from-black to-gray-500 rounded-full p-4 text-gray-100 w-2/3  hover:from-gray-600 font-bold text-sm hover:to-gray-500 transition-color duration-1000 ">Donate Now</button>
                        @endif
                    </div>

                    <div class="flex items-center flex-col w-full justify-center mt-5 gap-3">
                        <h1 class="font-bold text-sm mb-2">Latest donations</h1>
                        @foreach($donations as $donation)
                        <div class="flex justify-between items-center border rounded-lg w-full p-3">
                            <div class="flex flex-col gap-2">
                                <p class="text-xs font-semibold">{{$donation->user->name}}</p>
                                <p class="text-xs ">{{ \Carbon\Carbon::parse($donation->date)->diffForHumans() }}</p>
                            </div>
                            <p class="text-[9pt] font-semibold">${{formatShort($donation->amount)}}</p>
                        </div>
                        @endforeach

                        <button class="border font-bold text-sm mb-2 border-gray-700 hover:bg-gray-50 rounded-full p-2">See more</button>
                    </div>



                </div>
            </div>

            <div class="space-y-6 px-4 md:px-20">
                <h3 class="text-xl font-semibold">Related Causes</h3>
                <div class="flex gap-2 ">
                    @foreach($related as $rel)
                    @if($rel->id != $cause->id)
                    <div class="bg-white rounded shadow-sm overflow-hidden">
                        <div class="h-48 bg-cover bg-center" style="background-image: url('{{ asset($rel->cause_img) }}');"></div>
                        <div class="p-4 space-y-2">
                            <h4 class="font-semibold text-lg">
                                <a href="{{ route('c.show', $rel->id) }}" class="hover:underline">{{ $rel->cause_title }}</a>
                            </h4>
                            <div class="text-xs space-x-2">
                                <span><i class="fa fa-calendar mr-1"></i>{{ \Carbon\Carbon::parse($rel['cause_start_date'])->diffForHumans() }}</span>
                                <span>by @if($cause->fr_profile->is_company == 0)
                                    <span>{{ $cause->fr_profile->user->name }}</span>
                                    @else
                                    <a href="dp/{{ $cause->fr_profile->company_profile->id }}" class="">
                                        {{ Str::limit($cause->fr_profile->company_profile->name, 22) }}
                                    </a>
                                    @endif
                                </span>
                            </div>
                            <p class="text-sm line-clamp-2">{{$rel->cause_description }}</p>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>

            </div>
        </section>


    </div>
</div>




<script>
    document.addEventListener("DOMContentLoaded", () => {

        // const raised = {{$donations -> sum('amount')}};
        // const goal = {{$cause -> cause_goal}};


        raised = 300
        goal = 500
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