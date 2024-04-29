<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){

        return view('Admin.Profile.index');
    }

    public function update(Request $req,$id){
        if(Auth::guard('admin')->user()->email == $req->email){
            $req->validate([
                'name' => ['required', 'string', 'max:255']
            ]);
        }
        else{
            $req->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:admins']
            ]);
        }
        $updates = Request()->all();
        $targetUser = Admin::find($id);
        $targetUser->update($updates);

        return redirect('admin');
    }

}
