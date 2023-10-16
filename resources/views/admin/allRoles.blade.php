@extends('layouts.master')
@section('title')
Admin Dashboard
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
          <h4 class="card-title"> Roles</h4>
          <a href="{{route('adminAddRole')}}" class="btn btn-success">Add New Roles</a>
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
            @foreach($roles as $role)
            <tbody>
              <tr>
                <td>{{$role->id}}</td>
                <td>{{$role->name}}</td>
                <td>{{$role->guard_name}}</td>

                <td><a href="{{route('adminAddRole',['id'=>$role->id])}}" class="btn btn-primary">Edit</a></td>
                <td><a href="{{route('adminAddRole',['id'=>$role->id])}}" class="btn btn-danger">Delete</a></td>
                <td><a href="{{route('adminRolesHasPermissions',['id'=>$role->id])}}" class="btn btn-danger">Roles Permissions</a></td>
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