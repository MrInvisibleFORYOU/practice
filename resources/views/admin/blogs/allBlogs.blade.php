@extends('layouts.master')
@section('title')
All Blogs
@endsection
@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Blogs</h4>
        
          {{-- <a href="{{route('adminAddRole')}}" class="btn btn-success">Add New Roles</a> --}}
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
            <thead>
              <tr>
                <th scope="col">Title</th>
                <th scope="col">content</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            @foreach($blogs as $blog)
            <tbody>
              <tr>
                <td>{{$blog->title}}</td>
                <td>{{$blog->content}}</td>
                <td>{{$blog->status}}</td>

                <td><a href="{{route('adminBlogEdit',['id'=>$blog->id])}}" class="btn btn-primary">Edit</a></td>
                {{-- <td><a href="{{route('adminAddRole',['id'=>$role->id])}}" class="btn btn-danger">Delete</a></td>
                <td><a href="{{route('adminRolesHasPermissions',['id'=>$role->id])}}" class="btn btn-danger">Roles Permissions</a></td> --}}
              </tr>

            </tbody>
            @endforeach
        {{-- {{$blogs->links()}} --}}
          </table>
         
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection