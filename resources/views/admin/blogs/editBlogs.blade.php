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
            <input type="text" name="id" value="{{$blog->id}}" hidden selected>
  <div class="form-group">
    <label for="title_blog">Title</label>
    <input type="text" name="title" class="form-control" id="title_blog" aria-describedby="emailHelp" placeholder="Enter email" value="{{$blog->title}}">
  </div>

  <div class="form-group ">
    <label for="tinymce">Content</label>
    <input id="tinymce" name="content"  class="form-control" value="{{$blog->content}}">
</div>

<div class="form-group">
  <label for="edit type">Status</label>
  <br>
  <select class="form-select" id="draft" name="draft">
      @for($i=0; $i<count($status); $i++)
      <option value="{{$status[$i]}}">{{$status[$i]}}</option>
      @endfor
  </select>
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
  <script src="https://cdn.tiny.cloud/1/YOUR_API_KEY/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script type="text/javascript">
    tinymce.init({
        selector: 'input#tinymce',
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