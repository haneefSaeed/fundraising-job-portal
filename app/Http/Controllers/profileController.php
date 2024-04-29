<?php

namespace App\Http\Controllers;

use App\Models\application;
use App\Models\career_level;
use App\Models\categories;
use App\Models\causes;
use App\Models\company_profile;
use App\Models\company_size;
use App\Models\donations;
use App\Models\edu_level;
use App\Models\emp_type;
use App\Models\exp_level;
use App\Models\followup;
use App\Models\fr_profile;
use App\Models\Job;
use App\Models\prof_profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class profileController extends Controller
{

    //Authorization
    public function __construct()
    {

        $this->middleware('auth');
    }

    public function index(){
        return 0;
    }

    public function finduser($user_id){
        $i = User::findOrFail($user_id);
        return $i;
    }
    public function postedJobs($job_id){
        $job =Job::find($job_id);
        $applications = application::all()->where('vac_id', '=', $job_id);
        $cats = categories::all()->where('cat_cat', '=', "JOB");
        $edu_lvls = edu_level::all();
        $car_lvls = career_level::all();
        $exp_lvls = exp_level::all();
        $emp_type = emp_type::all();
        return view('profile.postedJobs', [
            'job' => $job,
            'apps' => $applications,
            'cats' =>$cats,
            'edu_lvls' => $edu_lvls,
            'car_lvls' => $car_lvls,
            'exp_lvls' =>$exp_lvls,
            'emp_types' =>$emp_type,

        ]);
    }

    public function postedDonations($cause_id){
        // need encryption before
        //$cause_id is encrypted.
        $i = decrypt($cause_id);
        $cause = causes::findorFail($i);
        $donations = donations::all()->where('cause_id', $i);
        $cats = categories::all()->where('cat_cat' , '=', 'FR');

        $followups = followup::all()->where('cause_id' , '=', $i);
        return view('profile.postedDonations', [
            'cause'=> $cause,
            'donation' => $donations,
            'cats' => $cats,
            'followups'=>$followups
        ]);


    }

    public function store(Request $req){
        if($req->has('btn_submit_career_info')){
            $validateCareerInfo = Validator::make($req->all(), [
                'statement'=>'required',
                'career_id'=>'required',
                'cv'=>'required',
            ]);
            if($validateCareerInfo->fails()){
                return Redirect::back()->withErrors($validateCareerInfo);
            }else {
                prof_profile::create([
                    'current_position' => request('current_position'),
                    'current_company' => request('current_company'),
                    'location' => request('location'),
                    'statement' => request('statement'),
                    'career_id' => request('career_id'),
                    'user_id' => request('user_id'),
                    'edu_id' => request('edu_id'),
                    'total_exp' => request('total_exp')
                ]);
                if ($req->cv != '') {
                    $folder = '/Documents/Job/' . $req->user_id. '/cv/';
                    $path = public_path() . $folder;

                    //upload new file
                    $file = $req->cv;
                    $filename = $file->getClientOriginalName();
                    $file->move($path, $filename);
                    prof_profile::where('user_id', $req->user_id)->update(['cv'=> $folder.$filename]);
                }
                if ($req->cl != '') {
                    $folder = '/Documents/Job/' . $req->user_id. '/cl';
                    $path = public_path() . $folder;

                    //upload new file
                    $file = $req->cl;
                    $filename = $file->getClientOriginalName();
                    $file->move($path, $filename);
                    prof_profile::where('user_id', $req->user_id)->update(['cl'=> $folder.$filename]);
                }
                if ($req->other_doc != '') {
                    $folder = '/Documents/Job/' . $req->user_id. '/other_docs';
                    $path = public_path() . $folder;

                    //upload new file
                    $file = $req->other_doc;
                    $filename = $file->getClientOriginalName();
                    $file->move($path, $filename);
                    prof_profile::where('user_id', $req->user_id)->update(['other_doc'=> $folder.$filename]);
                }

                return redirect('/j');

            }

        }
        else if ($req->has('store_new_company_info')){

            $validatorCompInfo = Validator::make($req->all(), [
                'name'=>'required',
                'statement'=>'required',
                'email'=>'required',
                'industry'=>'required',
            ]);
            if($validatorCompInfo->fails()){
                return Redirect::back()->withErrors($validatorCompInfo);
            }else {
                company_profile::create([
                    'name' => request('name'),
                    'statement' => request('statement'),
                    'comp_size_id' => request('comp_size_id'),
                    'user_id' => request('user_id'),
                    'email' => request('email'),
                    'industry' => request('industry'),
                    'website' => request('website'),
                    'phone' => request('phone'),
                    'address' => request('address'),
                    'instagram' => request('instagram'),
                    'facebook' => request('facebook'),
                    'linkedin' => request('linkedin'),
                    'twitter' => request('twitter'),
                ]);
                if($req->form == 'job')
                return redirect('j/post');
                if($req->form == 'cause')
                    return redirect('c/post');
            }



        }
        else if($req->has('store_frp_bio')){
            $validatorFrpBio = Validator::make($req->all(['frp_user_id', 'frp_biography']), [
                'frp_biography' =>'required'
            ] );
            if($validatorFrpBio->fails()){
                return Redirect::back()->withErrors($validatorFrpBio);
            }else {
                fr_profile::create([
                    'frp_user_id' => request('frp_user_id'),
                    'frp_biography' => request('frp_biography'),
                ]);
                $cats = categories::all()->where('cat_cat', '=', 'FR');
                return view('cause.post', ['msg'=> 2, 'cats' => $cats]);
            }
        }
        else if ($req->has('btn_update_career_info')){
            dd($req->all());
        }
    }
    public function show($user_id)
    {
        $u = Crypt::decrypt($user_id);
        $comp_sizes = company_size::all();
        $users = User::findOrFail($u);
        $mydonations = donations::all()->where('user_id' ,'=', $u);

        $frp = fr_profile::all()->where('frp_user_id' , '=', $u)->first();
        if($frp!=null) {
            $myfrs = causes::all()->where('cause_frp_id', '=', $frp->id);
        }else{
            $myfrs = 0;
        }
        $comp_profile = company_profile::all()->where('user_id', '=', $u)->first();
        $prof_profile = prof_profile::all()->where('user_id', '=', $u)->first();
        $edu_level = edu_level::all();
        $careers = career_level::all();

        $prof_prof = prof_profile::where('user_id', '=', $u)->first();
        if($prof_prof!=null) {
            $jobsApplied = application::all()->where('prof_prof_id', '=', $prof_prof->id);
            if($comp_profile!=null)
            $myPostedJobs = Job::all()->where('comp_profile_id', '=', $comp_profile->id);
            else $myPostedJobs = null;
        }else {
            $jobsApplied=null;
            $myPostedJobs=null;
        }

        return view('profile.index', [
            'user' => $users,
            'compsizes' => $comp_sizes,
            'mydonations' => $mydonations,
            'myfrs' => $myfrs,
            'cprof' =>$comp_profile,
            'career_info' => $prof_profile,
            'careers' => $careers,
            'edu_levels' =>$edu_level,
            'AppJobs' => $jobsApplied,
            'PostedJobs'=> $myPostedJobs,
        ]);
    }

    public function update(Request $req, $id)
    {
        if (request('form') == 1) {
            donations::find($id)->update(
                ['msg' => request('ajxmsg')]);
            return json_encode(array('statusCode' => 200));
        }
        if (request('form') == 2) {
            donations::find($id)->update(
                ['rep_msg' => request('ajxmsg')]);
            return json_encode(array('statusCode' => 200));
        }
        if (request()->has('btn_update_posted_donation')) {
            if ($req->cause_img != '') {
                $folder = '/images/cause/' . $id . '/';
                $path = public_path() . $folder;

                //upload new file
                $file = $req->cause_img;
                $filename = $file->getClientOriginalName();
                $file->move($path, $filename);

                causes::find($id)->update([
                    'cause_title' => request('cause_title'),
                    'cause_end_date' => request('cause_end_date'),
                    'cause_location' => request('cause_location'),
                    'cause_cat_id' => request('cause_cat_id'),
                    'cause_description' => request('cause_description'),
                    'cause_tags' => request('cause_tags'),
                    'cause_img' => $folder . $filename,
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
                return redirect::back();
            }else{
                         causes::find($id)->update([
                        'cause_title' => request('cause_title'),
                        'cause_end_date' => request('cause_end_date'),
                        'cause_location' => request('cause_location'),
                        'cause_cat_id' => request('cause_cat_id'),
                        'cause_description' => request('cause_description'),
                        'cause_tags' => request('cause_tags'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);
                    return redirect::back();
            }

        }
        if ($req->has('btn_update_followup')) {
            if ($req->img != '') {
                $folder = '/images/cause/' . $req->cause_id . '/followups/';
                $path = public_path() . $folder;

                //upload new file
                $file = $req->img;
                $filename = $file->getClientOriginalName();
                $file->move($path, $filename);

                followup::find($id)->update([
                    'title' => $req->title,
                    'img' => $folder . $filename,
                    'description' => $req->description,
                    'date' => date('Y-m-d H:i:s'),
                ]);
                return redirect::back();
            }
            else {

                followup::find($id)->update([
                    'title' => $req->title,
                    'description' => $req->description,
                    'date' => date('Y-m-d H:i:s'),
                ]);
                return redirect::back();
            }
        }
        if($req->has('btn_update_company_info')){
            dd($req->all());
        }
        if(request('form') == 3){
            causes::find(request('sendata'))->update(['cause_status' => 2]);
            return json_encode(array('statusCode' => 200));
        }
        if(request('form')== 4){
            application::find(request('app_id'))->update(['message'=> request('msg')]);
            return json_encode(array('statusCode'=>200));
        }
        if(request('form')== 5){
            application::find(request('app_id'))->update(['reply'=>request('msg')]);
            return json_encode(array('statusCode'=>200));
        }
        if(request('form')== 6){
            application::find(request('app_id'))->update(['status'=>request('status')]);
            return json_encode(array('statusCode'=>200));
        }

    }
}
