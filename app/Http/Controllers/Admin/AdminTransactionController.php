<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\transactions;
use App\Models\categories;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class AdminTransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
        $transactions = transactions::with('user' , 'category')->get();
        return view("Admin.Transactions.index",
            ['transactions' => $transactions]);
    }

    public function draftIndex(){
        $user = auth('admin')->user()->is_emp;

        if($user){
            return redirect('admin/');
        }
        else {
            $transactions = transactions::with('user', 'category')->where('trans_status', '=', '0')->get();
            return view("Admin.Transactions.draft_index",
                ['transactions' => $transactions]);
        }
    }

    public function create(){
        $transaction_cat = categories::where('cat_cat', '=', 'ACCI')->orwhere('cat_cat' , '=' , 'ACCE')->get();
        return view("Admin.Transactions.create" , ['transaction_cat' => $transaction_cat]);
    }

    public function store(){
        $data = request()->all();

        transactions::create([
            'trans_title' => $data['trans_title'],
            'trans_description' => $data['trans_description'],
            'trans_type' => $data['trans_type'],
            'trans_cat_id' => $data['trans_cat_id'],
            'trans_date' => $data['trans_date'],
            'trans_user_id' => $data['trans_user_id'],
            'trans_status' => $data['trans_status'],
            'trans_amount' => $data['trans_amount'],
            'updated_at' => null,
            'created_at' => $data['created_at']
        ]);


        return redirect('admin/transactions');
    }

    public function update(Request $req, $id){
        $updates = Request()->all();
        $targetTransaction = transactions::find($id);
        $targetTransaction->update($updates);

        return redirect('admin/transactions');
    }


    public function edit($id){
        $transaction = transactions::findorFail($id);
        return view("Admin.Transactions.edit", [
            'transaction' => $transaction,
        ] );
    }

    public function cancel($id){
        $user = auth('admin')->user()->is_emp;

        if($user){
            return redirect('admin/');
        }
        else {
            $targetTransaction = transactions::find($id);
            $targetTransaction->update(['trans_status' => 2]);

            return redirect('admin/dtransactions');
        }
    }

    public function approve($id){
        $user = auth('admin')->user()->is_emp;

        if($user){
            return redirect('admin/');
        }
        else {
            $targetTransaction = transactions::find($id);
            $targetTransaction->update(['trans_status' => 1]);

            return redirect('admin/dtransactions');
        }
    }


}
