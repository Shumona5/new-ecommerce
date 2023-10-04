@extends('backend.master')
@section('content')

<form>
  <div class="form-group">
    <label for="name"> Name </label>
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
   <select> </select>
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection