<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogReview;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
class BlogController extends Controller
{


    public function index(){
        $blogs = Blog::where('status','publish')->paginate(10);
        return view('Blogs.blogs',['blogs'=>$blogs]);
    }

    public function blog($slug){
       
        $blog=Blog::where('status','publish')->where('slug',$slug)->get()->first();
        $reviews=BlogReview::where('blog_slug',$slug)->get();
       return view('Blogs.blog',['blog'=>$blog,'slug'=>$slug,'reviews'=>$reviews]);
    }

    public function saveReview(Request $request){
      $reviews=new BlogReview();
      $id=Auth::user()->id;
      $reviews->user_id=$id;
      $reviews->rating=$request->input('rating');
      $reviews->comment=$request->input('comment');
      $reviews->blog_slug=$request->input('blog_slug');
     $reviews->save();
     return back();
    }

    public function search(Request $request){
       $searchInputID= $request->input('searchInputID');
       $query= $request->input('query');
       if(isset($searchInputID)){
        $blogSlug=Blog::where('id',$searchInputID)->where('title',$query)->get('slug')->first();
       }else{
        $blogSlug=Blog::where('title',$query)->get('slug')->first();
       }
     
       if($blogSlug!=null){
        $slug=$blogSlug->slug;
        return redirect('/blog/'.$slug);
       }else{
        return "Blog not found with this name i will return a 404 page";
       }
     
    }

    public function searchAjax(Request $request){
        $query = $request->input('query');
        if(isset($query)){
         $results = Blog::where('title', 'REGEXP', "^$query")->where('status','publish')->get(['title','id']);
       // $results = Blog::where('title', 'like', "%$query%")->get(['title']);
        }else{
            $results="";
        }
          return response()->json($results);
    }
}
