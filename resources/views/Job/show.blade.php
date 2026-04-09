@extends('layouts.app')

@section('header')
<title>Jobs | {{ $job->title }}</title>
@endsection

@section('content')

@if($job->status == 0)
<script>
    window.location.href = `{{ route('jobs') }}`;
</script>
@endif

{{-- BREADCRUMBS --}}
<section class="bg-gray-100 py-8">
    <div class="container mx-auto px-4 text-center">
        <p class="text-sm text-gray-600 mb-2">
            You are here / <a href="../" class="text-blue-600 hover:underline">Home</a> /
            <a href="./" class="text-blue-600 hover:underline">Jobs</a> / {{ $job->title }}
        </p>
        <h1 class="text-3xl font-bold mb-2 text-gray-800">{{ $job->title }}</h1>
        <p class="text-gray-700 mb-2">{{ $job->small_description }}</p>
        <p class="text-gray-700 mb-4"><span class="font-semibold">{{ \App\Models\application::where('vac_id', $job->id)->count() }}</span> Applicants applied</p>

        @if(Session::has('msg'))
        <div class="mx-auto w-3/4 md:w-1/2 bg-green-100 text-green-800 p-3 rounded flex items-center justify-center">
            <i class="fa fa-info-circle mr-2"></i> {{ Session::get('msg') }}
        </div>
        @endif

        @if(Session::has('error'))
        <div class="mx-auto w-3/4 md:w-1/2 bg-red-100 text-red-800 p-3 rounded flex items-center justify-center">
            <i class="fa fa-exclamation-circle mr-2"></i> {{ Session::get('error') }}
        </div>
        @endif
    </div>
</section>

