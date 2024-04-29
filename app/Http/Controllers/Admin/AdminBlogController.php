<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\categories;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent;

class AdminBlogController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }
    //

    public function index(){
        $blogs = Blog::with('user' , 'cat')->orderBy('id', 'desc')->get();
        return view("Admin.Blog.index",
            ['blogs' => $blogs]);
    }

    public function create(){
        $blog_cat = categories::where('cat_cat', 'BLOG')->get();
        return view("Admin.blog.create" , ['blog_cat' => $blog_cat]);
    }


    public function store(){
        $data = request()->all();

        $folder = '/images/blog/';
        $path = public_path() . $folder;

        //upload new file
        $file = $data['img'];
        $filename = $file->getClientOriginalName();
        $file->move($path, $filename);

        $image = $folder.$filename;

        Blog::create([
            'title' => $data['title'],
            'content' => $data['content'],
            'img' => $image,
            'user_id' => $data['user_id'],
            'cat_id' => $data['cat_id'],
            'status' => $data['status'],
            'tags' => $data['tags'],
            'seenctr' => "0",
            'created_at' => $data['created_at'],
            'publish_date' => $data['publish_date']

        ]);


        return redirect('admin/blog');
    }

    public function update(Request $req, $id){
        $updates = Request()->all();
        $targetBlog = Blog::find($id);
        $targetBlog->update($updates);

        if ($req->img != '') {
            $folder = '/images/blog/';
            $path = public_path() . $folder;

            //upload new file
            $file = $req->img;
            $filename = $file->getClientOriginalName();
            $file->move($path, $filename);

            //for update in table
            $targetBlog->update(['img' => $folder.$filename]);

            return redirect('admin/blog');
        }

        return redirect('admin/blog');
    }


    public function edit($id){
        $blog = Blog::findorFail($id);
        $blog_cat = categories::where('cat_cat', 'BLOG
        ')->get();
        return view("Admin.Blog.edit", [
            'blog' => $blog,
            'blog_cat' => $blog_cat
        ] );
    }

    public function destroy($id)
    {

        $blog = Blog::find($id);
        $image_path = $blog['img'];
        Storage::delete("public".$image_path);
        $blog->delete();

        return redirect('admin/blog');
    }

}
