<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminsliderController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }
    //
    public function index(){
        $sliders = slider::all();
        return view("Admin.slider.index",
            ['sliders' => $sliders]);
    }

    public function create(){
        return view("Admin.slider.create");
    }

    public function store(){
        $data = request()->all();

        $folder = '/images/slide/';
        $path = public_path() . $folder;

        //upload new file
        $file = $data['sdr_imageURL'];
        $filename = $file->getClientOriginalName();
        $file->move($path, $filename);

        $image = $folder.$filename;

        slider::create([
            'sdr_title' => $data['sdr_title'],
            'sdr_description' => $data['sdr_description'],
            'sdr_imageURL' => $image,
            'sdr_align' => $data['sdr_align'],
            'sdr_isPublished' => $data['sdr_isPublished'],
            'created_at' => $data['created_at']

        ]);


        return redirect('admin/slides');
    }

    public function show($id){

        $slider = slider::find($id);
        $image_path = $slider['sdr_imageURL'];
        Storage::delete("public". $image_path);
        $slider->delete();

        return redirect('admin/slides');
    }


    public function update(Request $req, $id)
    {
        $updates = Request()->all();
        $targetSlider = slider::find($id);
        $targetSlider->update($updates);

        if ($req->sdr_imageURL != '') {
            $folder = '/images/slide/';
            $path = public_path() . $folder;

            //upload new file
            $file = $req->sdr_imageURL;
            $filename = $file->getClientOriginalName();
            $file->move($path, $filename);

            //for update in table
            $targetSlider->update(['sdr_imageURL' => $folder.$filename]);

            return redirect('admin/slides');
        }

        return redirect('admin/slider');
    }

    public function edit($id){
        $slider = slider::findorFail($id);
        return view("admin.slider.edit", compact('slider') );
    }

    public function destroy($id)
    {
        $slider = slider::find($id);
        $image_path = $slider['sdr_imageURL'];
        Storage::delete("public". $image_path);
        $slider->delete();

    }
}
