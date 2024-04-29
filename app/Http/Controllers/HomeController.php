<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\causes;
use App\Models\donations;
use App\Models\services;
use App\Models\slider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $all_sliders = slider::all();
        $all_services = services::all();
        $all_cats = categories::select('*')->where([['cat_root', '=', 0], ['cat_cat', '=', 'JOB']])->get();
        $all_causes = causes::all()->sortByDesc('seenctr')->take(5); ///need click seen counter
        $donors = donations::all();
        return view('index', [
            'slides' => $all_sliders,
            'services' => $all_services,
            'cats' => $all_cats,
            'causes' => $all_causes,
            'donations'=>$donors
        ]);
    }



}



