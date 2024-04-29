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
                    <h4 class="col-md-6 fw-bold py-3 mb-4"><span class="text-muted fw-light">Fundraising /</span> Pending Fundraising </h4>

                    <!-- Basic Bootstrap Table -->
                    <div class="card">
                        <h5 class="card-header">Unverified Fundraising</h5>
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
                                    <th>Action</th>
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
                                        <td><span class="badge bg-label-primary me-1">Pending</span></td>
                                        <td>{{$cause->cause_tags}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{ route('unfund.verify', $cause) }}"
                                                    ><i class="bx bx-edit-alt me-1"></i> Verify</a
                                                    >
                                                    <a class="dropdown-item" href="{{route('unfund.reject', $cause)}}"
                                                    ><i class="bx bx-trash me-1"></i> Reject</a>
                                                </div>
                                            </div>
                                        </td>
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
                        document.getElementById('db_item_unfund').classList.add('active');

                    </script>
@endsection
