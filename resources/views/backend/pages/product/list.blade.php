@extends('backend.master')

@section('content')
<h1>All Products</h1>

<!-- @if(session()->has('msg'))
  <p class="alert alert-success">{{session()->get('msg')}}</p>
@endif -->

<a href="{{route('product.create')}}" class="btn btn-success">Create New Product</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col"> Serial</th>
      <th scope="col">Name</th>
      <th scope="col">Category</th>
      <th scope="col">Image</th>
      <th scope="col">Status</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach($products as $key=>$product)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td> {{$product->name}} </td>
      <td>{{$product->category_id}}</td>
      <td>
        <!-- <img style="width: 50px;" src="{{url('/uploads/'.$product->image)}}" alt="image"> -->
        <img height="100" width="150" src="{{url('/uploads/'.$product->image)}}" alt="">
      </td>
      <td>{{$product->status}}</td>
      <td>
        <a class="btn btn-primary"  href="">View</a>
        <a class="btn btn-warning"  href="{{route('product.edit',$product->id)}}">Edit</a>
        <a  class="btn btn-danger" href="">Delete</a>
      </td>
    </tr>
  @endforeach 

  </tbody>
</table>

{{$products->links()}}

@endsection
