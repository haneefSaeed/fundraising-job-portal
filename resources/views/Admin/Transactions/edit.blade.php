@extends('layouts.admin')


@section("content")


    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <div class="content-wrapper">
                <!-- Content -->

                <div class="container-xxl flex-grow-1 container-p-y">
                    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Transaction /</span> Journal / Edit</h4>

                    <div class="col-xxl">
                        <div class="card mb-4">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h5 class="mb-0">Editing: <strong>{{$transaction->trans_title}}</strong></h5>
                                <small class="text-muted float-end">Default label</small>
                            </div>
                            <div class="card-body">
                                <form method="POST" enctype="multipart/form-data"  action="{{route('transactions.update',['transaction' => $transaction])}}">
                                    @csrf
                                    @method('PATCH')
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="trans_title" class="form-control" id="trans_title" value="{{$transaction->trans_title}}" required/>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-company">Description</label>
                                        <div class="col-sm-10">
                                            <input
                                                    type="text"
                                                    class="form-control"
                                                    id="trans_desc"
                                                    name="trans_description"
                                                    value="{{$transaction->trans_description}}"
                                                    required

                                            />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">Amount</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="trans_amount" class="form-control" id="amount" value="{{$transaction->trans_amount}}" required/>
                                        </div>
                                    </div>

                                    <input type="hidden" value="{{date("Y/m/d H:i:s")}}" name="updated_at" id="updated_at">

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
        document.getElementById('db_pitem_trans').classList.add('active');
        document.getElementById('db_item_alltrans').classList.add('active');

    </script>
@endsection
