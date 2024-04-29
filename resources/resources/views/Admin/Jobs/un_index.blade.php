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
                    <h4 class="col-md-6 fw-bold py-3 mb-4"><span class="text-muted fw-light">Jobs /</span> Pending Posted Jobs </h4>

                    <!-- Basic Bootstrap Table -->
                    <div class="card">
                        <h5 class="card-header">Pending Jobs</h5>
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Location</th>
                                    <th>Gender</th>
                                    <th>Company</th>
                                    <th>Education</th>
                                    <th>Experience</th>
                                    <th>Category</th>
                                    <th>Type</th>
                                    <th>Closing Date</th>
                                    <th>Status</th>
                                    <th>Tags</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                @foreach($jobs as $job)
                                    <tr>
                                        <td>{{$job->id}}</td>
                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$job->title}}</strong></td>
                                        <td>{{substr($job->small_description, 0, 50)}}</td>
                                        <td><img width="50px" height="30px" src="{{asset($job->img)}}"> </td>
                                        <td>{{$job->location}}</td>
                                        <td>{{$job->pref_gender}}</td>
                                        <td>{{$job->company_profile->name}}</td>
                                        <td>{{$job->edu_level->detail}}</td>
                                        <td>{{$job->exp_level->detail}}</td>
                                        <td>{{$job->category->cat_name}}</td>
                                        <td>{{$job->emp_type->detail}}</td>
                                        <td>{{$job->closing_date}}</td>
                                        <td>
                                                <span class="badge bg-label-primary me-1">Pending</span>
                                        </td>
                                        <td>{{$job->tags}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{ route('unjobs.verify', $job) }}"
                                                    ><i class="bx bx-edit-alt me-1"></i> Verify</a
                                                    >
                                                    <a class="dropdown-item" href="{{route('unjobs.reject', $job)}}"
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
                        document.getElementById('db_pitem_jobs').classList.add('active');
                        document.getElementById('db_item_unjobs').classList.add('active');

                    </script>
@endsection
