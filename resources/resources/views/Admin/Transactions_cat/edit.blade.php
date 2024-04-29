@extends('layouts.admin')


@section("content")


    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <div class="content-wrapper">
                <!-- Content -->

                <div class="container-xxl flex-grow-1 container-p-y">
                    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Transaction /</span> Category / Edit</h4>

                    <div class="col-xxl">
                        <div class="card mb-4">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h5 class="mb-0">Adding: <strong>{{$transaction_cat->cat_name}}</strong></h5>
                                <small class="text-muted float-end">Default label</small>
                            </div>
                            <div class="card-body">
                                <form method="POST" enctype="multipart/form-data"  action="{{route('trans_cat.update', ['trans_cat' => $transaction_cat])}}">
                                    @csrf
                                    @method('PATCH')
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">Category Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="cat_name" class="form-control" id="cat_name" value="{{$transaction_cat->cat_name}}" required/>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-phone">Category Type</label>
                                        <div class="col-sm-10">
                                            <select name="cat_cat" id="cat_cat" class="form-control" required>
                                                <option selected value="ACCI">Income</option>
                                                <option value="ACCE">Expense</option>
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
        document.getElementById('db_pitem_funds').classList.add('active');
        document.getElementById('db_item_catfund').classList.add('active');

    </script>
@endsection
