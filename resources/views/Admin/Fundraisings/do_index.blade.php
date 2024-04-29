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
                    <h4 class="col-md-6 fw-bold py-3 mb-4"><span class="text-muted fw-light">Fundraising /</span> Donations</h4>

                    <!-- Basic Bootstrap Table -->
                    <div class="card">
                        <h5 class="card-header">All Donations</h5>
                        <div class="table-responsive text-nowrap">
                            <table id="donTable" class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Donor</th>
                                    <th>Cause</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Message</th>
                                    <th>Replay</th>
                                </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                @foreach($donations as $donation)
                                    <tr>
                                        <td>{{$donation->id}}</td>
                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$donation->user->name}}</strong></td>
                                        <td>{{$donation->cause->cause_title}}</td>
                                        <td>{{number_format($donation->amount)}}</td>
                                        <td>{{date('Y-M-d h:i:s' , strtotime($donation->date))}}</td>
                                        <td>{{$donation->msg}}</td>
                                        <td>{{$donation->rep_msg}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--/ Basic Bootstrap Table -->

                </div>
            </div>
        </div>
    </div>
                <!-- / Content -->

@endsection

@section('footer')
    <script>
        document.getElementById('db_pitem_funds').classList.add('active');
        document.getElementById('db_item_donfund').classList.add('active');
    </script>
    <script>
        $(document).ready(function () {
            $('#donTable').DataTable({
                order: [[0, 'desc']],
            });
        });
    </script>
@endsection
