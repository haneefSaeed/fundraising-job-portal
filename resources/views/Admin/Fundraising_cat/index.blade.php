@extends('layouts.admin')

@section("content")

<div class="p-4 md:p-6 bg-gray-100 min-h-screen text-gray-900">

    <!-- Header Row -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4 gap-3">

        <h4 class="text-lg">
            <span class="text-gray-500">Fundraising /</span>
            <span class="text-gray-900 font-semibold">Categories</span>
        </h4>

        <a href="{{ route('fund_cat.create') }}"
            class="inline-flex justify-center items-center px-4 py-2 bg-black hover:bg-gray-700 text-white text-sm rounded-lg shadow">
            + Add New
        </a>

    </div>

    <!-- Card -->
    <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">

        <!-- Header -->
        <div class="px-5 py-4 border-b border-gray-200 text-sm font-medium text-gray-700">
            Fundraising Category
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">

            <table id="catTable" class="min-w-full text-sm text-left">

                <!-- Head -->
                <thead class="bg-gray-100 text-gray-600 uppercase text-xs tracking-wider">
                    <tr>
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Category Type</th>
                        <th class="px-4 py-3">Icon</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>

                <!-- Body -->
                <tbody class="divide-y divide-gray-200">

                    @foreach($cause_cats as $cause_cat)
                    <tr class="hover:bg-gray-50 transition">

                        <td class="px-4 py-3 text-gray-700">
                            {{ $cause_cat->id }}
                        </td>

                        <td class="px-4 py-3 font-medium text-gray-900">
                            {{ $cause_cat->cat_name }}
                        </td>

                        <td class="px-4 py-3 text-gray-700">
                            @if($cause_cat->cat_root == 0)
                            ROOT
                            @else
                            {{ $cause_cat->cat_root }}
                            @endif
                        </td>

                        <td class="px-4 py-3 text-gray-700">
                            <i class="fa fa-{!! $cause_cat->cat_icon !!} text-xl"></i>
                        </td>

                        <!-- Actions -->
                        <td class="px-4 py-3 flex gap-2">

                            <!-- Edit -->
                            <a href="{{ route('fund_cat.edit', ['fund_cat' => $cause_cat]) }}"
                                class="px-3 py-1 text-xs rounded-md bg-blue-100 text-blue-700 hover:bg-blue-200 transition">
                                Edit
                            </a>

                            <!-- Delete -->
                            <a href="/admin/fund_cat/destroy/{{ $cause_cat->id }}"
                                class="px-3 py-1 text-xs rounded-md bg-red-100 text-red-700 hover:bg-red-200 transition deleteConfirm">
                                Delete
                            </a>

                        </td>
                    </tr>
                    @endforeach

                </tbody>

            </table>

        </div>
    </div>

</div>

@endsection