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
                            <h4 class="col-md-6 fw-bold py-3 mb-4"><span class="text-muted fw-light">Page Settings /</span> Service </h4>
                            <a class="col-md-2 offset-md-4 mt-2" href="{{route('service.create')}}"><button type="submit" style="height: 50px" class="btn btn-outline-primary">Add New</button></a>
                        </div>

                        <!-- Basic Bootstrap Table -->
                        <div class="card">
                            <h5 class="card-header">Home page Slides</h5>
                            <div class="table-responsive text-nowrap">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>F Title</th>
                                        <th>F Description</th>
                                        <th>B Title</th>
                                        <th>B Description</th>
                                        <th>B btn cpt</th>
                                        <th>B btn link</th>
                                        <th>icon</th>
                                        <th>pub</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                    @foreach($services as $service)
                                    <tr>
                                        <td>{{$service->id}}</td>
                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$service->svc_ftitle}}</strong></td>
                                        <td>
                                            {{substr($service->svc_fdescription, 0, 50)}}
                                        </td>
                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$service->svc_btitle}}</strong></td>
                                        <td>
                                            {{substr($service->svc_bdescription, 0, 50)}}
                                        </td>

                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$service->svc_bbtncaption}}</strong></td>
                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$service->svc_bbtnLink}}</strong></td>
                                        <td><i class="fa fa-{!!$service->svc_ficon!!}" style="font-size: 30pt; color:#696cff;"></i></td>
                                        <td>
                                            @if($service->is_pub)
                                                <span class="badge bg-label-primary me-1"><i class="fa fa-check"></i> </span>
                                            @else
                                                <span class="badge bg-label-danger me-1"><i class="fa fa-close"></i></span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{route('service.edit', ['service'=>$service])}}"
                                                    ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                                    >
                                                    <a class="dropdown-item" href="{{route('service.destroy', ['service'=>$service])}}"
                                                    ><i class="bx bx-trash me-1"></i> Delete</a
                                                    >
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
    document.getElementById('db_item_service').classList.add('active');

</script>
    @endsection
