@extends('backend.master')
@section('content')

<h1> Create New Category </h1>

<form action="{{route('categories.store')}}" method="Post" enctype="multipart/form-data">
  @csrf 
  <div class="form-group">
    <label for="name"> Name </label>
    <input required type="text" class="form-control" id="name" name="name" placeholder="Enter category Name">
      </div>
      <div class="form-group">
          <label for=""> Category Description </label>
          <textarea name="description" class="form-control" placeholder="Enter Description"></textarea>
        </div>
  <div class="form-group">
    <label for="image"> Image </label>
    <input type="file" class="form-control" id="image" name="image">
  </div>
  <div class="form-group">
    <label for="status"> Status </label>
   <select  name="status" class="form-control" id="status"> 
    <option value="active"> Active </option>
    <option value="inactive"> Inactive </option>
   </select>
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection