@extends('layouts.admin')


@section("content")


    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <div class="content-wrapper">
                <!-- Content -->

                <div class="container-xxl flex-grow-1 container-p-y">
                    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page Settings /</span> Service / Edit</h4>

                    <div class="col-xxl">
                        <div class="card mb-4">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h5 class="mb-0">Editing: <strong>{{$service->svc_ftitle}}</strong></h5>
                                <small class="text-muted float-end">Default label</small>
                            </div>
                            <div class="card-body">
                                <form method="POST" enctype="multipart/form-data"  action="{{ route('service.update',['service' => $service]) }}">
                                    @csrf
                                    @method('PATCH')
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">Front Icon</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="svc_ficon" class="form-control" id="service_icon" value="{{$service->svc_ficon}}" required/>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">Front Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="svc_ftitle" class="form-control" id="service_ftitle" value="{{$service->svc_ftitle}}" required/>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">Back Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="svc_btitle" class="form-control" id="service_btitle" value="{{$service->svc_btitle}}" required/>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">Front Descriprion</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="svc_fdescription" class="form-control" id="service_fdescription" value="{{$service->svc_fdescription}}" required/>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">Back Description</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="svc_bdescription" class="form-control" id="service_bdescription" value="{{$service->svc_bdescription}}" required/>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">Button Caption</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="svc_bbtncaption" class="form-control" id="service_bbtncaption" value="{{$service->svc_bbtncaption}}" required/>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">Button Link</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="svc_bbtnLink" class="form-control" id="service_bbtnLink" value="{{$service->svc_bbtnLink   }}" required/>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-phone">Status</label>
                                        <div class="col-sm-10">
                                            <select name="is_pub" id="is_pub" class="form-control" required>
                                                <option value="0">unpublish</option>
                                                <option value="1">Publish</option>
                                            </select>

                                        </div>
                                    </div>


                                            <input type="hidden" value="{{date("Y/m/d H:i:s")}}" name="updated_at" id="updated_at">

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
    document.getElementById('db_pitem_setting').classList.add('active');
    document.getElementById('db_item_service').classList.add('active');

</script>
    @endsection
