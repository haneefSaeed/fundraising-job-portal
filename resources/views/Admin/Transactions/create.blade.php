@extends('layouts.admin')


@section("content")


    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <div class="content-wrapper">
                <!-- Content -->

                <div class="container-xxl flex-grow-1 container-p-y">
                    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Transaction /</span> Journal / Add</h4>

                    <div class="col-xxl">
                        <div class="card mb-4">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h5 class="mb-0">Adding: <strong>New Journal</strong></h5>
                                <small class="text-muted float-end">Default label</small>
                            </div>
                            <div class="card-body">
                                <form method="POST" enctype="multipart/form-data"  action="{{route('transactions.store')}}">
                                    @csrf
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="trans_title" class="form-control" id="trans_title" value="" required/>
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
                                                    value=""
                                                    required

                                            />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-phone">Type</label>
                                        <div class="col-sm-10 exp">
                                            <select name="trans_type" id="trans_type" onchange="ShowCat(this)" class="form-control" required>
                                                <option value="">Select Type</option>
                                                <option value="Expense">Expense</option>
                                                <option value="Income">Income</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-phone">Category</label>
                                        <div class="col-sm-10 exp">
                                            <select id="null" class="form-control">
                                                <option>Select Category</option>
                                            </select>
                                            <select name="" id="exp" class="form-control" style="display: none" >
                                                <option selected>Select Category</option>
                                                @foreach($transaction_cat as $cat)
                                                    @if($cat->cat_cat == "ACCE")
                                                        <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <select name="" id="inc" class="form-control" style="display: none" >
                                                <option value="" selected>Select Category</option>
                                                @foreach($transaction_cat as $cat)
                                                    @if($cat->cat_cat == "ACCI")
                                                        <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">Date</label>
                                        <div class="col-sm-10">
                                            <input type="date" name="trans_date" class="form-control" id="trans_date" value="" required/>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">Amount</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="trans_amount" class="form-control" id="amount" value="" required/>
                                        </div>
                                    </div>

                                    <input type="hidden" value="{{date("Y/m/d H:i:s")}}" name="created_at" id="created_at">
                                    <input type="hidden" value="{{Auth::guard('admin')->user()->id}}" name="trans_user_id" id="user_id">
                                    <input type="hidden" value="0" name="trans_status" id="trans_status">

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

        function ShowCat(chosed){
            let selectedType = chosed.options[chosed.selectedIndex].value;

            if(selectedType == "Expense"){
                document.getElementById('null').style.display = 'none';
                document.getElementById('inc').removeAttribute('required');
                document.getElementById('inc').style.display = 'none';
                document.getElementById('inc').setAttribute('name', 'blah');
                document.getElementById('exp').style.display = 'block';
                document.getElementById('exp').setAttribute("required" , "true");
                document.getElementById('exp').setAttribute('name', 'trans_cat_id');
            }
            else if(selectedType == "Income"){
                document.getElementById('null').style.display = 'none';
                document.getElementById('exp').removeAttribute('required');
                document.getElementById('exp').style.display = 'none';
                document.getElementById('exp').setAttribute('name', 'blah');
                document.getElementById('inc').setAttribute("required" , "true");
                document.getElementById('inc').style.display = 'block';
                document.getElementById('inc').setAttribute('name', 'trans_cat_id');
            }
            else{
                document.getElementById('exp').removeAttribute('required');
                document.getElementById('exp').style.display = 'none';
                document.getElementById('inc').removeAttribute('required');
                document.getElementById('inc').style.display = 'none';
                document.getElementById('null').style.display = 'block';
            }
        }

    </script>
@endsection
