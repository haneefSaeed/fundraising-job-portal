<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AdminEmployeeController extends Controller
{
    //
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
            $employees = Admin::where('is_emp', 1)->get();
            return view("Admin.Employee.index",
                ['employees' => $employees]);
        }
    }

    public function create(){
        $user = auth('admin')->user()->is_emp;

        if($user){
            return redirect('admin/');
        }
        else {
            return view("Admin.Employee.create");
        }
    }

    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'regex:/^[A-Za-z.\s]+$/'],
            'email' => ['required', 'max:255','string', 'email', 'regex:/([A-Za-z][0-9])@(yahoo|aol|gmail|hotmail|)\.(com|edu)/i', 'unique:admins'],
            'password' => ['required', 'min:8', 'confirmed', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$_%^&*-]).{6,}$/'],
        ]);
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_disable' => $request->is_disable,
            'is_emp' => $request->is_emp,
            'created_at' => $request->created_at
        ]);


        return redirect('admin/emp');
    }

    public function update(Request $req, $id){
        $updates = Request()->all();
        $targetBlog = Admin::find($id);
        $targetBlog->update($updates);

        return redirect('admin/emp');
    }


    public function edit($id){
        $user = auth('admin')->user()->is_emp;

        if($user){
            return redirect('admin/');
        }
        else {
            $employee = Admin::findorFail($id);
            return view("Admin.Employee.edit", [
                'employee' => $employee
            ]);
        }
    }

    public function destroy($id)
    {
        $user = auth('admin')->user()->is_emp;

        if($user){
            return redirect('admin/');
        }
        else {
            $employee = Admin::find($id);
            $employee->delete();

            return redirect('admin/emp');
        }
    }

}
