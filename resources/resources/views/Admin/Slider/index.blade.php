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
                            <h4 class="col-md-6 fw-bold py-3 mb-4"><span class="text-muted fw-light">Page Settings /</span> Slider</h4>
                            <a class="col-md-2 offset-md-4 mt-2" href="{{route('slider.create')}}"><button type="submit" style="height: 50px" class="btn btn-outline-primary">Add New</button></a>
                        </div>
                        <!-- Basic Bootstrap Table -->
                        <div class="card">
                            <h5 class="card-header">Home page Slides</h5>
                            <div class="table-responsive text-nowrap">
                                <table id="slider_table" class="table">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                    @foreach($sliders as $slide)
                                    <tr>
                                        <td>{{$slide->id}}</td>
                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$slide->sdr_title}}</strong></td>
                                        <td>
                                            {{substr($slide->sdr_description, 0, 100)}}
                                        </td>
                                        <td><img width="50px" height="30px" src="{{asset($slide->sdr_imageURL)}}"> </td>
                                        <td>
                                            @if($slide->sdr_isPublished)
                                                <span class="badge bg-label-primary me-1">Publish</span>
                                            @else
                                                <span class="badge bg-label-danger me-1">UnPublish</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{route('slider.edit', ['slider'=>$slide])}}"
                                                    ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                                    >
                                                    <a class="dropdown-item" href="{{route('slider.destroy', ['slider'=>$slide])}}"
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

    @endsection

@section('footer')
<script>
    document.getElementById('db_pitem_setting').classList.add('active');
    document.getElementById('db_item_slider').classList.add('active');

    $(document).ready( function () {
        $('#slider_table').DataTable();
    } );

</script>
    @endsection
