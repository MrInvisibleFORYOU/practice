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
         
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
            <thead>
              <tr>
                <th scope="col">Permissions</th>
                <th scope="col">checked  <input type="checkbox" onclick="checkAllBox"></th>
              </tr>
            </thead>
            <form  action="{{route('adminRolesHasPermissionsSave',['id'=>$roleId])}}" method="POST">
                @csrf
            @foreach($hasPermissions as $hasPermission)
            <tbody>
              <tr>
                <td>{{$hasPermission->name}}</td>
                <td><input type="checkbox" name="{{$hasPermission->name}}" value="{{$hasPermission->id}}" checked ></td>
              
              </tr>
              
            </tbody>
            @endforeach
            @foreach($rolesHasNotPermissions as $rolesHasNotPermission)
            <tbody>
              <tr>
                <td>{{$rolesHasNotPermission->name}}</td>
                <td><input type="checkbox" name="{{$rolesHasNotPermission->name}}" value="{{$rolesHasNotPermission->id}}" ></td>
              </tr>

            </tbody>
            @endforeach
            <button type="submit" class="btn btn-success">Save Permission</button>
            </form>
          </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection