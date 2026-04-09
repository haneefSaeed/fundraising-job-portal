<div class="tab-content" id="myTabContent">

    <div x-data="{ activeTab: 'career' }" class="space-y-6">

        <h3 class="text-2xl font-semibold">Professional Information</h3>

        <!-- Tabs Buttons -->
        <div class="flex space-x-2 border-b border-gray-300">
            <button
                @click="activeTab = 'career'"
                :class="activeTab === 'career' ? 'border-b-2 border-red-600 text-red-600' : 'text-gray-600'"
                class="py-2 px-4 font-medium">
                Career Information
            </button>
            <button
                @click="activeTab = 'company'"
                :class="activeTab === 'company' ? 'border-b-2 border-red-600 text-red-600' : 'text-gray-600'"
                class="py-2 px-4 font-medium">
                Company Information
            </button>
        </div>

        <!-- Career Tab Content -->
        <div x-show="activeTab === 'career'" x-transition class="mt-6 space-y-6">

            @if(App\Models\prof_profile::where('user_id', '=', Auth()->user()->id)->count() != 1)
            <div class="bg-blue-100 text-blue-800 p-4 rounded-md">Please complete your profile before applying for a job</div>
            @endif

            <form method="post" enctype="multipart/form-data" action="{{ $profProfile ? route('p.update', $profProfile->id) : route('p.store') }}" class="space-y-4">
                @csrf
                @if($profProfile)
                @method('PUT')
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label>Career Level</label>
                        <select name="career_id" class="mt-1 block w-full border-gray-300 rounded-md">
                            <option selected disabled>Select</option>
                            @foreach($careers as $car)
                            <option value="{{ $car->id }}" {{ $profProfile && $profProfile->career_id == $car->id ? 'selected' : '' }}>{{ $car->level }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label>Current Address</label>
                        <input type="text" name="location" class="mt-1 block w-full border-gray-300 rounded-md" value="{{ $profProfile->location ?? '' }}">
                    </div>

                    <div>
                        <label>Current Position</label>
                        <input type="text" name="current_position" class="mt-1 block w-full border-gray-300 rounded-md" value="{{ $profProfile->current_position ?? '' }}">
                    </div>

                    <div>
                        <label>Current Company</label>
                        <input type="text" name="current_company" class="mt-1 block w-full border-gray-300 rounded-md" value="{{ $profProfile->current_company ?? '' }}">
                    </div>

                    <div>
                        <label>Total Experience (years)</label>
                        <input type="number" name="total_exp" class="mt-1 block w-full border-gray-300 rounded-md" value="{{ $profProfile->total_exp ?? '' }}">
                    </div>

                    <div>
                        <label>Education Level</label>
                        <select name="edu_id" class="mt-1 block w-full border-gray-300 rounded-md">
                            <option selected disabled>Select</option>
                            @foreach($edu_levels as $elvl)
                            <option value="{{ $elvl->id }}" {{ $profProfile && $profProfile->edu_id == $elvl->id ? 'selected' : '' }}>{{ $elvl->detail }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label>Statement</label>
                        <textarea name="statement" class="mt-1 block w-full border-gray-300 rounded-md">{{ $profProfile->statement ?? '' }}</textarea>
                    </div>

                    <div>
                        <label>Your CV</label>
                        <input type="file" name="cv" class="mt-1 block w-full border-gray-300 rounded-md">
                        @if($profProfile && $profProfile->cv)
                        <p class="text-sm text-gray-600">Uploaded: {{ basename($profProfile->cv) }}</p>
                        @endif
                    </div>

                    <div>
                        <label>Cover Letter</label>
                        <input type="file" name="cl" class="mt-1 block w-full border-gray-300 rounded-md">
                        @if($profProfile && $profProfile->cl)
                        <p class="text-sm text-gray-600">Uploaded: {{ basename($profProfile->cl) }}</p>
                        @endif
                    </div>

                    <div>
                        <label>Other Documents</label>
                        <input type="file" name="other_doc" class="mt-1 block w-full border-gray-300 rounded-md">
                        @if($profProfile && $profProfile->other_doc)
                        <p class="text-sm text-gray-600">Uploaded: {{ basename($profProfile->other_doc) }}</p>
                        @endif
                    </div>

                </div>

                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded-md mt-4">Save Changes</button>
            </form>

        </div>
        <!-- Company Tab Content -->
        <div x-show="activeTab === 'company'" x-transition class="mt-6 space-y-6">

            @if(App\Models\company_profile::where('user_id', '=', Auth()->user()->id)->count() != 1)
            <form method="post" enctype="multipart/form-data" action="{{route('p.store')}}" class="space-y-4">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <!-- Company Name -->
                    <div>
                        <label class="block font-medium">Company Name</label>
                        <input type="text" name="name" placeholder="Ex: Orbit Technology" class="mt-1 block w-full border-gray-300 rounded-md">
                        @if($errors->has('name'))
                        <div class="text-red-600 text-sm mt-1">{{$errors->first('name')}}</div>
                        @endif
                    </div>

                    <!-- Company Size -->
                    <div>
                        <label class="block font-medium">Company Size</label>
                        <select class="mt-1 block w-full border-gray-300 rounded-md" name="comp_size_id">
                            <option selected>Select</option>
                            @foreach($compsizes as $size)
                            <option value="{{$size->id}}">{{$size->range}}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Company Email -->
                    <div>
                        <label class="block font-medium">Company Email</label>
                        <input type="text" name="email" placeholder="Ex: info@company.com" class="mt-1 block w-full border-gray-300 rounded-md">
                        @if($errors->has('email'))
                        <div class="text-red-600 text-sm mt-1">{{$errors->first('email')}}</div>
                        @endif
                    </div>

                    <!-- Industry -->
                    <div>
                        <label class="block font-medium">Industry</label>
                        <input type="text" name="industry" placeholder="Ex: Manufacturing" class="mt-1 block w-full border-gray-300 rounded-md">
                        @if($errors->has('industry'))
                        <div class="text-red-600 text-sm mt-1">{{$errors->first('industry')}}</div>
                        @endif
                    </div>

                    <!-- Website -->
                    <div>
                        <label class="block font-medium">Website</label>
                        <input type="text" name="website" placeholder="Ex: www.company.com" class="mt-1 block w-full border-gray-300 rounded-md">
                    </div>

                    <!-- Contact Number -->
                    <div>
                        <label class="block font-medium">Contact Number</label>
                        <input type="number" name="phone" placeholder="Ex: 079000000" class="mt-1 block w-full border-gray-300 rounded-md">
                    </div>

                    <!-- Address -->
                    <div class="md:col-span-2">
                        <label class="block font-medium">Address</label>
                        <input type="text" name="address" class="mt-1 block w-full border-gray-300 rounded-md">
                    </div>

                    <!-- Social Links -->
                    <div>
                        <label class="block font-medium">Facebook Link</label>
                        <input type="text" name="facebook" class="mt-1 block w-full border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label class="block font-medium">Instagram Link</label>
                        <input type="text" name="instagram" class="mt-1 block w-full border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label class="block font-medium">LinkedIn Link</label>
                        <input type="text" name="linkedin" class="mt-1 block w-full border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label class="block font-medium">Twitter Link</label>
                        <input type="text" name="twitter" class="mt-1 block w-full border-gray-300 rounded-md">
                    </div>

                    <!-- Company Bio -->
                    <div class="md:col-span-2">
                        <label class="block font-medium">Company Bio</label>
                        <textarea name="statement" class="mt-1 block w-full border-gray-300 rounded-md"></textarea>
                        @if($errors->has('statement'))
                        <div class="text-red-600 text-sm mt-1">{{$errors->first('statement')}}</div>
                        @endif
                    </div>

                </div>

                <input type="hidden" name="user_id" value="{{Auth()->user()->id}}">
                <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded-md mt-4 flex items-center gap-2">
                    <i class="fa fa-floppy-o"></i> Save Changes
                </button>
            </form>
            @else
            <form method="post" enctype="multipart/form-data" action="{{route('p.update', $cprof->id)}}" class="space-y-4">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div>
                        <label class="block font-medium">Company Name</label>
                        <input type="text" name="name" value="{{$cprof->name}}" placeholder="Ex: Orbit Technology" class="mt-1 block w-full border-gray-300 rounded-md">
                        @if($errors->has('name'))
                        <div class="text-red-600 text-sm mt-1">{{$errors->first('name')}}</div>
                        @endif
                    </div>

                    <div>
                        <label class="block font-medium">Company Size</label>
                        <select class="mt-1 block w-full border-gray-300 rounded-md" name="comp_size_id">
                            <option selected value="{{$cprof->comp_size_id}}">{{$cprof->comp_size->range}}</option>
                            @foreach($compsizes as $size)
                            <option value="{{$size->id}}">{{$size->range}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block font-medium">Company Email</label>
                        <input type="text" name="email" value="{{$cprof->email}}" placeholder="Ex: info@company.com" class="mt-1 block w-full border-gray-300 rounded-md">
                        @if($errors->has('email'))
                        <div class="text-red-600 text-sm mt-1">{{$errors->first('email')}}</div>
                        @endif
                    </div>

                    <div>
                        <label class="block font-medium">Industry</label>
                        <input type="text" name="industry" value="{{$cprof->industry}}" placeholder="Ex: Manufacturing" class="mt-1 block w-full border-gray-300 rounded-md">
                        @if($errors->has('industry'))
                        <div class="text-red-600 text-sm mt-1">{{$errors->first('industry')}}</div>
                        @endif
                    </div>

                    <div>
                        <label class="block font-medium">Website</label>
                        <input type="text" name="website" value="{{$cprof->website}}" placeholder="Ex: www.company.com" class="mt-1 block w-full border-gray-300 rounded-md">
                    </div>

                    <div>
                        <label class="block font-medium">Contact Number</label>
                        <input type="number" name="phone" value="{{$cprof->phone}}" placeholder="Ex: 079000000" class="mt-1 block w-full border-gray-300 rounded-md">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block font-medium">Address</label>
                        <input type="text" name="address" value="{{$cprof->address}}" class="mt-1 block w-full border-gray-300 rounded-md">
                    </div>

                    <div>
                        <label class="block font-medium">Facebook Link</label>
                        <input type="text" name="facebook" value="{{$cprof->facebook}}" class="mt-1 block w-full border-gray-300 rounded-md">
                    </div>

                    <div>
                        <label class="block font-medium">Instagram Link</label>
                        <input type="text" name="instagram" value="{{$cprof->instagram}}" class="mt-1 block w-full border-gray-300 rounded-md">
                    </div>

                    <div>
                        <label class="block font-medium">LinkedIn Link</label>
                        <input type="text" name="linkedin" value="{{$cprof->linkedin}}" class="mt-1 block w-full border-gray-300 rounded-md">
                    </div>

                    <div>
                        <label class="block font-medium">Twitter Link</label>
                        <input type="text" name="twitter" value="{{$cprof->twitter}}" class="mt-1 block w-full border-gray-300 rounded-md">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block font-medium">Company Bio</label>
                        <textarea name="statement" class="mt-1 block w-full border-gray-300 rounded-md">{{$cprof->statement}}</textarea>
                        @if($errors->has('statement'))
                        <div class="text-red-600 text-sm mt-1">{{$errors->first('statement')}}</div>
                        @endif
                    </div>

                </div>

                <input type="hidden" name="user_id" value="{{Auth()->user()->id}}">
                <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded-md mt-4 flex items-center gap-2">
                    <i class="fa fa-floppy-o"></i> Update
                </button>
            </form>
            @endif

        </div>
    </div>


</div>