@extends('layouts.master')
@section('title')
New permissions
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Permissions</h4>
        </div>
       
        <div class="card-body">
          <div class="table-responsive">
           <form action="{{route('adminAddPermssionSave')}}" method="POST">
            @csrf
  <div class="form-group">
    <label for="permissionsName">Name</label>
    <input type="text" name="name" class="form-control" id="permissionsName"  placeholder="Enter Role" >
  </div>

  <div class="form-group">
    <label>Guard Name</label>
        <select class="form-select" aria-label="Default select example">
            @foreach($guards as $guard)
            <option name="guard_name" value="{{$guard}}">{{$guard}}</option>
            @endforeach
          </select>
     
    {{-- <input type="text" name="guard_name" class="form-control" id="permssionsGuard"  placeholder="Enter Guard Name" > --}}
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