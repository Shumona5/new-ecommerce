@extends('backend.master')

@section('content')

<h1> Edit Product</h1>

<form action="{{route('product.update',$products->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="">Enter Product Name <span style="color:red">*</span></label>
        <input type="text" class="form-control" required name="product_name" value="{{$products->name}}" placeholder="Enter Product Name">
    </div>

    <div class="form-group">
        <label for="">Enter Product Description</label>
        <textarea name="description" class="form-control" placeholder="Enter Description"> {{$products->name}} </textarea>
    </div>

    <div class="form-group">
        <label for="category_id"> Select Category </label>
        <select class="form-control" name="category_id" id="category_id">
            @foreach($categories as $category)
            <option @if($products->category_id== $category->id) selected @endif value="{{$category->id}}"> {{$category->name}} </option>
            @endforeach
        </select>
    </div>


    <div class="form-group">
        <label for="">Upload Image</label>
        <input type="file" class="form-control" required name="product_image" placeholder="Enter Product image">
    </div>

    <div class="form-group">
        <label for="">Enter Price</label>
        <input min='100' type="number" class="form-control" required name="product_price" value="{{$products->price}}" placeholder="Enter Product Price">
    </div>
    <div class="form-group">
        <label for="">Enter Quantity </label>
        <input min='10' type="number" class="form-control" required name="quantity" value="{{$products->quantity}}" placeholder="Enter Product Quantity">
    </div>
    <div class="form-group">
        <label for="">Enter Discount </label>
        <input type="number" class="form-control" required name="discount" value="{{$products->discount}}" placeholder="Enter Product Discount">
    </div>
    <div class="form-group">
        <label for="">Enter Discount Type </label>
        <select class="form-control" name="discount_type" id="">
            <option @if($products->discount_type =='amount') selected @endif value="amount"> Amount </option>
            <option @if($products->discount_type =='percentage') selected @endif value="percentage"> Percentage </option>
        </select>
    </div>
    <div class="form-group">
        <label for="status"> Status </label>
        <select name="status" class="form-control" id="status">
            <option @if($products->status=='active') selected @endif value="active"> Active </option>
            <option @if($products->status=='inactive') selected @endif value="inactive"> Inactive </option>
        </select>
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<br>

@endsection