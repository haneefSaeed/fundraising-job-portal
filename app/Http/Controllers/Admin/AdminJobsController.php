<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class AdminJobsController extends Controller
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

            $jobs = Job::with('edu_level', 'exp_level', 'category', 'company_profile', 'emp_type')->get();
            return view("Admin.Jobs.index",
                ['jobs' => $jobs]);
        }
    }

    public function unindex(){
        $user = auth('admin')->user()->is_emp;

        if($user){
            return redirect('admin/');
        }
        else {

            $jobs = Job::with('edu_level', 'exp_level', 'category',
                'company_profile', 'emp_type')->where('status', '=', '0')->get();
            return view('Admin.Jobs.un_index', ['jobs' => $jobs]);
        }
    }

    public function verify($id){
        $user = auth('admin')->user()->is_emp;

        if($user){
            return redirect('admin/');
        }
        else {

            $targetJob = Job::find($id);
            $targetJob->update(['status' => 1]);

            return redirect('admin/unjobs');
        }
    }

    public function reject($id){
        $user = auth('admin')->user()->is_emp;

        if($user){
            return redirect('admin/');
        }
        else {

            $targetJob = Job::find($id);
            $targetJob->update(['status' => 2]);

            return redirect('admin/unjobs');
        }
    }
}
