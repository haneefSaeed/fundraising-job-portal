@extends('layouts.app')
@section('header')
<title>Cause RaiseBridge</title>


<!-- Styles -->

<style>
    .blog-container {
        background: #fff;
        border-radius: 2px;
        box-shadow: rgba(0, 0, 0, 0.2) 0 4px 2px -2px;
        font-weight: 100;
        width: 100%;
    }

    .blog-container:hover {
        box-shadow: rgba(0, 0, 0, 0.2) 0 5px 5px 2px;
        transition: 0.3s ease-in-out;
    }

    @media screen and (min-width: 480px) {
        .blog-container {
            width: 28rem;
        }
    }

    @media screen and (min-width: 767px) {
        .blog-container {
            width: 40rem;
        }
    }

    @media screen and (min-width: 959px) {
        .blog-container {
            width: 50rem;
        }
    }

    .blog-container a {
        color: #333;
        text-decoration: none;
        transition: 0.25s ease;
    }

    .blog-container a:hover {
        border-color: #777;
        color: #777;
    }

    .blog-cover {
        border-radius: 2px 2px 0 0;
        height: 14rem;
        margin-bottom: 20px;
        box-shadow: inset rgba(0, 0, 0, 0.2) 0 64px 64px 16px;

    }


    .blog-body {
        margin: 0 auto;
        width: 92%;
    }


    .blog-title h2 a {
        color: #222;
    }

    .blog-summary p {
        color: #4d4d4d;
    }

    .blog-tags ul {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        list-style: none;
        padding-left: 0;
    }

    .blog-tags li+li {
        margin-left: 0.5rem;
    }

    .blog-tags a {
        border: 1px solid #999999;
        border-radius: 3px;
        color: #999999;
        height: 1.5rem;
        line-height: 1.5rem;
        letter-spacing: 1px;
        padding: 0 0.5rem;
        text-align: center;
        text-transform: uppercase;
        white-space: nowrap;
        width: 5rem;
    }
</style>

@endsection


@section('content')
<section id="breadcrumbs">

    <div class="py-10 px-10 md:px-36  bg-white">
        <div class="flex justify-between mb-4">
            <div class="flex flex-col mb-4">
                <h1 class="font-montserrat text-3xl font-semibold ">Find Causes</h1>
                <h1 class="font-montserrat  ">All causes are equal but you find out the right one</h1>
            </div>
            <h1>
                <h5>You are here / <a href="#" class="nounderline">home </a> / <a href="#" class="nounderline">causes</a> </h5>
            </h1>
        </div>


    </div>
    <div class="flex justify-start items-center px-10 md:px-[10%]">
        <div class="bg-white p-3 w-fit gap-2 z-100 rounded-lg">

            <form method="GET" action="{{ route('c.search') }}" class="flex gap-2 justify-between">

                <!-- Keyword input -->
                <input type="text" class=" bg-gray-100 border-0 rounded-full placeholder:text-gray-400   text-black" name="keyword" placeholder="Keyword"
                    value="{{ request('keyword') }}">

                <!-- Category select -->
                <select id="category" name="category" class="bg-gray-100 border-0 rounded-full placeholder:text-gray-400   text-black">
                    <option value="">Select Category</option>
                    @foreach($cats as $cat)
                    <option value="{{ $cat->cat_name }}" {{ request('category') == $cat->cat_name ? 'selected' : '' }}>
                        {{ $cat->cat_name }}
                    </option>
                    @endforeach
                </select>

                <!-- Minimum Goal input -->
                <input type="number" class="bg-gray-100 border-0 rounded-full placeholder:text-gray-400   text-black" name="mingoal" placeholder="MinGoal"
                    value="{{ request('mingoal') }}">

                <!-- Location input -->
                <input type="text" class="bg-gray-100 border-0 rounded-full placeholder:text-gray-400   text-black" name="location" placeholder="Location"
                    value="{{ request('location') }}">

                <div class="input-group justify-content-center">
                    <button type="submit" class="bg-gray-500 border-0 rounded-full h-full px-2 text-white">
                        <i class="fa fa-search"></i> Search
                    </button>
                    <button type="button" class="bg-red-500 border-0 rounded-full  h-full px-2 text-white">
                        <a href="{{ route('causes') }}" class=" h-full px-1">
                            Reset
                        </a>

                    </button>
                </div>

            </form>

        </div>
    </div>
