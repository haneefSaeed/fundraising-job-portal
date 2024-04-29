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
                    <h4 class="col-md-6 fw-bold py-3 mb-4"><span class="text-muted fw-light">Transactions /</span>Draft Journal</h4>
                    <!-- Basic Bootstrap Table -->
                    <div class="card">
                        <h5 class="card-header">Transactions</h5>
                        <div class="table-responsive text-nowrap">
                            <table id="trans_table" class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Type</th>
                                    <th>Category</th>
                                    <th>Posted By</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Posted Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                @foreach($transactions as $transaction)
                                    <tr>
                                        <td>{{$transaction->id}}</td>
                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$transaction->trans_title}}</strong></td>
                                        <td>
                                            {{substr($transaction->trans_description, 0, 100)}}
                                        </td>
                                        <td>{{$transaction->trans_type}}</td>
                                        <td>{{$transaction->category->cat_name}}</td>
                                        <td>{{$transaction->user->name}}</td>
                                        <td>{{date('Y-M-d', strtotime($transaction->trans_date))}}</td>
                                        <td>{{$transaction->trans_amount}}</td>
                                        <td>
                                            @if($transaction->trans_status == 0)
                                                <span class="badge bg-label-primary me-1">draft</span>
                                            @elseif($transaction->trans_status == 1)
                                                <span class="badge bg-label-success me-1">Approved</span>
                                            @else
                                                <span class="badge bg-label-danger me-1">Canceled</span>
                                            @endif
                                        </td>
                                        <td>{{date('Y-M-d', strtotime($transaction->created_at))}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item approveConfirm" href="/admin/transactions/approve/{{$transaction->id}}"
                                                    ><i class="bx bx-edit-alt me-1"></i> Approve</a
                                                    >
                                                    <a class="dropdown-item cancelConfirm" href="/admin/transactions/cancel/{{$transaction->id}}"
                                                    ><i class="bx bx-trash me-1"></i> Cancel</a>
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
        document.getElementById('db_pitem_trans').classList.add('active');
        document.getElementById('db_item_dratrans').classList.add('active');
    </script>

    <script>
        $('.approveConfirm').on('click', function (event) {
            event.preventDefault();
            const url = $(this).attr('href');
            swal({
                title: 'Are you sure?',
                text: 'You are about to Approve this Journal!',
                icon: 'warning',
                buttons: ["Cancel", "Approve!"],
            }).then(function(value) {
                if (value) {
                    window.location.href = url;
                }
            });
        });

        $('.cancelConfirm').on('click', function (event) {
            event.preventDefault();
            const url = $(this).attr('href');
            swal({
                title: 'Are you sure?',
                text: 'You are about to Cancel this Journal!',
                icon: 'warning',
                buttons: ["Cancel", "Cancel!"],
            }).then(function(value) {
                if (value) {
                    window.location.href = url;
                }
            });
        });

    </script>

    <script>
        $(document).ready(function () {
            $('#trans_table').DataTable({
                order: [[0, 'desc']],
            });
        });
    </script>
@endsection
