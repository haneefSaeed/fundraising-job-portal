<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\categories;
use App\Models\Blog;

class AdminBlogCatController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }


    public function index(){
        $blog_cats = categories::where('cat_cat', 'BLOG')->get();

        return view('Admin.Blog_cat.index', ['blog_cats' => $blog_cats]);
    }

    public  function create(){

        return view("Admin.Blog_cat.create");
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


        return redirect('admin/blog_cat');
    }

    public function update(Request $req, $id){
        $updates = Request()->all();
        $targetBlogCat = categories::find($id);
        $targetBlogCat->update($updates);


            //$targetBlog->update(['img' => $folder.$filename]);

        return redirect('admin/blog_cat');
    }

    public function edit($id){
        $blog_cat = categories::findorFail($id);
        return view("Admin.Blog_cat.edit", ['blog_cat' => $blog_cat] );
    }

    public function destroy($id)
    {
        $blog = Blog::where('cat_id', '=', $id)->count();

        if($blog > 0){
            return redirect('admin/blog_cat');
        }
        else{
            $blog_cat = categories::find($id);
            $blog_cat->delete();
            return redirect('admin/blog_cat');
        }

    }
}
