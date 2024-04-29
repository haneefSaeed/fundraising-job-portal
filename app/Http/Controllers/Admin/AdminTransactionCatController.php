<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\categories;
use App\Models\transactions;
use Illuminate\Http\Request;


class AdminTransactionCatController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
        $transactions_cats = categories::where('cat_cat', '=', 'ACCI')->orwhere('cat_cat' , '=' , 'ACCE')->get();
        return view('Admin.Transactions_cat.index', ['transactions_cats' => $transactions_cats]);
    }

    public function create(){
        return view("Admin.Transactions_cat.create");
    }

    public function store(){
        $data = request()->all();

        categories::create([
            'cat_name' => $data['cat_name'],
            'cat_cat' => $data['cat_cat'],
            'cat_is_featured' => $data['cat_is_featured'],
            'cat_root' => $data['cat_root'],
            'cat_icon' => $data['cat_icon'],
            'created_at' => $data['created_at'],
        ]);

        return redirect('admin/trans_cat');
    }



    public function update(Request $req, $id){
        $updates = Request()->all();
        $targetTransCat = categories::find($id);
        $targetTransCat->update($updates);


        //$targetBlog->update(['img' => $folder.$filename]);

        return redirect('admin/trans_cat');
    }

    public function edit($id){
        $transaction_cat = categories::findorFail($id);
        return view("Admin.Transactions_cat.edit", ['transaction_cat' => $transaction_cat] );
    }

    public function destroy($id)
    {
        $transaction = transactions::where('trans_cat_id', '=', $id)->count();

        if($transaction > 0){
            return redirect('admin/trans_cat');
        }
        else{
            $transaction_cat = categories::find($id);
            $transaction_cat->delete();
            return redirect('admin/trans_cat');
        }
    }
}