</section>

<section id="causeDetail" class="py-10">
    <div class="container mx-auto px-10 md:px-[10%]">

        <!-- Display search info -->
        @if(request()->filled('keyword') || request()->filled('category') || request()->filled('mingoal') || request()->filled('location'))
        <div class="mb-4 text-gray-700">
            You searched:
            @if(request('keyword')) "<span class="font-semibold">{{ request('keyword') }}</span>" @endif
            @if(request('category')) in category "<span class="font-semibold">{{ request('category') }}</span>" @endif
            @if(request('mingoal')) with minimum goal "<span class="font-semibold">${{ request('mingoal') }}</span>" @endif
            @if(request('location')) located in "<span class="font-semibold">{{ request('location') }}</span>" @endif
        </div>

        <!-- Sort Buttons -->
        <div class="mb-4 flex space-x-2">
            @php
            $query = request()->only(['keyword', 'category', 'mingoal', 'location']);
            @endphp

            <a href="{{ route('c.search', array_merge($query, ['sort' => 'newest'])) }}"
                class="px-3 py-1 bg-gray-200 rounded">Newest</a>
            <a href="{{ route('c.search', array_merge($query, ['sort' => 'oldest'])) }}"
                class="px-3 py-1 bg-gray-200 rounded">Oldest</a>
            <a href="{{ route('c.search', array_merge($query, ['sort' => 'highgoal'])) }}"
                class="px-3 py-1 bg-gray-200 rounded">High Goal</a>
            <a href="{{ route('c.search', array_merge($query, ['sort' => 'lowgoal'])) }}"
                class="px-3 py-1 bg-gray-200 rounded">Low Goal</a>
        </div>

        @endif


        <div class="flex flex-col lg:flex-row gap-6">
            <!-- Main causes section -->
            <div class="flex-1">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($causes as $cause)
                    @if($cause->cause_status == 1)
                    <div onclick="window.location.href='{{ route('c.show', $cause->id) }}'"
                        class="bg-white rounded-lg shadow hover:shadow-lg cursor-pointer transition duration-300">

                        <!-- Cover Image -->
                        <div class="h-56 rounded-t-lg bg-cover bg-center"
                            style="background-image: url('{{ asset($cause->cause_img) }}');">
                        </div>

                        <!-- Body -->
                        <div class="p-4">
                            <h4 class="text-lg font-semibold mb-2">{{ $cause->cause_title }}</h4>

                            <!-- Profile and time -->
                            <div class="flex justify-between items-center mb-3">
                                <div class="flex items-center space-x-2">
                                    <img src="{{ asset($cause->fr_profile->user->avatar) }}"
                                        alt="avatar" class="w-6 h-6 rounded-full">
                                    @if($cause->fr_profile->is_company == 0)
                                    <h5 class="text-sm font-medium">{{ $cause->fr_profile->user->name }}</h5>
                                    @else
                                    <h5 class="text-sm font-medium">
                                        <a href="dp/{{ $cause->fr_profile->company_profile->id }}">
                                            {{ Str::limit($cause->fr_profile->company_profile->name, 22) }}
                                        </a>
                                    </h5>
                                    @endif
                                </div>
                                <div class="text-sm flex items-center space-x-1">
                                    <i class="fa fa-clock-o"></i>
                                    <span>{{ \Carbon\Carbon::parse($cause['cause_start_date'])->diffForHumans() }}</span>
                                </div>
                            </div>

                            <!-- Donation Progress -->
                            @php
                            $raised = \App\Models\donations::where('cause_id', $cause->id)->sum('amount');
                            $donors = \App\Models\donations::where('cause_id', $cause->id)->count();

                            $progress = $cause->cause_goal > 0
                            ? ($raised / $cause->cause_goal) * 100
                            : 0;

                            // Prevent overflow
                            $progress = min($progress, 100);
                            @endphp
                            <div class="bg-gray-200 rounded h-4 mb-2">
                                <div class="bg-gray-500 h-4 rounded" style="width: {{ $progress }}%"></div>
                            </div>

                            <div class="flex justify-between text-xs font-medium mb-2">
                                <div>Raised: ${{ $raised }}</div>
                                <div>Donors: {{ \App\Models\donations::where('cause_id', $cause->id)->count() }}</div>
                                <div>Goal: ${{ number_format($cause->cause_goal) }}</div>
                            </div>

                            <p class="text-gray-700 mb-3">
                                {{ Str::limit(strip_tags($cause->cause_description), 100) }}
                            </p>


                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-6 flex justify-center">
                    {!! $causes->onEachSide(6)->links('pagination::tailwind') !!}
                </div>
            </div>

            <!-- Sidebar -->
            <div class="w-full lg:w-1/4 space-y-6">
                <!-- Categories -->
                <div class="bg-white p-4 rounded shadow">
                    <h3 class="text-lg font-semibold mb-3">Categories</h3>
                    <div class="flex flex-wrap gap-2 ">


                        @foreach($cats as $cat)
                        @if($cat->cat_root_id == 0)

                        <a href="{{ route('c.search', ['category' => $cat->cat_name]) }}"
                            class="bg-gray-200 rounded-full text-xs font-semibold font-montserrat p-2 hover:bg-gray-300  text-black hover:underline {{ request('category') == $cat->cat_name ? 'bg-gray-300 text-black' : '' }}">
                            {{ $cat->cat_name }} ({{ App\Models\causes::where('cause_cat_id', $cat->id)->count() }})
                        </a>


                        @endif
                        @endforeach
                        <div class="flex justify-center items-center">
                            @if(request('category')) <a href="{{route('causes')}}" class="flex justify-center items-center rounded-full text-[4pt] font-semibold bg-gray-300 w-5 h-5"><i class="fa-solid fa-x"></i></a>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Top Contributors -->
                <!-- <div class="bg-white p-4 rounded shadow text-center">
                    <h3 class="text-lg font-semibold mb-3">Top Contributors</h3>
                    <table class="table-auto w-full text-sm font-semibold">
                        <thead>
                            <tr>
                                <th class="px-2 py-1">Name</th>
                                <th class="px-2 py-1">Donation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1. Hanif</td>
                                <td>$2000</td>
                            </tr>
                            <tr>
                                <td>2. James Bond</td>
                                <td>$1800</td>
                            </tr>
                            <tr>
                                <td>3. King Bond</td>
                                <td>$1500</td>
                            </tr>
                            <tr>
                                <td>4. Juni</td>
                                <td>$1000</td>
                            </tr>
                            <tr>
                                <td>5. Fandi</td>
                                <td>$800</td>
                            </tr>
                        </tbody>
                    </table>
                </div> -->
            </div>
        </div>
    </div>
</section>




@endsection

@section('footer_scripts')
<section id="modelsdefbm">
    <div class="modal-donation fade" id="DonationModel" tabindex="-1" aria-labelledby="DonateModel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="DonateModel">Contribute Now</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5>Help Afghan Refugees</h5>
                    <p class="font-s text-justify">
                        Suspendisse potenti. Ut non tempus justo. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                    </p>
                    <h5>Please select an Amount you wish to donate:</h5>

                    <form class="row g-3 justify-center mb-2">
                        <div class="col-auto">
                            <button class="btn btn-warning" style="font-weight: 600;">$ 1</button>
                            <button class="btn btn-warning" style="font-weight: 600;">$ 5</button>
                            <button class="btn btn-warning" style="font-weight: 600;">$ 10</button>
                            <button class="btn btn-warning" style="font-weight: 600;">$ 20</button>
                        </div>
                        <div class="col-auto">
                            <input type="text" class="form-control" style="width: 80px; " placeholder="other..">
                        </div>
                    </form>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success">Proceed</button>
                    </div>
                </div>
            </div>
        </div>


</section>



@endsection