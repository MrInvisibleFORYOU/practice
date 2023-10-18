<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class SitemapXmlController extends Controller
{
    public function index($value='')

    {

        $blogs = Blog::latest()->where('status','publish')->get();

        return response()->view('sitemap', [

            'blogs' => $blogs

        ])->header('Content-Type', 'text/xml');

    }
}
