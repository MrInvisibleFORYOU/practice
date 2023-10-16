@extends('layouts.master')
@section('title')
New Roles
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Roles</h4>
        </div>
       
        <div class="card-body">
          <div class="table-responsive">
           <form action="{{route('adminAddRoleSave')}}" method="POST">
            @csrf
  <div class="form-group">
    <label for="roleName">Name</label>
    <input type="text" name="name" class="form-control" id="roleName"  placeholder="Enter Role" >
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