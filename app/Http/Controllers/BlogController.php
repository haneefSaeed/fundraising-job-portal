<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //

    public function index(){
        $all_blogs = Blog::all();
        return view('Blog.index', ['blogs'=>$all_blogs]);
    }

    public function show($blog_id){
        $blog = Blog::findorFail($blog_id);
        return view('Blog.show', [
            'blog' => $blog
            ]
        );
    }
}
