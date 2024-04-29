<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\transactions;
use App\Models\categories;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use PDF;

class AdminReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
        $transactions = transactions::with('user' , 'category')->get();
        return view("Admin.Report.index",
            ['transactions' => $transactions]);
    }

    public function show(Request $req){

        $transactions = null;

        if($req->cat == "all"){
            if($req->from == null and $req->to == null){
                $transactions = transactions::with('user' , 'category')->get();
            }
            elseif($req->from != null and $req->to == null){
                $transactions = transactions::where('trans_date', '>=', $req->from)->get();
            }
            elseif($req->from == null and $req->to != null){
                $transactions = transactions::where('trans_date', '<=', $req->to)->get();
            }
            else{
                $transactions = transactions::whereBetween('trans_date', [$req->from, $req->to])->get();
            }
        }
        elseif($req->cat == 'ACCI'){

            if($req->from == null and $req->to == null){
                $transactions = transactions::where('trans_type' ,  '=' , 'Income')->get();
            }
            elseif($req->from != null and $req->to == null){
                $transactions = transactions::where('trans_type', 'Income')->where('trans_date', '>=', $req->from)->get();
            }
            elseif($req->from == null and $req->to != null){
                $transactions = transactions::where('trans_type', 'Income')->where('trans_date', '<=', $req->to)->get();
            }
            else{
                $transactions = transactions::where('trans_type', 'Income')->whereBetween('trans_date', [$req->from, $req->to])->get();
            }
        }
        else{
            if($req->from == null and $req->to == null){
                $transactions = transactions::with('user' , 'category')->where('trans_type', 'Expense')->get();
            }
            elseif($req->from != null and $req->to == null){
                $transactions = transactions::where('trans_type', 'Expense')->where('trans_date', '>=', $req->from)->get();
            }
            elseif($req->from == null and $req->to != null){
                $transactions = transactions::where('trans_type', 'Expense')->where('trans_date', '<=', $req->to)->get();
            }
            else{
                $transactions = transactions::where('trans_type', 'Expense')->whereBetween('trans_date', [$req->from, $req->to])->get();
            }
        }


        switch ($req->input('action')){
            case 'generate':
                    return view("Admin.Report.index",
                    ['transactions' => $transactions]);
                break;
            case 'pdf':
                    $pdf = PDF::loadView('Admin.Report.transactionReport', compact('transactions'));
                    return $pdf->download('transactions.pdf');
                break;
        }

    }


}
