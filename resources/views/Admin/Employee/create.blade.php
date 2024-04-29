@extends('layouts.admin')


@section("content")


    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <div class="content-wrapper">
                <!-- Content -->

                <div class="container-xxl flex-grow-1 container-p-y">
                    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User /</span> Employee / Create</h4>

                    <div class="col-xxl">
                        <div class="card mb-4">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h5 class="mb-0">Adding: <strong>New Employeee</strong></h5>
                                <small class="text-muted float-end">Default label</small>
                            </div>
                            <div class="card-body">
                                <form method="POST" enctype="multipart/form-data"  action="{{route('emp.store')}}">
                                    @csrf
                                    <div class="row mb-3">
                                        <x-label class="col-sm-2 col-form-label" for="name" :value="__('Name')" />

                                        <div class="col-sm-10">
                                            <x-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <x-label class="col-sm-2 col-form-label" for="email" :value="__('Email')" />
                                        <div class="col-sm-10">
                                            <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <x-label class="col-sm-2 col-form-label" for="password" :value="__('Password')" />
                                        <div class="col-sm-10">
                                            <x-input id="password" class="form-control"
                                                     type="password"
                                                     name="password"
                                                     required autocomplete="new-password" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <x-label class="col-sm-2 col-form-label" for="password_confirmation" :value="__('Confirm Password')" />
                                        <div class="col-sm-10">
                                            <x-input id="password_confirmation" class="form-control"
                                                     type="password"
                                                     name="password_confirmation" required />
                                        </div>
                                        <p id="passwordHelpBlock" class="form-text text-muted" style="margin-left: 20%">
                                            Your password must be more than 8 characters long,<br> should contain at-least 1 Uppercase, 1 Lowercase, <br> 1 Numeric and 1 special character (#?!@$_%^&*-).
                                        </p>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-phone">Status</label>
                                        <div class="col-sm-10 exp">
                                            <select name="is_disable" id="is_disable" class="form-control" required>
                                                <option value="0">Active</option>
                                                <option value="1">Disable</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Validation Errors -->
                                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                    <input type="hidden" value="{{date("Y/m/d H:i:s")}}" name="created_at" id="created_at">
                                    <input type="hidden" value="1" name="is_emp" id="is_emp">

                                    <div class="row justify-content-end">
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary">Add</button>
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
        document.getElementById('db_item_employee').classList.add('active');


    </script>
@endsection
