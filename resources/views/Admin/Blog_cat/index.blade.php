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
                        <h4 class="col-md-6 fw-bold py-3 mb-4"><span class="text-muted fw-light">Blog Settings /</span> Blog Categories </h4>
                        <a class="col-md-2 offset-md-4 mt-2" href="{{route('blog_cat.create')}}"><button type="submit" style="height: 50px" class="btn btn-outline-primary">Add New</button></a>
                    </div>

                    <!-- Basic Bootstrap Table -->
                    <div class="card">
                        <h5 class="card-header">Blog Category</h5>
                        <div class="table-responsive text-nowrap">
                            <table id="catTable" class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Category Root</th>
                                    <th>Category Icon</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                @foreach($blog_cats as $blog_cat)
                                    <tr>
                                        <td>{{$blog_cat->id}}</td>
                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$blog_cat->cat_name}}</strong></td>
                                        <td>{{$blog_cat->cat_cat}}</td>
                                        <td><i style="font-size: 30px" class="fa fa-{!!$blog_cat->cat_icon!!}"></i></td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{route('blog_cat.edit', ['blog_cat' => $blog_cat])}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                                    <a class="dropdown-item deleteConfirm" href="/admin/blog_cat/destroy/{{$blog_cat->id}}"
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
        document.getElementById('db_pitem_blogs').classList.add('active');
        document.getElementById('db_item_blog_cat').classList.add('active');
    </script>
    <script>
        $('.deleteConfirm').on('click', function (event) {
            event.preventDefault();
            const url = $(this).attr('href');
            swal({
                title: 'Are you sure?',
                text: 'You are about to Delete this Category!',
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
