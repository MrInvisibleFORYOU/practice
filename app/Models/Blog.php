<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{   
    use HasFactory;
    protected $table = 'blogs';
    protected $fillable=['title','content','slug','status','cat_id','image_id','review_score'];
    
    public function searchByname($name){
        return "hello this is working";
    }
}
