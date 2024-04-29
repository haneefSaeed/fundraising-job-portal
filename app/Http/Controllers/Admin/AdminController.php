<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\transactions;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller {
    //
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function dashboard(){

        //Carbon::setLocale('en_US');
        //$total_revenues = transactions::whereBetween('created_at', [Carbon::now()->startOfDay() , Carbon::now()->endOfDay()])->get();
        $transactions = transactions::all();
        $expenses = transactions::select('trans_amount')->where('trans_type', '=','Expense')->orderBy('created_at','asc')->take(7)->get();
        $incomes = transactions::select('trans_amount')->where('trans_type', '=','Income')->orderBy('created_at','asc')->take(7)->get();
        return view('Admin.dashboard' , [
            'expenses' => $expenses,
            'incomes' => $incomes,
            'transactions' => $transactions,
        ]);
    }
}
