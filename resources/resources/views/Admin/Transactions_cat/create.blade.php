@extends('layouts.admin')


@section("content")


    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <div class="content-wrapper">
                <!-- Content -->

                <div class="container-xxl flex-grow-1 container-p-y">
                    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Transaction /</span> Category / Create</h4>

                    <div class="col-xxl">
                        <div class="card mb-4">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h5 class="mb-0">Adding: <strong>New Category</strong></h5>
                                <small class="text-muted float-end">Default label</small>
                            </div>
                            <div class="card-body">
                                <form method="POST" enctype="multipart/form-data"  action="{{route('trans_cat.store')}}">
                                    @csrf
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">Category Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="cat_name" class="form-control" id="cat_name" value="" required/>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-phone">Category Type</label>
                                        <div class="col-sm-10">
                                            <select name="cat_cat" id="cat_cat" class="form-control" required>
                                                <option value="ACCI">Income</option>
                                                <option value="ACCE">Expense</option>
                                            </select>

                                        </div>
                                    </div>

                                    <input type="hidden" name="cat_icon" class="form-control" id="cat_icon" value=" " />
                                    <input type="hidden" value="4" name="cat_root">
                                    <input type="hidden" value="1" name="cat_is_featured" id="cat_is_featured">
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
        document.getElementById('db_pitem_funds').classList.add('active');
        document.getElementById('db_item_catfund').classList.add('active');

    </script>
@endsection
