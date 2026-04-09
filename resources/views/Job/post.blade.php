@extends('layouts.app')

@section('content')

<section class="min-h-screen grid md:grid-cols-2">

    {{-- LEFT SIDE (IMAGE + OVERLAY) --}}
    <div class="relative hidden md:block">
        <img src="{{ asset('/Images/Jobs/graphicdesigner.jpg') }}"
            class="absolute inset-0 w-full h-full object-cover" />
        <div class="absolute inset-0 bg-black opacity-80"></div>
        <div class="relative z-10 flex items-center justify-center h-full text-center px-6">
            <div>
                <h2 class="text-white text-3xl font-bold mb-3">
                    Find the Right Talent
                </h2>
                <p class="text-gray-300">
                    Post jobs and connect with the best candidates easily.
                </p>
            </div>
        </div>
    </div>

    {{-- RIGHT SIDE --}}
    <div class="bg-gray-100 flex items-center justify-center py-10 px-4">
        <div class="w-full max-w-xl">

            @php
            $companyProfile = \App\Models\company_profile::where('user_id', Auth::id())->first();
            @endphp

            {{-- ALERTS --}}
            @if(session('msg'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-6">
                {{ session('msg') }}
            </div>
            @endif

            @if(!$companyProfile)
            {{-- COMPANY PROFILE FORM --}}
            <h1 class="text-2xl font-bold mb-6">Create Your Company Profile</h1>
            <p>In order to post a job, please provide your company details</p>
            <form method="POST" action="{{ route('j.store') }}" enctype="multipart/form-data">
                 @csrf
                <div class="space-y-4">
                    <input type="hidden" name="create_company" value="1">
                    <input type="text" name="name" placeholder="Company Name*" required
                        class="w-full border-0 rounded-xl px-3 py-2">
                    <textarea name="statement" placeholder="Company Statement*" rows="4" required
                        class="w-full border-0 rounded-xl px-3 py-2"></textarea>

                        Company Size * 
                    <select name="comp_size_id" class="border-0 rounded-xl px-3 py-2" required>
                        @foreach($comp_sizes as $size)
                        <option value="{{ $size->id }}">{{ $size->range }}</option>
                        @endforeach
                    </select>

                    <input type="email" name="email" placeholder="Email*" required
                        class="w-full border-0 rounded-xl px-3 py-2">
                    <input type="text" name="industry" placeholder="Industry*" required
                        class="w-full border-0 rounded-xl px-3 py-2">
                    <input type="text" name="website" placeholder="Website"
                        class="w-full border-0 rounded-xl px-3 py-2">
                    <input type="text" name="phone" placeholder="Phone*" required
                        class="w-full border-0 rounded-xl px-3 py-2">
                    <input type="text" name="address" placeholder="Address*" required
                        class="w-full border-0 rounded-xl px-3 py-2">

                    <input type="text" name="instagram" placeholder="Instagram"
                        class="w-full border-0 rounded-xl px-3 py-2">
                    <input type="text" name="facebook" placeholder="Facebook"
                        class="w-full border-0 rounded-xl px-3 py-2">
                    <input type="text" name="linkedin" placeholder="LinkedIn"
                        class="w-full border-0 rounded-xl px-3 py-2">
                    <input type="text" name="twitter" placeholder="Twitter"
                        class="w-full border-0 rounded-xl px-3 py-2">

                    <button type="submit"
                        class="w-full bg-black hover:bg-gray-700 text-white py-3 rounded-xl font-semibold">
                        Create Profile
                    </button>
                </div>
            </form>

            @else
            {{-- JOB POST FORM --}}
            <h1 class="text-2xl font-bold mb-6">Post a New Vacancy</h1>

            <form method="POST" enctype="multipart/form-data" action="{{ route('j.store') }}">
                @csrf
                <div class="space-y-4">

                    <input type="hidden" name="post_job" value="1">
                    <input type="text" name="title" required placeholder="Job Title"
                        class="w-full border-0 rounded-xl px-3 py-2">
                    <input type="text" name="reference" placeholder="Job Reference"
                        class="w-full border-0 rounded-xl px-3 py-2">
                    <input type="text" name="small_description" placeholder="Short Description"
                        class="w-full border-0 rounded-xl px-3 py-2">
                    <textarea name="description" rows="4" placeholder="Description"
                        class="w-full border-0 rounded-xl px-3 py-2"></textarea>

                    <div class="grid md:grid-cols-2 gap-4">
                        <select name="edu_lvl_id" class="border-0 rounded-xl px-3 py-2">
                            @foreach($edulvls as $edu)
                            <option value="{{$edu->id}}">{{$edu->detail}}</option>
                            @endforeach
                        </select>

                        <select name="exp_lvl_id" class="border-0 rounded-xl px-3 py-2">
                            @foreach($explvls as $exp)
                            <option value="{{$exp->id}}">{{$exp->detail}}</option>
                            @endforeach
                        </select>
                    </div>

                    <select name="pref_gender" class="w-full border-0 rounded-xl px-3 py-2">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="any" selected>Any</option>
                    </select>

                    <div class="grid md:grid-cols-2 gap-4">
                        <select name="cat_id" class="border-0 rounded-xl px-3 py-2">
                            @foreach($cats as $cat)
                            @if($cat->cat_root != 0)
                            <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                            @endif
                            @endforeach
                        </select>

                        <input type="text" name="location" placeholder="Location"
                            class="border-0 rounded-xl px-3 py-2">
                    </div>

                    <div class="grid md:grid-cols-2 gap-4">
                        <select name="emp_type_id" class="border-0 rounded-xl px-3 py-2">
                            @foreach($emptype as $empt)
                            <option value="{{$empt->id}}">{{$empt->detail}}</option>
                            @endforeach
                        </select>

                        <input type="datetime-local" name="closing_date"
                            class="border-0 rounded-xl px-3 py-2">
                    </div>

                    <div class="flex gap-4">
                        <label><input type="radio" name="is_remote" value="1"> Yes</label>
                        <label><input type="radio" name="is_remote" value="0"> No</label>
                    </div>

                    <input type="text" name="cause_tags" placeholder="Tags"
                        class="w-full border-0 rounded-xl px-3 py-2">

                    <input type="hidden" name="status" value="0">
                    <input type="hidden" name="posted_date" value="{{ now() }}">
                    <input type="hidden" name="comp_profile_id" value="{{ $companyProfile->id }}">

                    <button type="submit"
                        class="w-full bg-black hover:bg-gray-700 text-white py-3 rounded-xl font-semibold">
                        Post Job
                    </button>
                </div>
            </form>

            @endif

        </div>
    </div>

</section>

@endsection