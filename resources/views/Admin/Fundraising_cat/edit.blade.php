@extends('layouts.admin')

@section("content")

<div class="p-4 md:p-6 bg-gray-100 min-h-screen text-gray-900">

    <!-- Title -->
    <h4 class="text-lg mb-6">
        <span class="text-gray-500">Fundraising / Category /</span>
        <span class="text-gray-900 font-semibold">Edit</span>
    </h4>

    <!-- Card -->
    <div class="max-w-3xl bg-white border border-gray-200 rounded-2xl shadow-sm mx-auto">

        <!-- Header -->
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h5 class="text-sm md:text-base font-medium">
                Editing:
                <span class="font-semibold text-gray-900">{{ $cause_cat->cat_name }}</span>
            </h5>
        </div>

        <!-- Form -->
        <div class="p-6">

            <form method="POST"
                  enctype="multipart/form-data"
                  action="{{ route('fund_cat.update', ['fund_cat' => $cause_cat]) }}"
                  class="space-y-5">

                @csrf
                @method('PATCH')

                <!-- Category Name -->
                <div>
                    <label class="block text-sm mb-1 text-gray-700">Category Name</label>
                    <input type="text"
                           name="cat_name"
                           value="{{ $cause_cat->cat_name }}"
                           required
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <!-- Category Icon -->
                <div>
                    <label class="block text-sm mb-1 text-gray-700">Category Icon</label>
                    <input type="text"
                           name="cat_icon"
                           value="{{ $cause_cat->cat_icon }}"
                           required
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <!-- Category Root -->
                <div>
                    <label class="block text-sm mb-1 text-gray-700">Category Root</label>
                    <select name="cat_root"
                            id="cat_root"
                            required
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">

                        <option value="0">Root</option>

                        @foreach($cat_root as $root)
                            @if($root->id != $cause_cat->id)
                                <option value="{{ $root->id }}">{{ $root->cat_name }}</option>
                            @endif
                        @endforeach

                    </select>
                </div>

                <!-- Hidden Fields -->
                <input type="hidden" value="FR" name="cat_cat">
                <input type="hidden" value="1" name="cat_is_featured">
                <input type="hidden" value="{{ date('Y/m/d H:i:s') }}" name="created_at">

                <!-- Submit -->
                <div class="pt-4">
                    <button type="submit"
                            class="px-5 py-2 bg-black hover:bg-gray-700 text-white rounded-lg text-sm shadow">
                        Save Changes
                    </button>
                </div>

            </form>

        </div>

    </div>

</div>

@endsection