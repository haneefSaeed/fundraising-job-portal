<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\causes;
use App\Models\donations;
use Illuminate\Http\Request;

class AdminFundraisingController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
        $user = auth('admin')->user()->is_emp;

        if($user){
            return redirect('admin/');
        }
        else {
            $causes = causes::with('fr_profile', 'category')->orderBy('id', 'desc')->get();
            return view("Admin.Fundraisings.index",
                ['causes' => $causes]);
        }
    }

    public function unindex(){

        $user = auth('admin')->user()->is_emp;

        if($user){
            return redirect('admin/');
        }
        else{
            $causes = causes::with('fr_profile' , 'category')->where('cause_status', '=' , '0')->get();
            return view('Admin.Fundraisings.un_index', ['causes' => $causes]);
        }
    }

    public function doindex(){
        $user = auth('admin')->user()->is_emp;

        if($user){
            return redirect('admin/');
        }
        else{
            $donations = donations::with('user' ,'cause')->get();
            return view('Admin.Fundraisings.do_index' , ['donations' => $donations]);
        }
    }

    public function verify($id){
        $user = auth('admin')->user()->is_emp;

        if($user){
            return redirect('admin/');
        }
        else {

            $targetCause = causes::find($id);
            $targetCause->update(['cause_status' => 1]);

            return redirect('admin/unfund');
        }
    }

    public function reject($id){
        $user = auth('admin')->user()->is_emp;

        if($user){
            return redirect('admin/');
        }
        else {

            $targetCause = causes::find($id);
            $targetCause->update(['cause_status' => 2]);

            return redirect('admin/unfund');
        }
    }
}
