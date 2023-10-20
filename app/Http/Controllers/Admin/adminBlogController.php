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
        $blog_status=['publish','draft'];
        return view('admin.blogs.editBlogs')->with(['blog'=>$blog,'status'=>$blog_status]);
    }

    public function adminBlogEditSave(Request $request, $id){
       $blog= Blog::find($id);
       $blog->title=$request->title;
       $blog->content=$request->content;
       $blog->save();
       return redirect()->route('adminAllBlog')->with(['success'=>"Blog edited succesfully"]);
    }
}
