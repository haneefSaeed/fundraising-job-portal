<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\categories;
use App\Models\causes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminFundraisingCatController extends Controller
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

            $cause_cats = categories::where('cat_cat', 'FR')->get();
            return view("Admin.Fundraising_cat.index", ['cause_cats' => $cause_cats]);
        }
    }

    public function create(){
        $user = auth('admin')->user()->is_emp;

        if($user){
            return redirect('admin/');
        }
        else {
            $cause_cats = categories::select('*')->where([['cat_root', '=', 0], ['cat_cat', '=', 'FR']])->get();
            return view("Admin.Fundraising_cat.create", ['cause_cats' => $cause_cats]);
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

        return redirect('admin/fund_cat');
    }

    public function show($id){
        $user = auth('admin')->user()->is_emp;

        if($user){
            return redirect('admin/');
        }
        else {
            $cause_cat = categories::find($id);
            $cause_cat->delete();
            return redirect('admin/fund_cat');
        }
    }

    public function update(Request $req, $id){
        $updates = Request()->all();
        $targetCauseCat = categories::find($id);
        $targetCauseCat->update($updates);


        //$targetBlog->update(['img' => $folder.$filename]);

        return redirect('admin/fund_cat');
    }

    public function edit($id){
        $user = auth('admin')->user()->is_emp;

        if($user){
            return redirect('admin/');
        }
        else {
            $cause_cat = categories::findorFail($id);
            $cause_root = categories::select('*')->where([['cat_root', '=', 0], ['cat_cat', '=', 'FR']])->get();
            return view("Admin.Fundraising_cat.edit", ['cause_cat' => $cause_cat, 'cat_root' => $cause_root]);
        }
    }

    public function destroy($id)
    {
        $user = auth('admin')->user()->is_emp;

        if($user){
            return redirect('admin/');
        }
        else {
            $cause = causes::where('cause_cat_id', '=', $id)->count();

            if($cause > 0){
                return redirect('admin/fund_cat');
            }
            else{
            $cause_cat = categories::find($id);
            $cause_cat->delete();
            return redirect('admin/fund_cat');
            }
        }
    }
}
