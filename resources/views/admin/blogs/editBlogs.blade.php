@extends('layouts.master')
@section('title')
Edit Blog
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Users</h4>
        </div>
       
        <div class="card-body">
          <div class="table-responsive">
           <form action="{{route('adminBlogEditSave',['id'=>$blog->id])}}" method="POST">
            @method('PUT')
            @csrf
  <div class="form-group">
    <label for="title_blog">Title</label>
    <input type="email" name="title" class="form-control" id="title_blog" aria-describedby="emailHelp" placeholder="Enter email" value="{{$blog->title}}">
  </div>

  <div class="form-group mt-4" class="form-group">
    <label for="title_blog">Content</label>
    <textarea id="tinymce" name="content" value="{{$blog->content}}"></textarea>
</div>

  {{-- <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="text" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" value="{{$user->password}}">
  </div>

  <div class="form-group">
    <label for="user_type">Role</label>
    <br>
    <select class="form-select" id="user_type" name="usertype">
      <option value="{{$currentRole}}" selected>{{$currentRole}}</option>
        @foreach($roles as $role)
        <option value="{{$role->name}}">{{$role->name}}</option>
        @endforeach
    </select>
</div>

  <div class="form-group">
    <label for="exampleInputPhone" >Phone number</label>
    <input type="text" name="phone" class="form-control" id="exampleInputPhone" placeholder="Phone number" value="{{$user->phone}}">
  </div> --}}
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection

  @section('scripts')
  <script src="{!! url('assets/tinymce/js/tinymce.min.js') !!}"></script>
  <script type="text/javascript">
    tinymce.init({
        selector: 'textarea#tinymce',
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table paste codesample"
        ],
        toolbar:
            "undo redo | fontselect styleselect fontsizeselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | codesample action section button",
        font_formats:"Segoe UI=Segoe UI;",
        fontsize_formats: "8px 9px 10px 11px 12px 14px 16px 18px 20px 22px 24px 26px 28px 30px 32px 34px 36px 38px 40px 42px 44px 46px 48px 50px 52px 54px 56px 58px 60px 62px 64px 66px 68px 70px 72px 74px 76px 78px 80px 82px 84px 86px 88px 90px 92px 94px 94px 96px",
        height: 600
    });
</script>
  @endsection