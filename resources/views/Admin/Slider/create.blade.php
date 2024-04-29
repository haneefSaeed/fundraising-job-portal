@extends('layouts.admin')


@section("content")


    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <div class="content-wrapper">
                <!-- Content -->

                <div class="container-xxl flex-grow-1 container-p-y">
                    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page Settings /</span> Slider / Create</h4>

                    <div class="col-xxl">
                        <div class="card mb-4">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h5 class="mb-0">Adding: <strong>New Slider</strong></h5>
                                <small class="text-muted float-end">Default label</small>
                            </div>
                            <div class="card-body">
                                <form method="POST" enctype="multipart/form-data"  action="{{route('slider.store')}}">
                                    @csrf
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">Slider Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="sdr_title" class="form-control" id="slider_title" value="" required/>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-company">Slider Description</label>
                                        <div class="col-sm-10">
                                            <input
                                                    required
                                                    type="text"
                                                    class="form-control"
                                                    id="slider_description"
                                                    name="sdr_description"
                                                    value=""

                                            />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-email">Image</label>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-merge">
                                                <input
                                                        required
                                                        type="file"
                                                        id="imageURL"
                                                        class="form-control"
                                                        name="sdr_imageURL"
                                                        value=""
                                                />
                                                {{--                                                <span class="input-group-text" id="basic-default-email2">Upload .jpg or .png only</span>--}}
                                            </div>
                                            <div class="form-text">Upload Proper size image and .jpg or .png format</div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-phone">Status</label>
                                        <div class="col-sm-10">
                                            <select name="sdr_isPublished" id="isPublished" class="form-control" required>
                                                <option value="0">unpublish</option>
                                                <option value="1">Publish</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-phone">Align</label>
                                        <div class="col-sm-10">
                                            <select name="sdr_align" id="sdr_align" class="form-control" required>
                                                <option value="left">Left</option>
                                                <option value="right">Right</option>
                                                <option value="center">Center</option>
                                            </select>

                                        </div>
                                    </div>

                                    <input type="hidden" value="{{date("Y/m/d H:i:s")}}" name="created_at" id="created_at">

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
        document.getElementById('db_pitem_setting').classList.add('active');
        document.getElementById('db_item_slider').classList.add('active');

    </script>
@endsection
