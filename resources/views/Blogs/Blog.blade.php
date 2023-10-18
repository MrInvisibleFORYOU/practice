@extends('layouts.master2')

@section('content')
{{$blog->content}}

@auth
@include('reviews.blogReview',['slug'=>$slug]) 


@include('Blogs.review')

@endauth

@endsection