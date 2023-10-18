<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class adminBlogController extends Controller
{
    public function adminAllBlog(){
        $Blogs=Blog::paginate(10);
        return view('admin.blogs.allBlogs')->with(['blogs'=>$Blogs]);
    }

    public function adminBlogEdit($id){
        $blog=Blog::where('id',$id)->get()->first();
    // print_r($blog->title);
    // exit;
        return view('admin.blogs.editBlogs')->with(['blog'=>$blog]);
    }
}
