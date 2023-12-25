@extends('backend.master')
@section('content')

<h1>Edit Category</h1>

<form action="{{route('categories.update',$categories->id)}}" method="Post" enctype="multipart/form-data">
  @csrf 
  @method('put')
  <div class="form-group">
    <label for="name"> Name </label>
    <input required type="text" class="form-control" id="name" name="name" value="{{$categories->name}}" placeholder="Enter category Name">
      </div>
      <div class="form-group">
          <label for=""> Category Description</label>
          <textarea name="description" class="form-control"  placeholder="Enter Description"> {{$categories->description}} </textarea>
        </div>
  <div class="form-group">
    <label for="image"> Image </label>
    <input type="file" class="form-control" id="image" name="image">
  </div>
  <div class="form-group">
    <label for="status"> Status </label>
   <select  name="status" class="form-control" id="status"> 
    <option @if($categories->status=='active') selected @endif  value="active"> Active </option>
    <option @if($categories->status=='inactive') selected @endif value="inactive"> Inactive </option>
   </select>
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection