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
                    <div class="row">
                        <h4 class="col-md-6 fw-bold py-3 mb-4"><span class="text-muted fw-light">User /</span> Employee</h4>
                        <a class="col-md-2 offset-md-4 mt-2" href="{{route('emp.create')}}"><button type="submit" style="height: 50px" class="btn btn-outline-primary">Register</button></a>
                    </div>

                    <!-- Basic Bootstrap Table -->
                    <div class="card">
                        <h5 class="card-header">All Employees</h5>
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Created at</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                @foreach($employees as $employee)
                                    <tr>
                                        <td>{{$employee->id}}</td>
                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$employee->name}}</strong></td>
                                        <td>{{$employee->email}}</td>
                                        <td>
                                            @if($employee->is_disable == 0)
                                                <span class="badge bg-label-primary me-1">Active</span>
                                            @else
                                                <span class="badge bg-label-danger me-1">Disable</span>
                                            @endif
                                        </td>
                                        <td>{{$employee->created_at}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{route('emp.edit', ['emp'=>$employee])}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                                    <a class="dropdown-item deleteConfirm" href="/admin/emp/destroy/{{$employee->id}}"
                                                    ><i class="bx bx-trash me-1"></i> Delete</a>
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
            </div>
        </div>
    </div>

@endsection

@section('footer')
    <script>
        document.getElementById('db_item_employee').classList.add('active');
    </script>
    <script>
        $('.deleteConfirm').on('click', function (event) {
            event.preventDefault();
            const url = $(this).attr('href');
            swal({
                title: 'Are you sure?',
                text: 'You are about to Delete this Employee!',
                icon: 'warning',
                buttons: ["Cancel", "Delete!"],
            }).then(function(value) {
                if (value) {
                    window.location.href = url;
                }
            });
        });

    </script>
@endsection
