<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\categories;

class AdminJobCatController extends Controller
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
            $job_cats = categories::where('cat_cat', 'JOB')->get();

            return view('Admin.Job_cat.index', ['job_cats' => $job_cats]);
        }
    }

    public function create(){
        $user = auth('admin')->user()->is_emp;

        if($user){
            return redirect('admin/');
        }
        else {
            $job_cats = categories::select('*')->where([['cat_root', '=', 0], ['cat_cat', '=', 'JOB']])->get();
            return view("Admin.Job_cat.create", ['job_cats' => $job_cats]);
        }
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

        return redirect('admin/jobs_cat');
    }



    public function update(Request $req, $id){
        $updates = Request()->all();
        $targetJobCat = categories::find($id);
        $targetJobCat->update($updates);


        //$targetBlog->update(['img' => $folder.$filename]);

        return redirect('admin/jobs_cat');
    }

    public function edit($id){
        $user = auth('admin')->user()->is_emp;

        if($user){
            return redirect('admin/');
        }
        else {
            $job_cat = categories::findorFail($id);
            $job_root = categories::select('*')->where([['cat_root', '=', 0], ['cat_cat', '=', 'JOB']])->get();
            return view("Admin.Job_cat.edit", ['job_cat' => $job_cat, 'cat_root' => $job_root]);
        }
    }

    public function destroy($id)
    {
        $user = auth('admin')->user()->is_emp;

        if($user){
            return redirect('admin/');
        }
        else {
            $job = Job::where('cat_id', '=', $id)->count();

            if($job > 0){
                return redirect('admin/jobs_cat');
            }
            else {
                $job_cat = categories::find($id);
                $job_cat->delete();
                return redirect('admin/jobs_cat');
            }
        }
    }
}
