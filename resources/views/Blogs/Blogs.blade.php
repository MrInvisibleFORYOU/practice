

    @extends('layouts.master2')
    @section('content')
@include('Blogs.BlogSearchBar')
    @foreach ($blogs as $blog)
    <a href="{{route('blog',['slug'=>$blog->slug])}}" >
        <span>{{$blog->id}}</span>
       <div> {{$blog->title}}</div>
    </a>        
    @endforeach
    {{ $blogs->links() }}
    @endsection
   

   
