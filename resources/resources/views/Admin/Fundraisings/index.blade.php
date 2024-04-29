@extends('layouts.admin')


@section("content")


    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->


            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->

                <div class="container-xxl flex-grow-1 container-p-y">
                    <h4 class="col-md-6 fw-bold py-3 mb-4"><span class="text-muted fw-light">Fundraisings /</span> All Fundraisings </h4>

                    <!-- Basic Bootstrap Table -->
                    <div class="card">
                        <h5 class="card-header">All Fundraising</h5>
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Fundraiser</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th>Location</th>
                                    <th>Goal</th>
                                    <th>Status</th>
                                    <th>Tags</th>
                                </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                @foreach($causes as $cause)
                                    <tr>
                                        <td>{{$cause->id}}</td>
                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$cause->cause_title}}</strong></td>
                                        <td>{{substr($cause->cause_description, 0, 50)}}</td>
                                        <td>{{$cause->fr_profile->user->name}}</td>
                                        <td>{{$cause->category->cat_name}}</td>
                                        <td><img width="50px" height="30px" src="{{asset($cause->cause_img)}}"> </td>
                                        <td>{{$cause->cause_location}}</td>
                                        <td>{{$cause->cause_goal}}</td>
                                        <td>
                                            @if($cause->cause_status == 0)
                                                <span class="badge bg-label-primary me-1">Pending</span>
                                            @elseif($cause->cause_status == 1)
                                                <span class="badge bg-label-success me-1">Varified</span>
                                            @else
                                                <span class="badge bg-label-danger me-1">Rejected</span>
                                            @endif
                                        </td>
                                        <td>{{$cause->cause_tags}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--/ Basic Bootstrap Table -->

                </div>
                <!-- / Content -->

                @endsection

                @section('footer')
                    <script>
                        document.getElementById('db_pitem_funds').classList.add('active');
                        document.getElementById('db_item_allfund').classList.add('active');

                    </script>
@endsection
