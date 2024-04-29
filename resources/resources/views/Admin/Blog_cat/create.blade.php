@extends('layouts.admin')


@section("content")


    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <div class="content-wrapper">
                <!-- Content -->

                <div class="container-xxl flex-grow-1 container-p-y">
                    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page Settings /</span> Blog Category / Create</h4>

                    <div class="col-xxl">
                        <div class="card mb-4">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h5 class="mb-0">Adding: <strong>New Category</strong></h5>
                                <small class="text-muted float-end">Default label</small>
                            </div>
                            <div class="card-body">
                                <form method="POST" enctype="multipart/form-data"  action="{{route('blog_cat.store')}}">
                                    @csrf
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">Category Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="cat_name" class="form-control" id="cat_name" value="" required/>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">Category Icon</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="cat_icon" class="form-control" id="cat_icon" value="" required/>
                                        </div>
                                    </div>

                                    <input type="hidden" value="BLOG" name="cat_cat" id="cat_cat">
                                    <input type="hidden" value="1" name="cat_is_featured" id="cat_is_featured">
                                    <input type="hidden" value="3" name="cat_root" id="cat_root">
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
        document.getElementById('db_pitem_blogs').classList.add('active');
        document.getElementById('db_item_blog_cat').classList.add('active');

    </script>
@endsection
