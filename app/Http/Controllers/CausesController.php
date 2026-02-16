<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\causes;
use App\Models\donations;
use App\Models\followup;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Session;
use Illuminate\Support\Facades\Validator;



class CausesController extends Controller
{
    public function __construct() {}

    public function index()
    {
        //Call to a member function paginate() on a non-object [to use order by]
        $causes = causes::with(array('fr_profile'))->orderBy('cause_start_date', 'DESC')->paginate(6);
        $donors = donations::all();
        $cats = categories::where('cat_cat', 'FR')->get();

        return view('Cause.index', [
            'causes' => $causes,
            'cats' => $cats,
            'doners' => $donors
        ]);
    }


    public function create()
    {
        if (Auth::check()) {
            $cats = categories::where('cat_cat', 'FR')->get();

            return view("cause.post", [
                'cats' => $cats
            ]);
        } else {
            return view('Auth.login');
        }
    }

    public function show($cause_id)
    {
        // Get donations with same cause id
        $donors = donations::where('cause_id', '=', $cause_id)->get();

        //get all followups with same cause_id
        $followups = followup::all()->where('cause_id', '=', $cause_id);

        $cause = causes::findOrFail($cause_id);
        $k = 'cause_' . $cause->id;
        if (!Session::has($k)) {
            causes::where('id', $cause->id)->increment('seenctr', 1);
            Session::put($k, 1);
        }

        // The related causes will be selected based on the category and take function is used to limit only four records
        $all_related = causes::all()->sortByDesc('seenctr')->where('cause_cat_id', '=', ($cause->cause_cat_id))->take(4);


        return view('Cause.show', [
            'cause' => $cause,
            'followup' => $followups,
            'donations' => $donors,
            'related' => $all_related
        ]);
    }

    public function search(Request $request)
    {
         $query = causes::query()->where('cause_status', 1);

        // Keyword search (title, description, or tags)
        if ($request->filled('keyword')) {
            $query->where(function ($q) use ($request) {
                $q->where('cause_title', 'like', '%' . $request->keyword . '%')
                    ->orWhere('cause_description', 'like', '%' . $request->keyword . '%')
                    ->orWhere('cause_tags', 'like', '%' . $request->keyword . '%');
            });
        }

        // Category filter
        if ($request->filled('category')) {
            $cat = Categories::where('cat_cat', 'FR')
                ->where('cat_name', $request->category)
                ->first();

            if ($cat) {
                $query->where('cause_cat_id', $cat->id);
            }
        }

        // Min Goal filter
        if ($request->filled('mingoal')) {
            $query->where('cause_goal', '>=', $request->mingoal);
        }

        // Location filter
        if ($request->filled('location')) {
            $query->where('cause_location', 'like', '%' . $request->location . '%');
        }

        // Paginate results
        $causes = $query->with('fr_profile')->orderBy('cause_start_date', 'DESC')->paginate(10);

        // Return to the same index view with results
        $cats = Categories::where('cat_cat', 'FR')->get(); // pass categories if sidebar needs them

        if ($request->filled('sort')) {
            switch ($request->sort) {
                case 'newest':
                    $query->orderBy('cause_start_date', 'desc');
                    break;
                case 'oldest':
                    $query->orderBy('cause_start_date', 'asc');
                    break;
                case 'highgoal':
                    $query->orderBy('cause_goal', 'desc');
                    break;
                case 'lowgoal':
                    $query->orderBy('cause_goal', 'asc');
                    break;
                default:
                    $query->orderBy('cause_start_date', 'desc');
            }
        } else {
            $query->orderBy('cause_start_date', 'desc'); // default
        }

         $causes = $query->paginate(10);// ✅ paginator with query string
        return view('Cause.index',compact('causes', 'cats'));
    }

    public function store(Request $req)
    {

        if (Auth::check()) {

            if ($req->has('subtn_new_cause')) {
                $validatorFrpBio = Validator::make($req->all(), [
                    'cause_title' => 'required',
                    'cause_description' => 'required',
                    'cause_start_date' => 'required',
                    'cause_end_date' => 'required',
                    'cause_img' => 'required',
                    'cause_location' => 'required',
                    'cause_goal' => 'required',
                ]);
                if ($validatorFrpBio->fails()) {
                    return Redirect::back()->withErrors($validatorFrpBio);
                } else {

                    if ($req->cause_img != '') {
                        $folder = '/images/causes/';
                        $path = public_path() . $folder;

                        //upload new file
                        $file = $req->cause_img;
                        $filename = $file->getClientOriginalName();
                        $file->move($path, $filename);

                        causes::create([
                            'cause_title' => request('cause_title'),
                            'cause_description' => request('cause_description'),
                            'cause_start_date' => request('cause_start_date'),
                            'cause_end_date' => request('cause_end_date'),
                            'cause_img' => $folder . $filename,
                            'cause_location' => request('cause_location'),
                            'cause_goal' => request('cause_goal'),
                            'cause_frp_id' => request('cause_frp_id'),
                            'cause_cat_id' => request('cause_cat_id'),
                            'cause_tags' => request('cause_tags'),
                            'cause_status' => request('cause_status'),
                        ]);
                        $cats = categories::all()->where('cat_cat', '=', 'FR');
                        return view('cause.post', ['msg' => 3, 'cats' => $cats]);
                    }
                }
            } else if ($req->has('subtn_qui_don')) {

                $validatedonation = Validator::make($req->all(), [
                    'amount' => 'required',
                ]);

                if ($validatedonation->fails()) {
                    return redirect::back()->withErrors($validatedonation);
                } else {
                    donations::create([
                        'date' => date("Y-m-d H:i:s"),
                        'cause_id' => request('cause_id'),
                        'user_id' => request('user_id'),
                        'amount' => request('amount'),
                        'msg' => request('msg'),
                        'anon' => request('anon')
                    ]);
                    return redirect::back();
                }
            } else if ($req->has('btn_add_new_followup')) {


                $validatefollowup = Validator::make($req->all(), [
                    'title' => 'required',
                    'description' => 'required',
                ]);

                if ($validatefollowup->fails()) {
                    return redirect::back()->withErrors($validatefollowup);
                } else {
                    if ($req->img != '') {
                        $folder = '/images/cause/' . $req->cause_id . '/followups/';
                        $path = public_path() . $folder;

                        //upload new file
                        $file = $req->img;
                        $filename = $file->getClientOriginalName();
                        $file->move($path, $filename);

                        followup::create([
                            'title' => $req->title,
                            'img' => $folder . $filename,
                            'description' => $req->description,
                            'cause_id' => $req->cause_id,
                            'user_id' => $req->user_id,
                            'date' => date('Y-m-d H:i:s'),

                        ]);
                        return redirect::back();
                    } else {
                        followup::create([
                            'title' => $req->title,
                            'description' => $req->description,
                            'cause_id' => $req->cause_id,
                            'user_id' => $req->user_id,
                            'date' => date('Y-m-d H:i:s'),
                        ]);
                        return redirect::back();
                    }
                }
            } else {
                return view('Auth.login');
            }
        }
    }

    public function destroy($id)
    {

        if (request()->has('delete_followup_request')) {
            followup::destroy($id);
            return redirect::back();
        }
    }
}
