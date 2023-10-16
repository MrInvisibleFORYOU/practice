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
          <h4 class="card-title"> Users</h4>
          <a href="{{route('adminMakeUser')}}" class="btn btn-success">Add New User</a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Role</th>
                <th scope="col">password</th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
              </tr>
            </thead>
            @foreach($users as $user)
            <tbody>
              <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->usertype}}</td>
                <td>{{$user->password}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->email}}</td>

                <td><a href="{{route('adminUserEdit',['id'=>$user->id])}}" class="btn btn-primary">Edit</a></td>
                <td><a href="{{route('adminDeleteUser',['id'=>$user->id])}}" class="btn btn-danger">Delete</a></td>
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