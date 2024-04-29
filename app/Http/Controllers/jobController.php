<?php

namespace App\Http\Controllers;

use App\Models\application;
use App\Models\categories;
use App\Models\causes;
use App\Models\edu_level;
use App\Models\emp_type;
use App\Models\exp_level;
use App\Models\Job;
use App\Models\prof_profile;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use function Spatie\Ignition\Config\toArray;

class jobController extends Controller
{

    public function find_child_cat($job_cat_id, $paginate){

        // This function takes a category ID such as (id for Engineering = 2 -> returns all the jobs where root is 2)
        $jobs_on_g_cat = categories::all()->where('cat_root', '=', $job_cat_id);
        $gcat_items = [];

        // This loop will get the id of the records where root is =2 or engineering (for example, civil engineering which has id of 5);
        foreach ($jobs_on_g_cat as $gcat) {
            $gcat_items[] = $gcat->id;
        }
        // selects all the jobs within an engineering category (civil, electric etc)
        $jobs_group = Job::whereIn('cat_id', $gcat_items)->paginate($paginate);

        //returns a list of jobs within a root category
        return $jobs_group;
    }

    public function index(){
        $job_cats = categories::all()->where('cat_cat', '=', 'JOB');
        $jobs = Job::orderBy('id', 'desc')->take(5)->get();

        return view('job.index', [
            'cats' => $job_cats,
            'jobs' =>$jobs
        ]);
    }

    public function show_cat($job_cat_id){
        $cat = categories::findorFail($job_cat_id);
        $jobs_on_cat = Job::where('cat_id' , '=', $job_cat_id)->where('status', '!=', 0)->paginate(10);
        $job_count = $jobs_on_cat->count();
        $jobs_group = $this->find_child_cat($job_cat_id, 10);
        $job_g_count = $jobs_group->count();

        $cats = categories::all()->where('cat_cat' , '=' , "JOB" , 'and', 'cat_root', "!=", 0)->sortBy('cat_root')->take(10);
        if ($cat->cat_root != 0) {
            return view('job.show_cat', [
                'cat' => $cat,
                'jobs' => $jobs_on_cat,
                'job_count' => $job_count,
                'cats' =>$cats
            ]);
        }else {
            //Select * from categories where root_id = job_cat_id;
            return view('job.show_cat', [
                'cat' => $cat,
                'jobs' => $jobs_group,
                'job_count' => $job_g_count,
                'cats' =>$cats
            ]);
        }
    }
    public function show_job($job_id){
        // select * from jobs where job_id = id; Returns a single job item
        $single_job = Job::findorFail($job_id);
        // select * from categories where job_id = single.job->cat_id; // returns a single category from the job
        $single_cat = categories::findorFail($single_job->cat_id);

        $rel_jobs = $this->find_child_cat($single_cat->cat_root, 10)->take(5);
        return view('job.show', [
            'job_id' => $job_id,
            'job' => $single_job,
            'rel_jobs' => $rel_jobs,
        ]);
    }

    public function create()
    {
        if (Auth::check()) {
            $cats = categories::all()->where('cat_cat', '=', 'JOB');
            $eduLvl = edu_level::all();
            $explvl = exp_level::all();
            $emptype = emp_type::all();
            return view("Job.post", [
                'cats' => $cats,
                'edulvls' => $eduLvl,
                'explvls' =>$explvl,
                'emptype' =>$emptype,
            ]);
        } else {
            return view('Auth.login');
        }
    }

    public function store(Request $req)
    {
        if (Auth::check()) {

            if($req->has('subtn_new_job')){
               // dd($req->all());
        //'regex' => 'required|regex:/^(\d+(,\d{1,2})?)?$/',
                $validateNewJob = Validator::make($req->all(), [
                    'title' => 'required',
                    'description' => 'required',
                    'location' => 'required',
                    'closing_date' => 'required',
                ]);
                if ($validateNewJob->fails()) {
                    return Redirect::back()->withErrors($validateNewJob);
                } else {

                    if ($req->img != '') {
                        $folder = '/images/Job/' . $req->id . '/';
                        $path = public_path() . $folder;

                        //upload new file
                        $file = $req->img;
                        $filename = $file->getClientOriginalName();
                        $file->move($path, $filename);

                        Job::create([
                            'title' => request('title'),
                            'description' => request('description'),
                            'small_description' => request('small_description'),
                            'location' => request('location'),
                            'img' => $folder . $filename,
                            'pref_gender' => request('pref_gender'),
                            'reference' => request('reference'),
                            'posted_date' => request('posted_date'),
                            'comp_profile_id' => request('comp_profile_id'),
                            'edu_lvl_id' => request('edu_lvl_id'),
                            'exp_lvl_id' => request('exp_lvl_id'),
                            'cat_id' => request('cat_id'),
                            'emp_type_id' => request('emp_type_id'),
                            'closing_date' => request('closing_date'),
                            'is_remote' => request('is_remote'),
                            'status' => request('status'),
                            'tags' => request('tags'),
                            'seenctr' => 0
                        ]);
                        return view('jobs.index');
                    } else{
                        Job::create([
                            'title' => request('title'),
                            'description' => request('description'),
                            'small_description' => request('small_description'),
                            'location' => request('location'),
                            'pref_gender' => request('pref_gender'),
                            'reference' => request('reference'),
                            'posted_date' => request('posted_date'),
                            'comp_profile_id' => request('comp_profile_id'),
                            'edu_lvl_id' => request('edu_lvl_id'),
                            'exp_lvl_id' => request('exp_lvl_id'),
                            'cat_id' => request('cat_id'),
                            'emp_type_id' => request('emp_type_id'),
                            'closing_date' => request('closing_date'),
                            'is_remote' => request('is_remote'),
                            'status' => request('status'),
                            'tags' => request('tags'),
                            'seenctr' => 0
                        ]);
                        return redirect('j')->with('msg', 3);
                    }
                }
            }
            if($req->has('btn_application_apply')){
                $prof_prof_id = prof_profile::where('user_id', '=', $req->user_id)->first()->id;
                application::create([
                    'prof_prof_id'=> $prof_prof_id,
                    'vac_id' => $req->vac_id,
                    'apply_date'=> Date('Y-m-d H:i:s'),
                    'message' => $req->message,
                ]);
                if ($req->cv != '') {
                    $folder = '/Documents/Job/' . $req->user_id . '/';
                    $path = public_path() . $folder;

                    //upload new file
                    $file = $req->cv;
                    $filename = $file->getClientOriginalName();
                    $file->move($path, $filename);
                    prof_profile::find($prof_prof_id)->update(['cv' => $folder . $filename]);
                }
                return redirect::back()->with('msg', 'Your application was submitted succesfully');
            }

        }
    }

    public function update(Request $req, $job_id){
       if($req->has('btn_update_job')){
           if($req->img=="") {
               //when no pic
               job::find($job_id)->update([
                   'title' => $req->title,
                   'description' => $req->description,
                   'small_description' => $req->small_description,
                   'location' => $req->location,
                   'pref_gender' => $req->pref_gender,
                   'reference' => $req->reference,
                   'modified_date' => Date('Y-m-d H:i:s'),
                   'edu_lvl_id' => $req->edu_lvl_id,
                   'exp_lvl_id' => $req->exp_lvl_id,
                   'cat_id' => $req->cat_id,
                   'emp_type_id' => $req->emp_type_id,
                   'closing_date' => $req->closing_date,
                   'tags' => $req->tags,
                   'updated_at' => Date('Y-m-d H:i:s'),

                   ]);
               return redirect::back();
           }else {
               //when pic
           }
       }
    }


}