{{-- JOB DETAILS --}}
<section class="py-12 flex justify-center items-center">
    <div class="w-3/4">
        <div class="container mx-auto px-4 grid grid-cols-1 lg:grid-cols-9 gap-8">

            {{-- Main Job Details --}}
            <div class="lg:col-span-6 space-y-6">

                <!-- {{-- Job Image --}}
                @if(!Str::contains($job->img, 'images/u/default'))
                <div class="w-full rounded shadow overflow-hidden h-80 bg-cover bg-center" style="background-image: url('{{ asset($job->img) }}')"></div>
                @endif -->

                {{-- Job Meta Info --}}
                <div class="flex gap-3 justify-between ">

                    <div class="flex items-center  gap-3">
                        <div class="w-10 h-10 flex items-center justify-center rounded-full bg-blue-100 text-blue-600">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <span class="font-semibold text-gray-800">{{ $job->created_at->diffForHumans() }}</span>
                    </div>

                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 flex items-center justify-center rounded-full bg-green-100 text-green-600">
                            <i class="fa fa-user"></i>
                        </div>
                        <span class="font-semibold text-gray-800">
                            {{ ucfirst(strtolower($job->company_profile->name)) }}
                        </span>
                    </div>

                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 flex items-center justify-center rounded-full bg-purple-100 text-purple-600">
                            <i class="fa fa-folder"></i>
                        </div>
                        <span class="font-semibold text-gray-800">
                            {{ $job->category->cat_name }}
                        </span>
                    </div>

                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 flex items-center justify-center rounded-full bg-yellow-100 text-yellow-600">
                            <i class="fa fa-eye"></i>
                        </div>
                        <span class="font-semibold text-gray-800">{{ $job->seenctr }}</span>
                    </div>

                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 flex items-center justify-center rounded-full bg-red-100 text-red-600">
                            <i class="fa fa-location-arrow"></i>
                        </div>
                        <span class="font-semibold text-gray-800">{{ $job->location }}</span>
                    </div>
                </div>

                {{-- Job Table --}}
                <div class="overflow-x-auto">
                    <table class="table-auto w-full text-left text-sm text-gray-700 mt-4 border border-gray-200 rounded">
                        <tbody>
                            <tr class="border-b">
                                <th class="py-2 px-3 font-semibold">Employment Type</th>
                                <td class="py-2 px-3">{{ $job->emp_type->detail }}</td>
                                <th class="py-2 px-3 font-semibold">Vacancy No.</th>
                                <td class="py-2 px-3">{{ $job->reference }}</td>
                            </tr>
                            <tr class="border-b">
                                <th class="py-2 px-3 font-semibold">Remote Job</th>
                                <td class="py-2 px-3">{{ $job->is_remote ? 'Yes' : 'No' }}</td>
                                <th class="py-2 px-3 font-semibold">Gender</th>
                                <td class="py-2 px-3">{{ $job->pref_gender }}</td>
                            </tr>
                            <tr class="border-b">
                                <th class="py-2 px-3 font-semibold">Minimum Experience</th>
                                <td class="py-2 px-3">{{ $job->exp_level->detail }}</td>
                                <th class="py-2 px-3 font-semibold">Minimum Education</th>
                                <td class="py-2 px-3">{{ $job->edu_level->detail }}</td>
                            </tr>
                            <tr class="border-b">
                                <th class="py-2 px-3 font-semibold">Company Size</th>
                                <td class="py-2 px-3">{{ $job->company_profile->comp_size->range }}</td>
                                <th class="py-2 px-3 font-semibold">Expires on</th>
                                <td class="py-2 px-3">{{ $job->closing_date }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                {{-- Job Description --}}
                <div class="prose max-w-none mt-4">
                    {!! $job->description !!}
                </div>

                {{-- Apply Button --}}
                {{-- Apply Button --}}
                @if($isExpired)
                <button disabled
                    class="w-full bg-gray-400 text-white font-semibold px-6 py-3 rounded-xl cursor-not-allowed flex items-center justify-center">
                    <i class="fa fa-ban mr-2"></i> Job Expired
                </button>
                @elseif($alreadyApplied)
                <button disabled
                    class="w-full bg-gray-400 text-white font-semibold px-6 py-3 rounded-xl cursor-not-allowed flex items-center justify-center">
                    <i class="fa fa-check mr-2"></i> Already Applied
                </button>
                @elseif(!Auth::check())
                <a href="{{ route('login') }}" class="w-full block text-center bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-xl shadow">
                    <i class="fa fa-sign-in mr-2"></i> Login to Apply
                </a>
                @elseif(!$profile)
                {{-- COMPLETE PROFILE BUTTON --}}
                <button id="showProfileFormBtn"
                    class="bg-black hover:bg-gray-700 text-white px-4 py-2 rounded mb-4">
                    Complete Your Profile and Apply
                </button>

                {{-- INLINE PROFILE FORM (HIDDEN BY DEFAULT) --}}
                <div id="profileFormContainer" class="hidden bg-gray-100 p-3">
                    <h1 class="text-2xl font-bold  mb-6">Complete Your Professional Profile</h1>
                    <p>In order to Apply for a job, please complete your professional profile</p>

                    <form method="POST" action="{{ route('p.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="space-y-4">

                            <input type="text" name="current_position" placeholder="Current Position "
                                class="w-full border-0 rounded-xl px-3 py-2">

                            <input type="text" name="current_company" placeholder="Current Company"
                                class="w-full border-0 rounded-xl px-3 py-2">

                            <input type="text" name="location" placeholder="Location"
                                class="w-full border-0 rounded-xl px-3 py-2">

                            <textarea name="statement" rows="4" placeholder="Professional Statement" required
                                class="w-full border-0 rounded-xl px-3 py-2"></textarea>

                            <div class="grid md:grid-cols-2 gap-4">
                                <label class="block">
                                    CV (PDF)
                                    <input type="file" name="cv" accept=".pdf" class="w-full border-0 rounded-xl px-3 py-2" require>
                                </label>
                                <label class="block">
                                    Cover Letter (PDF)
                                    <input type="file" name="d" accept=".pdf" class="w-full border-0 rounded-xl px-3 py-2">
                                </label>
                            </div>

                            <label class="block">
                                Other Document (optional)
                                <input type="file" name="other_doc" class="w-full border-0 rounded-xl px-3 py-2">
                            </label>

                            <select name="career_id" class="border-0 rounded-xl px-3 py-2 w-full" required>
                                <option value="">Select Career Path</option>
                                @foreach($careers as $career)
                                <option value="{{ $career->id }}">{{ $career->level }}</option>
                                @endforeach
                            </select>

                            <select name="edu_id" class="border-0 rounded-xl px-3 py-2 w-full" required>
                                <option value="">Select Highest Education</option>
                                @foreach($educations as $edu)
                                <option value="{{ $edu->id }}">{{ $edu->detail }}</option>
                                @endforeach
                            </select>

                            <input type="number" name="total_exp" placeholder="Total Years of Experience" min="0" required
                                class="w-full border-0 rounded-xl px-3 py-2">

                            <button type="submit" name="btn_submit_career_info"
                                class="w-full bg-green-600 hover:bg-green-700 text-white py-3 rounded-xl font-semibold">
                                Save Profile
                            </button>
                        </div>
                    </form>
                </div>

                {{-- TOGGLE SCRIPT --}}
                <script>
                    document.getElementById('showProfileFormBtn').addEventListener('click', function() {
                        const form = document.getElementById('profileFormContainer');
                        form.classList.toggle('hidden');
                        // Optional: scroll into view
                        if (!form.classList.contains('hidden')) {
                            form.scrollIntoView({
                                behavior: 'smooth'
                            });
                        }
                    });
                </script>
                @elseif($job->company_profile->user_id == Auth::id())
                <section id="jobApplicants" class="mt-12 bg-gray-100 p-6 rounded-lg shadow">
                    <h3 class="text-xl font-bold mb-4">Applicants for this Job</h3>

                    @if($applications->where('vac_id', $job->id)->count() > 0)
                    @foreach($applications->where('vac_id', $job->id) as $app)
                    <div class="border-b py-3">
                        <p><strong>Name:</strong> {{ $app->prof_prof->user->name }}</p>
                        <p><strong>Email:</strong> {{ $app->prof_prof->user->email }}</p>
                        <p><strong>Message:</strong> {{ $app->message ?? 'No message' }}</p>

                        <p><strong>CV:</strong>
                            @if($app->prof_prof->cv)
                            <a href="{{ asset('storage/'.$app->prof_prof->cv) }}" target="_blank" class="text-blue-600 underline">View CV</a>
                            @else
                            N/A
                            @endif
                        </p>

                        @if($app->prof_prof->other_doc)
                        <p><strong>Other Document:</strong>
                            <a href="{{ asset('storage/'.$app->prof_prof->other_doc) }}" target="_blank" class="text-blue-600 underline">View</a>
                        </p>
                        @endif
                    </div>
                    @endforeach
                    @else
                    <p>No applicants yet.</p>
                    @endif
                </section>

                <script>
                    function scrollToApplicants() {
                        const section = document.getElementById('jobApplicants');
                        section.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                </script>
                @else
                <button id="btn_apply_now" onclick="openModal()"
                    class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-3 rounded-xl shadow flex items-center justify-center">
                    <i class="fa fa-paper-plane mr-2"></i> Apply Now
                </button>
                @endif

            </div>

            {{-- Related Jobs --}}
            <div class="lg:col-span-3 space-y-6">
                <h3 class="text-xl font-bold mb-4">Related Jobs</h3>

                @foreach ($rel_jobs as $rel)
                @if($rel->id != $job->id && $rel->status ==1)
                <div
                    onclick="window.location.href=`{{ route('j.show', $rel->id) }}`"
                    class="cursor-pointer bg-white flex flex-col p-4 rounded-lg shadow overflow-hidden hover:shadow-lg transition">
                    {{-- Job Title --}}
                    <h4 class="font-bold text-lg">{{ $rel->title }}</h4>

                    {{-- Short Description --}}
                    <div class="text-gray-700 text-sm mb-2 truncate">
                        {{ $rel->small_description }}
                    </div>

                    {{-- Profile / Company Info --}}
                    <div class="flex items-center gap-2 mb-2">
                        <div class="flex items-center gap-2 border p-1 rounded-full hover:bg-gray-50">
                            {{-- Avatar --}}
                            <img class="w-6 h-6 rounded-full object-cover"
                                src="{{ asset($rel->company_profile->avatar ?? 'images/u/default_avatar.png') }}"
                                alt="avatar" />

                            {{-- Name --}}
                            @if($rel->company_profile->is_company == 0)
                            <span class="font-semibold text-sm">{{ $rel->company_profile->name }}</span>
                            @else
                            <a href="{{ url('dp/'.$rel->company_profile->id) }}" class="font-semibold text-sm hover:underline">
                                {{ Str::limit($rel->company_profile->name, 22) }}
                            </a>
                            @endif
                        </div>
                        <span class="flex items-center gap-1 text-xs font-semibold text-gray-600">
                            {{ \Carbon\Carbon::parse($rel->Posted_date)->diffForHumans() }}
                        </span>
                    </div>

                    {{-- Job Details --}}
                    <div class="flex py-2 flex-wrap gap-2 font-semibold text-gray-700 text-sm justify-between">
                        <span class="flex items-center gap-1">
                            <a href="{{ route('j.showcat', $rel->category->id) }}">
                                <i class="fa fa-{{ $rel->category->cat_icon }}"></i> {{ $rel->category->cat_name }}
                            </a>
                        </span>
                        <span class="flex items-center gap-1">
                            <i class="fa fa-location-arrow"></i> {{ $rel->location }}
                        </span>
                    </div>
                </div>
                @endif
                @endforeach
            </div>

        </div>
    </div>

</section>

{{-- APPLY MODAL --}}
<div class="hidden" id="ApplyJobModal">
    <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg w-full max-w-lg p-6 relative">
            <h5 class="text-xl font-bold mb-4">You're Applying for</h5>
            <h5 class="text-lg font-semibold mb-2">{{ $job->title }}</h5>
            <p class="text-gray-700 mb-4">Leave a note to the recruiters. (Optional)</p>
            <form method="POST" action="{{ route('j.store') }}" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <textarea name="message" class="w-full border rounded p-2" placeholder="Message (optional)"></textarea>
                <input type="file" name="cv" class="w-full border rounded p-2">
                <input type="hidden" name="user_id" value="{{ Auth::check() ? Auth::id() : -1 }}">
                <input type="hidden" name="vac_id" value="{{ $job->id }}">
                <div class="flex justify-end gap-2">
                    <button type="button" onclick="closeModal()" class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400">Close</button>
                    <button type="submit" name="btn_application_apply" class="px-4 py-2 rounded bg-green-600 hover:bg-green-700 text-white font-semibold">Apply</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const isLoggedIn = @json(Auth::check());
    const hasProfile = @json($profile ? true : false);
    const alreadyApplied = @json($alreadyApplied ? true : false);
    const isExpired = @json($isExpired ? true : false); // new flag

    function checkUser() {
        const btn = document.getElementById('btn_apply_now');

        if (!isLoggedIn) {
            window.location.href = "/login";
            return;
        }

        if (!hasProfile) {
            window.location.href = '/p/{{ auth()->check() ? encrypt(auth()->id()) : "" }}?reqppp&form=job';
            return;
        }

        if (alreadyApplied) {
            showWhoops(btn, "Whoops! Already Applied");
            return;
        }

        if (isExpired) {
            showWhoops(btn, "Sorry! Job Expired");
            return;
        }

        openModal();
    }

    function showWhoops(btn, message) {
        btn.disabled = true;
        btn.innerText = message;
        btn.classList.remove('bg-green-600', 'hover:bg-green-700');
        btn.classList.add('bg-red-500', 'cursor-not-allowed');

        // Optional: reset after 3 seconds
        setTimeout(() => {
            btn.disabled = false;
            btn.innerText = "Apply Now";
            btn.classList.remove('bg-red-500', 'cursor-not-allowed');
            btn.classList.add('bg-green-600', 'hover:bg-green-700');
        }, 3000);
    }

    function openModal() {
        document.getElementById('ApplyJobModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('ApplyJobModal').classList.add('hidden');
    }
</script>

@endsection