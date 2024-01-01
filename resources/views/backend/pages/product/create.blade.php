@extends('backend.master')

@section('content')

<h1>Create new product</h1>

<!-- Session Message -->
<!-- @if(session()->has('msg'))
<p class="alert alert-success"> {{session()->get('msg')}}</p>
@endif

@if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>
               <p class="alert alert-danger"> {{$error}}</p>
            </div>
        @endforeach
    @endif -->

    <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
        @csrf

       <div class="form-group">
           <label for="">Enter Product Name <span style="color:red">*</span></label>
           <input  type="text" class="form-control" required name="product_name" value="{{old('product_name')}}" placeholder="Enter Product Name">
       </div>

        <div class="form-group">
            <label for="">Enter Product Description</label>
            <textarea name="description" class="form-control" value="{{old('description')}}" placeholder="Enter Description"></textarea>
        </div>

        <div class="form-group">
            <label for="category_id"> Select Category </label>
          <select  class="form-control" name="category_id" id="category_id"> 
            @foreach($categories as $category)
             <option value="{{$category->id}}"> {{$category->name}} </option>
             @endforeach
          </select>
        </div>
        


        <div class="form-group">
           <label for="">Upload Image</label>
           <input  type="file" class="form-control" required name="product_image" placeholder="Enter Product image">
       </div>

       <div class="form-group">
           <label for="">Enter Price</label>
           <input  type="number" class="form-control" required name="product_price" value="{{old('product_price')}}" placeholder="Enter Product Price">
           @error('product_price') 
           <div class="alert alert-danger"> {{$message}}</div>
           @enderror
           
       </div>
       <div class="form-group">
           <label for="">Enter Quantity </label>
           <input  type="number" class="form-control" required name="quantity" value="{{old('quantity')}}" placeholder="Enter Product Quantity">
       </div> 
       <div class="form-group">
           <label for="">Enter Discount </label>
           <input type="number" class="form-control" required name="discount" value="{{old('discount')}}" placeholder="Enter Product Discount">
       </div> 
       <div class="form-group">
           <label for="">Enter Discount Type </label>
           <select class="form-control" name="discount_type" id="">
            <option value="amount"> Amount </option>
            <option value="percentage"> Percentage </option>
           </select>
       </div> 
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

<br>

@endsection