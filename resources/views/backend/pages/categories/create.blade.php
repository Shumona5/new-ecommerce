@extends('backend.master')
@section('content')

<form>
  <div class="form-group">
    <label for="name"> Name </label>brand_name
    <input type="text" class="form-control" id="name"  placeholder="Enter category Name">
      </div>
  <div class="form-group">
    <label for="description"> Description </label>
    <input type="text" class="form-control" id="description" placeholder="Description">
  </div>
  <div class="form-group">
    <label for="image"> Image </label>
    <input type="file" class="form-control" id="image" >
  </div>
  <div class="form-group">
    <label for="status"> Status </label>
   <select class="form-control" id="status"> 
    <option value="Active"> Active </option>
    <option value="Inactive"> Inactive </option>
   </select>
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection