@extends('layouts.app')
@section('header')
<title>Blogs | Tagheer</title>
@endsection

@section('content')

<!-- Breadcrumb / Search Header -->
<section class="relative bg-cover bg-center" style="background-image: url('{{ asset('images/bg_job.jpg') }}');">
    <div class="bg-black bg-opacity-40">
        <div class="container mx-auto py-20 px-4 text-center text-white">
            <h1 class="text-4xl font-bold mb-4">Blogs</h1>
            <form class="flex flex-col sm:flex-row justify-center items-center gap-2 mt-6">
                <input type="text" placeholder="Search Blogs" class="w-full sm:w-2/3 px-4 py-2 rounded-md text-black focus:outline-none">
                <button type="submit" class="w-full sm:w-auto bg-gray-800 hover:bg-gray-900 px-4 py-2 rounded-md text-white flex items-center justify-center gap-2">
                    <i class="fa fa-search"></i> Search
                </button>
            </form>
        </div>
    </div>
</section>

<!-- Blog Section -->
<section class="py-12 bg-gray-100">
    <div class="container mx-auto px-4 grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Blog List -->
        <div class="lg:col-span-2 space-y-6">
            @foreach($blogs as $blog)
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="h-64 bg-cover bg-center" style="background-image: url('{{ asset($blog->img) }}')"></div>
                <div class="p-6">
                    <h4 class="text-2xl font-semibold mb-3"><a href="Blogs/{{$blog->id}}" class="hover:text-green-600">{{ $blog->title }}</a></h4>

                    <!-- Blog Meta -->
                    <div class="flex flex-wrap items-center text-gray-600 text-sm mb-4 gap-4">
                        <div class="flex items-center gap-2">
                            <img src="{{ asset('images/jobs/avatar.jpg') }}" class="w-10 h-10 rounded-full">
                            {{ $blog->user->name }}
                        </div>
                        <div class="flex items-center gap-1">
                            <i class="fa fa-clock-o"></i>
                            {{ \Carbon\Carbon::parse($blog['publish_date'])->diffForHumans() }}
                        </div>
                        <div class="flex items-center gap-1">
                            <i class="fa fa-folder"></i>
                            {{ $blog->cat->cat_name }}
                        </div>
                        <div class="flex items-center gap-1">
                            <i class="fa fa-eye"></i>
                            {{ $blog->seenctr }}
                        </div>
                    </div>

                    <p class="text-gray-700 mb-4">{!! Str::limit($blog->content, 250) !!}</p>
                    <div class="text-right">
                        <button onclick="window.location.href='Blog/{{$blog->id}}'" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md flex items-center gap-2">
                            <i class="fa fa-arrow-right"></i> Read more
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-xl font-semibold mb-4">Categories</h3>
                <ul class="space-y-2 list-disc list-inside text-gray-700">
                    <li><a href="#" class="hover:underline">Refugees (12)</a></li>
                    <li><a href="#" class="hover:underline">Poverty (40)</a></li>
                    <li><a href="#" class="hover:underline">Medical (3)</a></li>
                    <li><a href="#" class="hover:underline">Bankruptcy (34)</a></li>
                    <li><a href="#" class="hover:underline">Disasters (50)</a></li>
                    <li><a href="#" class="hover:underline">Political (5)</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="bg-gray-900 text-white py-12">
    <div class="container mx-auto px-4 flex flex-col lg:flex-row items-center justify-between gap-6">
        <div class="space-y-2">
            <h2 class="text-3xl     font-bold">Post a Job Now</h2>
            <p>If you're hiring, you can post your vacancy now!</p>
        </div>
        <button class="bg-white text-gray-900 px-6 py-3 rounded-md font-semibold hover:bg-gray-200 flex items-center gap-2">
            <i class="fa fa-arrow-right"></i> Post Now
        </button>
    </div>
</section>

@endsection