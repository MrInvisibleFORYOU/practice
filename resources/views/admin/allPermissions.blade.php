@extends('layouts.master')
@section('title')
All permissions
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
          <h4 class="card-title"> permissions</h4>
          <a href="{{route('adminAddPermissions')}}" class="btn btn-success">Add New Permissions</a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Guard Name</th>
              </tr>
            </thead>
            @foreach($permissions as $permission)
            <tbody>
              <tr>
                <td>{{$permission->id}}</td>
                <td>{{$permission->name}}</td>
                <td>{{$permission->guard_name}}</td>
                <td><a href="{{route('adminEditPermission',['id'=>$permission->id])}}" class="btn btn-primary">Edit</a></td> 
                <td><a href="{{route('adminDeletePermission',['id'=>$permission->id])}}" class="btn btn-danger">Delete</a></td> 

                {{-- <td><a href="{{routes('rolesEdit',['id'=>$role->id])}}" class="btn btn-primary">Edit</a></td> --}}
                {{-- <td><a href="{{route('adminDeleteRoles',['id'=>$role->id])}}" class="btn btn-danger">Delete</a></td> --}}
              </tr>

            </tbody>
            @endforeach
          </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection