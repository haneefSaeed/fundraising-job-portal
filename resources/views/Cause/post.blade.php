@extends('layouts.app')

@section('content')

<section class="min-h-screen bg-gray-100 py-10">
    <div class="max-w-6xl mx-auto px-4">

```
    {{-- Alerts --}}
    @if(isset($msg))
        @if($msg == 1)
            <div class="bg-green-100 text-green-700 p-4 rounded mb-6">Profile created successfully</div>
        @elseif($msg == 2)
            <div class="bg-green-100 text-green-700 p-4 rounded mb-6">Biography created successfully</div>
        @elseif($msg == 3)
            <div class="bg-yellow-100 text-yellow-700 p-4 rounded mb-6">Fundraising under process</div>
        @endif
    @endif

    <div class="grid md:grid-cols-2 gap-8">

        {{-- LEFT SIDE --}}
        <div class="bg-white p-6 rounded-2xl shadow">
            <h1 class="text-2xl font-bold mb-2">Start a Fundraising</h1>
            <p class="text-gray-600 mb-6">We can help you achieve your goal</p>

            {{-- Biography Step --}}
            @if(\App\Models\fr_profile::where('frp_user_id', Auth()->user()->id)->count() < 1)
                <form method="POST" action="{{ route('p.store') }}">
                    @csrf
                    <div class="bg-yellow-50 p-4 rounded-lg border border-yellow-200">
                        <h5 class="font-semibold mb-2">
                            <span class="text-red-500">Step 1:</span> Add a short biography
                        </h5>
                        <textarea name="frp_biography"
                                  class="w-full border rounded-lg px-3 py-2 mb-3"
                                  placeholder="e.g. We are a family fighting cancer..."></textarea>

                        <input type="hidden" name="frp_user_id" value="{{ Auth()->user()->id }}">

                        <button class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">
                            Save
                        </button>
                    </div>
                </form>
            @endif

            {{-- Company Notice --}}
            @if(\App\Models\company_profile::where('user_id', Auth()->user()->id)->count() < 1)
                <div class="mt-6 bg-blue-50 p-4 rounded-lg border border-blue-200">
                    <p class="text-sm text-blue-700 mb-3">
                        Create a company profile to increase trust and visibility.
                    </p>
                    <button onclick="window.location='/p/{{ encrypt(Auth()->user()->id) }}?reqcpp&form=cause'"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                        Go to Profile →
                    </button>
                </div>
            @endif
        </div>

        {{-- RIGHT SIDE FORM --}}
        <div class="bg-white p-6 rounded-2xl shadow">

            <form method="POST" enctype="multipart/form-data" action="{{ route('c.store') }}">
                @csrf

                <div id="notif"></div>

                <div class="space-y-4">

                    {{-- Title --}}
                    <div>
                        <label class="block text-sm mb-1">Cause Title</label>
                        <input type="text" name="cause_title"
                               class="w-full border rounded-lg px-3 py-2">
                    </div>

                    {{-- Description --}}
                    <div>
                        <label class="block text-sm mb-1">Description</label>
                        <textarea name="cause_description" rows="4"
                                  class="w-full border rounded-lg px-3 py-2"></textarea>
                    </div>

                    {{-- Image --}}
                    <div>
                        <label class="block text-sm mb-1">Upload Image</label>
                        <input type="file" name="cause_img"
                               class="w-full border rounded-lg px-3 py-2 bg-white">
                    </div>

                    {{-- Dates --}}
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm mb-1">Start Date</label>
                            <input type="datetime-local" name="cause_start_date"
                                   value="{{ now() }}"
                                   class="w-full border rounded-lg px-3 py-2">
                        </div>

                        <div>
                            <label class="block text-sm mb-1">End Date</label>
                            <input type="datetime-local" name="cause_end_date"
                                   class="w-full border rounded-lg px-3 py-2">
                        </div>
                    </div>

                    {{-- Category + Location --}}
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm mb-1">Category</label>
                            <select name="cause_cat_id"
                                    class="w-full border rounded-lg px-3 py-2">
                                @foreach($cats as $cat)
                                    <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm mb-1">Location</label>
                            <input type="text" name="cause_location"
                                   class="w-full border rounded-lg px-3 py-2"
                                   placeholder="e.g. Austin Texas, USA">
                        </div>
                    </div>

                    {{-- Goal + Tags --}}
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm mb-1">Target Goal ($)</label>
                            <input type="number" name="cause_goal"
                                   class="w-full border rounded-lg px-3 py-2">
                        </div>

                        <div>
                            <label class="block text-sm mb-1">Tags</label>
                            <input type="text" name="cause_tags"
                                   class="w-full border rounded-lg px-3 py-2">
                        </div>
                    </div>

                    {{-- Hidden --}}
                    @if(\App\Models\fr_profile::where('frp_user_id', Auth()->user()->id)->first())
                        <input type="hidden" name="cause_frp_id"
                               value="{{ \App\Models\fr_profile::where('frp_user_id', Auth()->user()->id)->first()->id }}">
                    @endif

                    <input type="hidden" name="cause_status" value="0">

                    {{-- Submit --}}
                    <button type="submit"
                            class="w-full bg-green-600 hover:bg-green-700 text-white py-3 rounded-xl font-semibold">
                        Launch Fundraising
                    </button>

                </div>
            </form>

        </div>

    </div>
</div>
```

</section>
@endsection

@section('footer_scripts')

<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (document.getElementById('form_frp_data')) {
            document.querySelector('form').classList.add('opacity-50', 'pointer-events-none');
            document.getElementById('notif').innerHTML =
                '<div class="bg-yellow-100 text-yellow-700 p-3 rounded mb-4">Please complete your biography first</div>';
        }
    });
</script>

@endsection
