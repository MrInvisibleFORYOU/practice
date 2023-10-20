@extends('layouts.master2')
@section('content')
<table class="table">
    <select id="category">
        <option name="category"  value=null>select Category</option>
        @foreach($productsCategorys as $productsCategory)
        <option  value="{{$productsCategory->id}}" >{{$productsCategory->name}}</option>
            @endforeach
    </select>
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Price</th>
        <th scope="col">Quantity</th>
      </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
      <tr>
        <td>{{$product->name}}</td>
        <td>{{$product->description}}</td>
        <td>{{$product->price}}</td>
        <td>{{$product->quantity}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @endsection

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('#category').on('change',function(){
        let category=$(this).val();
        $.ajax({
            url:"{{route('products')}}",
            type:"GET",
            data:{
                category:category
            },
            success:function(data) {
                console.log(data);
               }
        });
    });
});
</script>