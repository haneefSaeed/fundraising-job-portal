<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\website_details;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class AdminWebsiteDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
        $webs = website_details::all();

        return view('Admin.Website_det.index', ['webs' => $webs]);
    }

    public function update(Request $req,$id){
        $updates = Request()->all();
        $targetWeb = website_details::find($id);
        $targetWeb->update($updates);

        if ($req->web_logo != '') {
            $folder = '/images/logo/';
            $path = public_path() . $folder;

            //upload new file
            $file = $req->web_logo;
            $filename = $file->getClientOriginalName();
            $file->move($path, $filename);

            //for update in table
            $targetWeb->update(['web_logo' => $folder.$filename]);

            return redirect('admin/web');
        }

        return redirect('admin/web');
    }
}
