@extends('layouts.master')
@section('title')
Settings
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
        </div>
        <form href="{{route('adminSettingsSave')}}" method="POST">
            @csrf
        <div class="card-body">
          <div class="table-responsive">
            <label class="form-check-label">Enable Re_capcha</label>
            @if($recaptcha->recapcha)
             <input type="checkbox" name="adminsettings" checked>
             @else
             <input type="checkbox" name="adminsettings">
             @endif
          </div>
          <button class="btn btn-success">Save Settings</button>
        </form>
        </div>

      </div>
    </div>
  </div>
  @endsection