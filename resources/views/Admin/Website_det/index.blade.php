@extends('layouts.admin')


@section("content")


    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <div class="content-wrapper">
                <!-- Content -->

                <div class="container-xxl flex-grow-1 container-p-y">
                    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Website Settings /</span> Website Detials</h4>

                    <div class="col-xxl">
                        <div class="card mb-4">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h5 class="mb-0"><strong>Website Details</strong></h5>
                                <small class="text-muted float-end">Default label</small>
                            </div>
                            <div class="card-body">
                                @foreach($webs as $web)
                                <form method="POST" enctype="multipart/form-data"  action="{{ route('web.update',['web' => $web]) }}">
                                    @csrf
                                    @method('PATCH')
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">Website Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="web_name" class="form-control" id="web_name" value="{{$web->web_name}}" required />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-company">Website Description</label>
                                        <div class="col-sm-10">
                                            <textarea
                                                    class="form-control"
                                                    id="desc"
                                                    name="web_description"
                                                    required
                                            >{{$web->web_description}}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-email">Website Logo</label>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-merge">
                                                <input
                                                        type="file"
                                                        id="imageURL"
                                                        class="form-control"
                                                        name="web_logo"
                                                        value="{{$web->web_logo}}"
                                                />
                                                {{--                                                <span class="input-group-text" id="basic-default-email2">Upload .jpg or .png only</span>--}}
                                            </div>
                                            <div class="form-text">Upload Proper size image and .jpg or .png format</div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">Website Address</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="web_address" class="form-control" id="addres" value="{{$web->web_address}}" required/>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">Website Contact</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="web_contact" class="form-control" id="contact" value="{{$web->web_contact}}" required/>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">Website Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" name="web_email" class="form-control" id="email" value="{{$web->web_email}}" required/>
                                        </div>
                                    </div>
                                    <div class="row justify-content-end">
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </form>
                                @endforeach
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
        document.getElementById('db_pitem_setting').classList.add('active');
        document.getElementById('db_item_detail').classList.add('active');

    </script>
@endsection
