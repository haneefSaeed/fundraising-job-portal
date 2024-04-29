@extends('layouts.admin')


@section("content")


    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <div class="content-wrapper">
                <!-- Content -->

                <div class="container-xxl flex-grow-1 container-p-y">
                    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin Profile /</span> Edit</h4>

                    <div class="col-xxl">
                        <div class="card mb-4">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h5 class="mb-0">Editing<strong>{{Auth::guard('admin')->user()->name}}</strong></h5>
                                <small class="text-muted float-end">Default label</small>
                            </div>
                            <div class="card-body">
                                    <form method="POST" enctype="multipart/form-data"  action="{{ route('profile.update',['profile' => Auth::guard('admin')->user()]) }}">
                                        @csrf
                                        @method('PATCH')
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-name">User Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="name" class="form-control" id="name" value="{{Auth::guard('admin')->user()->name}}" required />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-name">User Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" name="email" class="form-control" id="email" value="{{Auth::guard('admin')->user()->email}}" required />
                                            </div>
                                        </div>

                                        <!-- Validation Errors -->
                                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                                        <div class="row justify-content-end">
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- / Content -->

@endsection

@section('footer')
    <script>
        document.getElementById('db_item_dashboard').classList.add('active');
    </script>
@endsection
