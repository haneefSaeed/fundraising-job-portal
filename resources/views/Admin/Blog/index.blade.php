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
                        <h4 class="col-md-6 fw-bold py-3 mb-4"><span class="text-muted fw-light">Blog Settings /</span> Posts </h4>
                        <a class="col-md-2 offset-md-4 mt-2" href="{{route('blog.create')}}"><button type="submit" style="height: 50px" class="btn btn-outline-primary">Add New</button></a>
                    </div>

                    <!-- Basic Bootstrap Table -->
                    <div class="card">
                        <h5 class="card-header">Blog Posts</h5>
                        <div class="table-responsive text-nowrap">
                            <table id="blogTable" class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Image</th>
                                    <th>Publish Date</th>
                                    <th>Status</th>
                                    <th>User</th>
                                    <th>Cat</th>
                                    <th>Tags</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                @foreach($blogs as $blog)
                                    <tr>
                                        <td>{{$blog->id}}</td>
                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$blog->title}}</strong></td>
                                        <td>
                                            {!! substr($blog->content, 0, 50) !!}
                                        </td>
                                        <td><img width="50px" height="30px" src="{{asset($blog->img)}}"> </td>
                                        <td><i class="fab fa-angular fa-lg me-3"></i>{{date('Y-M-d h:i:s', strtotime($blog->publish_date))}}</td>
                                        <td>
                                            @if($blog->status)
                                                <span class="badge bg-label-primary me-1">Publish</span>
                                            @else
                                                <span class="badge bg-label-danger me-1">Unpublish</span>
                                            @endif
                                        </td>
                                        <td>{{$blog->user->name}}</td>
                                        <td>{{$blog->cat->cat_name}}</td>
                                        <td>{{$blog->tags}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{route('blog.edit', ['blog'=>$blog])}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                                    <a class="dropdown-item deleteConfirm" href="/admin/blog/destroy/{{$blog->id}}"
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
        document.getElementById('db_item_blog').classList.add('active');
    </script>
    <script>
        $('.deleteConfirm').on('click', function (event) {
            event.preventDefault();
            const url = $(this).attr('href');
            swal({
                title: 'Are you sure?',
                text: 'You are about to Delete this Blog!',
                icon: 'warning',
                buttons: ["Cancel", "Delete!"],
            }).then(function(value) {
                if (value) {
                    window.location.href = url;
                }
            });
        });

    </script>
    <script>
        $(document).ready(function () {
            $('#blogTable').DataTable({
                order: [[0, 'desc']],
            });
        });
    </script>
@endsection
