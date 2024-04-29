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
                    <h4 class="col-md-6 fw-bold py-3 "><span class="text-muted fw-light">Report /</span> Transaction Report </h4>
                    <br><br><br>

                    <form method="GET" enctype="multipart/form-data"  action="{{route('report.show')}}">
                        <div class="row pb-5" style="margin-left: 15%">
                            @csrf
                            <div class="col-md-2">
                                <label class=" col-form-label" >Type</label>
                                <div class="">
                                    <select name="cat" id="" class="form-control">
                                        <option value="all">All</option>
                                        <option value="ACCI">Income</option>
                                        <option value="ACCE">Expense</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="col-form-label" >From :</label>
                                <div class="">
                                    <input type="date" name="from" class="form-control" id="" value=""/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="col-form-label" >To :</label>
                                <div class="">
                                    <input type="date" name="to" class="form-control" id="" value=""/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div style="margin-top: 34px">
                                    <button type="submit" name="action" value="generate" class="btn btn-primary">Generate</button>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div style="margin-top: 34px">
                                    <a><button type="submit" name="action" value="pdf" class="btn btn-primary" style="width: 104px">Export</button></a>
                                </div>
                            </div>
                        </div>
                    </form>


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
                                        <td>{{$transaction->trans_date}}</td>
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
                                        <td>{{$transaction->created_at}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{route('transactions.edit', ['transaction'=>$transaction])}}"
                                                    ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                                    >
                                                    <a class="dropdown-item" href="{{route('transactions.cancel', $transaction)}}"
                                                    ><i class="bx bx-trash me-1"></i> Cancel</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                    <tr>
                                        <td></td>
                                        <td><strong>The Total Sum: </strong></td>
                                        <td><strong>{{$transactions->where('trans_type', '=', 'Income')->sum('trans_amount') - $transactions->where('trans_type', '=', 'Expense')->sum('trans_amount')}}</strong></td>
                                    </tr>
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
                        document.getElementById('db_pitem_report').classList.add('active');
                        document.getElementById('db_item_tranreport').classList.add('active');

                    </script>
@endsection
