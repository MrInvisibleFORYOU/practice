<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Models\Products;
use Illuminate\Http\Request;

class productsController extends Controller
{
    public function index(Request $request){
        $query=Products::query();
        $productsCategory=ProductCategory::all();
        if($request->ajax()){
            $products=$query->where("category_id",$request->category)->get();
              return response()->json(['products'=>$products,'productsCategory'=>$productsCategory]);
        }
       $products= $query->get(); 
    return view('Products.Products')->with(['products'=>$products,'productsCategorys'=>$productsCategory]);
    }
}
