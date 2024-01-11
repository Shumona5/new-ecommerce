@extends('backend.master')
@section('content')
<h1> Create New User </h1>

<form action="{{route('user.store')}}" method="post">
        @csrf

       <div class="form-group">
           <label for=""> User Name</label>
           <input  type="text" class="form-control" required name="name" placeholder="Enter User Name">
       </div>

       <div class="form-group">
           <label for=""> User Email</label>
           <input  type="email" class="form-control" required name="email" placeholder="Enter User Email">
       </div>

       <div class="form-group">
           <label for=""> User Password</label>
           <input  type="password" class="form-control" required name="password" placeholder="Enter User Password">
           @error('password')
           <div class="alert alert-danger"> {{$message}}</div>
           @enderror
       </div>

       <div class="form-group">
           <label for=""> User Role</label>
           <input  type="text" class="form-control" required name="role" placeholder="Enter User Role">
       </div>

        <!-- <div class="form-group">
            <label for="status"> Select Status </label>
            <select name="status" class="form-control" id=""> 
                <option value="Active"> Active </option>
                <option value="Inactive"> Inactive</option>
            </select>
        </div> -->
        <br>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection