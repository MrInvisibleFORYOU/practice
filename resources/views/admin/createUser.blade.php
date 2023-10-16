@extends('layouts.master')
@section('title')
Create user
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> New User</h4>
        </div>
       
        <div class="card-body">
          <div class="table-responsive">
           <form action="{{route('adminCreateUserSave')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="name" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter The Name of user" >
              </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" >
   
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="text" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" >
  </div>

  <div class="form-group">
    <label for="user_type">Role</label>
    <br>
    <select class="form-select" id="user_type" name="usertype">
      <option value="" selected>none</option>
        @foreach($roles as $role)
        <option value="{{$role->name}}">{{$role->name}}</option>
        @endforeach
    </select>
</div>

  <div class="form-group">
    <label for="exampleInputPhone" >Phone number</label>
    <input type="text" name="phone" class="form-control" id="exampleInputPhone" placeholder="Phone number" >
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection

  @section('scripts')
  @endsection